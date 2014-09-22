<?php 
App::uses('AppController', 'Controller');
class ClientesController extends AppController
{
    public $layout = 'praver';
    public $uses = array('Cliente');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function index()
    {
        $clientes = $this->Cliente->find('all');
        $this->set(compact('clientes'));
    }
    public function nuevo()
    {
        if(!empty($this->request->data))
        {
            $this->Cliente->create();
            $this->Cliente->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se guardo','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function ajaxedita($idcliente = null)
    {
        $this->layout = 'ajax';
        $this->Cliente->id = $idcliente;
        $this->data = $this->Cliente->read();
        $this->set(compact('idcliente'));
        //debug($this->request->data);exit;
        
    }
    public function elimina($idcliente = null)
    {
        if($this->Cliente->delete($idcliente))
        {
            $this->Session->setFlash('Se elimino correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se pudo eliminar','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function nuevocliente()
    {
        $this->layout = 'ajax';
        if(!empty($this->request->data))
        {
            $this->Cliente->create();
            $this->Cliente->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect($this->referer());
        }
    }
}
?>