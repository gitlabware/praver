<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PagosController extends AppController
{
    public $layout = 'praver';
    public $uses = array('Pago','Detalle');
    public function index()
    {
        $pagos = $this->Pago->find('all',array('order' => 'Pago.id DESC','conditions' => array('Pago.detalle_id !=' => null)));
    
        $this->set(compact('pagos'));
    }
    public function pago($idPago = nuull)
    {
        $this->layout = 'ajax';
        $this->Pago->id = $idPago;
        $detalles = $this->Detalle->find('list',array('fields' => 'Detalle.nombre'));
        $this->request->data = $this->Pago->read();
        $this->set(compact('detalles'));
    }
    public function guardapago()
    {
        if(!empty($this->request->data['Pago']['detalle_id']) || !empty($this->request->data['Detalle']['nombre']))
        {
            if(!empty($this->request->data['Detalle']['nombre']))
            {
                $this->Detalle->create();
                $this->Detalle->save($this->request->data['Detalle']);
                $idDetalle = $this->Detalle->getLastInsertID();
                if(empty($idDetalle))
                {
                    $idDetalle = $this->request->data['Detalle']['id'];
                }
                $this->request->data['Pago']['detalle_id'] = $idDetalle;
            }
            $this->Pago->create();
            $this->Pago->save($this->request->data['Pago']);
            $this->Session->setFlash('Se registro correctamente!!','msgbueno');
        }
        else{
            $this->Session->setFlash('No se pudo registrar faltan datos!!!','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }
    public function eliminapago($idPago = null)
    {
        if(!empty($idPago))
        {
            $this->Pago->delete($idPago);
            $this->Session->setFlash('Se elimino correctamente!!!','msgbueno');
        }
        else{
            $this->Session->setFlash('No se puede eliminar!!','msgerror');
        }
        
        $this->redirect(array('action' => 'index'));
    }
}
