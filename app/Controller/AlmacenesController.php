<?php 
App::uses('AppController', 'Controller');
class AlmacenesController extends AppController
{
    public $layout = 'praver';
    public $uses = array('Almacene');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function index()
    {
        $almacenes = $this->Almacene->find('all');
        $this->set(compact('almacenes'));
    }
    public function nuevo()
    {
        if(!empty($this->request->data))
        {
            $this->Almacene->create();
            $this->Almacene->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se guardo','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function ajaxedita($idalmacen = null)
    {
        $this->layout = 'ajax';
        $this->Almacene->id = $idalmacen;
        $this->data = $this->Almacene->read();
        $this->set(compact('idalmacen'));
        //debug($this->request->data);exit;
        
    }
    public function elimina($idalmacen = null)
    {
        if($this->Almacene->delete($idalmacen))
        {
            $this->Session->setFlash('Se elimino correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se pudo eliminar','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function nuevoalmacen()
    {
        $this->layout = 'ajax';
        if(!empty($this->request->data))
        {
            $this->Almacene->create();
            $this->Almacene->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect($this->referer());
        }
    }
}
?>