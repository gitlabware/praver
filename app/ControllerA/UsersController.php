<?php 
App::uses('AppController', 'Controller');
class UsersController extends AppController
{
    public $layout = 'praver';
    public $uses = array('User');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function index()
    {
        $usuarios = $this->User->find('all',array('order' => 'User.id DESC'));
        $this->set(compact('usuarios'));
    }
    public function nuevo()
    {
        if(!empty($this->request->data))
        {
            $this->User->create();
            $this->User->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect($this->referer());
        }
        else{
            $this->Session->setFlash('No se guardo','msgerror');
            $this->redirect($this->referer());
        }
    }
    public function ajaxedita($idusuario = null)
    {
        $this->layout = 'ajax';
        //debug($idusuario);exit;
        $this->User->id = $idusuario;
        $this->data = $this->User->read();
        $this->set(compact('idusuario'));
        //debug($this->request->data);exit;
        
    }
    public function elimina($idusuario = null)
    {
        if($this->User->delete($idusuario))
        {
            $this->Session->setFlash('Se elimino correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se pudo eliminar','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function nuevousuario()
    {
        $this->layout = 'ajax';
        if(!empty($this->request->data))
        {
            $this->User->create();
            $this->User->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect($this->referer());
        }
    }
    public function ajaxpass()
    {
        $this->layout = 'ajax';
    }
    public function login()
    {
        $this->layout = 'login';
        //debug($this->request->data);exit;
        if ($this->request->is('post')) {


            if ($this->Auth->login()) {
               
                $role = $this->Session->read('Auth.User.role');
                $this->redirect(array('controller' => 'Movimientos','action' => 'controlpanel'));
            } else {
                $this->Session->setFlash('Usuario o Password incorrectos.','msgerror');
            }
        }
    }
    public function salir()
    {
        //$this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
        $this->redirect(array('action'=>'login'));
    }
    public function miperfil()
    {
        $idUsuario = $this->Session->read('Auth.User.id');
        $this->User->id = $idUsuario;
        if(!empty($this->request->data))
        {
            
        }
        else{
            $this->request->data = $this->User->read();
        }
    }
    public function ajaxcambiopasssss($id = null) {
        $this->User->id = $id;
        if (!$id) {
            $this->Session->setFlash('No existe tal registro');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->data)) {
            $this->data = $this->User->read();
        } else {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash('Su Password fue modificado Exitosamente');
                $this->redirect(array('action' => 'index'), null, true);
            } else {
                $this->Session->setFlash('no se pudo modificar!!');
            }
        }
        
    }
    public function ajaxcambiopass($idusuario = null)
    {
        $this->layout = 'ajax';
        //debug($idusuario);exit;
        $this->User->id = $idusuario;
        $this->data = $this->User->read();
        $this->set(compact('idusuario'));
        //debug($this->request->data);exit;
        
    }
}
?>