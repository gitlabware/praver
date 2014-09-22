<?php 
class ReportesController extends AppController
{
    public $layout = 'praver';
    public $uses = array('Pedido','Pago','Item','Movimiento','Almacene','Producto','Cliente');
    public function index($idAlmacen = null)
    {
        if(!empty($this->request->data))
        {
            //debug($this->request->data);exit;
            $fecha_ini = $this->request->data['Reporte']['fecha_ini2'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin2'];
        }
        $listalmacenes = $this->Almacene->find('list',array('fields' => 'Almacene.nombre'));
        $listalmacenes[0] = 'TODOS';
        $productos = $this->Producto->find('list',array('fields' => 'Producto.nombre'));
        $productos[0] = 'TODOS';
        $clientes = $this->Cliente->find('list',array('fields' => 'Cliente.nombre'));
        $clientes[0] = 'TODOS';
        $productos_chart = $this->Producto->find('all');
        $almacenes = $this->Almacene->find('all');
        if(empty($idAlmacen))
        {
            $almacen = $this->Almacene->find('first');
            $idAlmacen = $almacen['Almacene']['id'];
        }
        //debug($productos_chart);exit;
        
        $this->set(compact('listalmacenes','productos','clientes','productos_chart','idAlmacen','almacenes','fecha_ini','fecha_fin'));
    }
    public function total_venta($idProducto = null,$fecha_ini,$fecha_fin)
    {
        $condiciones = array();
        if(!empty($fecha_ini) && !empty($fecha_fin))
        {
            $condiciones['date(Pedido.modified) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin);
        }
        $condiciones['Item.producto_id'] = $idProducto;
        $condiciones['Pedido.estado'] = 'VENDIDO';
        $items = array();
        $items = $this->Item->find('all',array('recursive' => 0,
                                'fields' => array('Item.cantidad_cajas','Item.cantidad_media_caja',                                   
                                'Producto.caja','Producto.media_caja','date(Pedido.modified) fecha','Item.cantidad_unidades'),
                                'conditions' => $condiciones
                ));
        $cantidadmes = 0;
                            foreach($items as $ite):
                                $cantidadmes =  (($ite['Producto']['caja']*$ite['Item']['cantidad_cajas'])+($ite['Producto']['media_caja']*$ite['Item']['cantidad_media_caja'])+$ite['Item']['cantidad_unidades']);
                            endforeach;
        //debug($items);exit;
        return $cantidadmes;
    }
    public function consulta_total_alamacen($idProducto = null,$idAlmacen = null)
    {
        $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    
                    'MAX(Movimiento.id) max'
                ),
                'conditions' => array(
                    'Movimiento.almacene_id' => $idAlmacen,
                    'Movimiento.producto_id' => $idProducto
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
        $cantidadTotal = 0;
        foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
        return $cantidadTotal;
        //debug($cantidadTotal);exit;
    }
    public function reporteinventario()
    {
        //debug($this->request->data);exit;
        if(!empty($this->request->data))
        {
            $fecha_ini = $this->request->data['Reporte']['fecha_ini'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin'];
            $idAlmacen = $this->request->data['Reporte']['almacene_id'];
            $tipo = $this->request->data['Reporte']['tipo'];
            $idProducto = $this->request->data['Reporte']['producto'];
            $condiciones = array();
            if(empty($fecha_ini))
            {
                $condiciones['date(Movimiento.created) <='] = $fecha_fin;
            }
            else{
               $condiciones['date(Movimiento.created) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin); 
            }
            if($idAlmacen != 0)
            {
                $condiciones['Movimiento.almacene_id'] = $idAlmacen;
            }
            if($tipo != 'Todos')
            {
                $condiciones['Movimiento.estado'] = $tipo;
            }
            if($idProducto != 0)
            {
                $condiciones['Movimiento.producto_id'] = $idProducto;
            }
            $movimientos = $this->Movimiento->find('all',array('conditions' => $condiciones));
            
            $this->set(compact('movimientos','fecha_ini','fecha_fin','tipo'));
        }
        else{
            $this->Session->setFlash('No se puede generar sin datos','msgbueno');
            $this->redirect($this->referer());
        }
    }
    public function reporteinventario_totales()
    {
        //debug($this->request->data);exit;
        if(!empty($this->request->data))
        {
            $fecha_ini = $this->request->data['Reporte']['fecha_ini'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin'];
            $idAlmacen = $this->request->data['Reporte']['almacene_id'];
            
            $condiciones = array();
            if(empty($fecha_ini))
            {
                $condiciones['date(Movimiento.created) <='] = $fecha_fin;
            }
            else{
               $condiciones['date(Movimiento.created) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin); 
            }
            if($idAlmacen != 0)
            {
                $condiciones['Movimiento.almacene_id'] = $idAlmacen;
            }
            $movimientos = $this->Movimiento->find('all'
                    ,array(
                        'conditions' => $condiciones,
                        'group' => array('Movimiento.producto_id'),
                        'fields' => array('Producto.nombre','SUM(Movimiento.ingreso) total_ingreso','SUM(Movimiento.salida) total_salida')
                    )
                    );
            debug($movimientos);exit;
            $this->set(compact('movimientos','fecha_ini','fecha_fin','tipo'));
        }
        else{
            $this->Session->setFlash('No se puede generar sin datos','msgbueno');
            $this->redirect($this->referer());
        }
    }
    public function reporte_ventas_productos()
    {
        if(!empty($this->request->data))
        {
            $fecha_ini = $this->request->data['Reporte']['fecha_ini'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin'];
            $idAlmacen = $this->request->data['Reporte']['almacene_id'];
            $idProducto = $this->request->data['Reporte']['producto'];
            $condiciones = array();
            if($idAlmacen != 0)
            {
                $condiciones['Item.almacene_id'] = $idAlmacen;
            }
            if($idProducto != 0)
            {
                $condiciones['Item.producto_id'] = $idProducto;
            }
            $condiciones['Pedido.estado'] = 'VENDIDO';
            if(empty($fecha_ini))
            {
                $condiciones['date(Pedido.modified) <='] = $fecha_fin;
            }
            else{
               $condiciones['date(Pedido.modified) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin);
            }
            $this->Pedido->unbindModel(array('hasMany' => array('Movimiento','Item'),'belongsTo' => array('User')));
            $items = $this->Item->find('all',array('recursive' => 2,'conditions' => $condiciones));
            //debug($items);exit;
            $this->set(compact('items','fecha_ini','fecha_fin'));
        }
        else{
            $this->Session->setFlash('No se puede generar sin datos','msgbueno');
            $this->redirect($this->referer());
        }
    }
    
    public function reporte_pedidos_productos()
    {
        if(!empty($this->request->data))
        {
            $fecha_ini = $this->request->data['Reporte']['fecha_ini'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin'];
            $idAlmacen = $this->request->data['Reporte']['almacene_id'];
            $idProducto = $this->request->data['Reporte']['producto'];
            $condiciones = array();
            if($idAlmacen != 0)
            {
                $condiciones['Item.almacene_id'] = $idAlmacen;
            }
            if($idProducto != 0)
            {
                $condiciones['Item.producto_id'] = $idProducto;
            }
            $condiciones['Pedido.estado'] = 'PEDIDO';
            $condiciones['date(Pedido.modified) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin);
            $this->Pedido->unbindModel(array('hasMany' => array('Movimiento','Item'),'belongsTo' => array('User')));
            $items = $this->Item->find('all',array( 'recursive' => 2,'conditions' => $condiciones));
            $this->set(compact('items','fecha_ini','fecha_fin'));
        }
        else{
            $this->Session->setFlash('No se puede generar sin datos','msgbueno');
            $this->redirect($this->referer());
        }
    }
    public function reporte_ventas_clientes()
    {
        if(!empty($this->request->data))
        {
            $fecha_ini = $this->request->data['Reporte']['fecha_ini'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin'];
            $cliente = $this->request->data['Reporte']['cliente'];
            $condiciones = array();
            
            if($cliente != 0)
            {
                $condiciones['Pedido.cliente_id'] = $cliente;
            }
            $condiciones['Pedido.estado'] = 'VENDIDO';
            if(empty($fecha_ini))
            {
                $condiciones['date(Pedido.modified) <='] = $fecha_fin;
            }
            else{
               $condiciones['date(Pedido.modified) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin);
            }
            $pedidos = $this->Pedido->find('all',array( 'conditions' => $condiciones));
            //debug($pedidos);exit;
            $this->set(compact('pedidos','fecha_ini','fecha_fin'));
        }
        else{
            $this->Session->setFlash('No se puede generar sin datos','msgbueno');
            $this->redirect($this->referer());
        }
    }
    public function reporte_pagos()
    {
        if(!empty($this->request->data))
        {
            $fecha_ini = $this->request->data['Reporte']['fecha_ini'];
            $fecha_fin = $this->request->data['Reporte']['fecha_fin'];
            $condiciones = array();
            if(empty($fecha_ini))
            {
                $condiciones['Pago.created <='] = $fecha_fin;
            }
            else{
               $condiciones['Pago.created BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin);
            }
            $condiciones['Pago.detalle_id !='] = 'NULL';
            $pagos = $this->Pago->find('all',array('conditions' => $condiciones));
            $this->set(compact('pagos','fecha_ini','fecha_fin'));
        }
        else{
            $this->Session->setFlash('No se puede generar sin datos','msginfo');
            $this->redirect($this->referer());
        }
    }
}
?>