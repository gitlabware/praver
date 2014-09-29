<?php

App::uses('AppController', 'Controller');

class MovimientosController extends AppController {

    public $layout = 'praver';
    public $uses = array('Producto', 'Movimiento', 'Almacene', 'Cliente', 'Venta', 'Item', 'Pedido','Pago');

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
    }

    public function index() {
        $productos = $this->Producto->find('all', array(
            'recursive' => -1,
            'limit' => 30,
            'order' => 'Producto.id DESC',
        ));

        $almacenes = $this->Almacene->find('list', array('fields' => 'Almacene.nombre','conditions' => array('Almacene.id !=' => 1)));
        $this->set(compact('productos', 'almacenes'));
    }

    public function ingreso() {
        //debug($this->request->data);exit;
        if (!empty($this->request->data)) {
            $producto = $this->Producto->find('first', array('recursive' => -1, 'conditions' => array('Producto.id' => $this->request->data['Movimiento']['producto_id'])));
            $total = $producto['Producto']['total'] + $this->request->data['Movimiento']['ingreso'] * $producto['Producto']['uporcaja'];
            if ($total < 0) {
                $this->Session->setFlash('No se pudo guardar!!', 'msgerror');
                $this->redirect(array('action' => 'index'));
            }
            $this->Producto->id = $producto['Producto']['id'];
            //$this->request->data['Producto']['total'] = $total;
            $this->request->data['Producto']['total'] = $total;
            $this->Producto->save($this->request->data);
            $this->Movimiento->create();
            $this->request->data['Movimiento']['total'] = $total;
            $this->request->data['Movimiento']['uporcaja'] = $producto['Producto']['uporcaja'];
            $this->request->data['Movimiento']['uporcaja_salida'] = $producto['Producto']['uporcaja_salida'];
            $this->Movimiento->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente!!', 'msgbueno');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo guardar!!', 'msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function salida() {

        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $idProducto = $this->request->data['Movimiento']['producto_id'];
            //$producto = $this->_ultimomovimiento($idProducto);
            //debug($producto);die;
            //$idProducto = $this->request->data['Movimiento']['producto_id'];
            $producto = $this->Producto->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Producto.id' => $idProducto
                )
            ));
            //debug($producto);
            $cantCaja = $producto['Producto']['caja'];
            $cantMediaCaja = $producto['Producto']['media_caja'];
            $precioVenta = $producto['Producto']['precio_venta'];

            $caja = $this->request->data['Movimiento']['caja'];
            $almacen = $this->request->data['Movimiento']['almacene_id'];
            $media = $this->request->data['Movimiento']['media']+0;
            $unidades = $this->request->data['Movimiento']['unidades'];

            if (!empty($caja)) {
                $totalUnidades = $caja * $cantCaja;
            }
            else{
                $caja=0;
            }
            if (!empty($media)) {
            }
            else{
                $caja = 0;
            }
            if (!empty($media)) {
                $totalUnidades = $media * $cantMediaCaja;
            }
            else{
                $media=0;
            }
            if (!empty($unidades)) {
            } 
            else{
                $media = 0;
            }
            if (!empty($unidades)) {
                $totalUnidades = $unidades;
            }
            else {
                $unidades=0;
            }

            //validamos existencias peps
            $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    'Movimiento.id',
                    'Movimiento.precio_unitario',
                    'Movimiento.precio_importacion',
                    'Movimiento.precio_venta',
                    'Movimiento.numero',
                    'MAX(Movimiento.id) max',
                    'Movimiento.total'
                ),
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    //'Movimiento.total !=' => 0,
                    'Movimiento.almacene_id' => 1
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
            //debug($consultaTotal);exit;
            $cantidadTotal = 0;
            foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
            //debug($cantidadTotal);die;

            if ($totalUnidades > $cantidadTotal) {
                $this->Session->SetFlash('No puedes sacar mas productos de los que tienes', 'msginfo');
                $this->redirect(array('action' => 'index'));
            }
            else{
                $sobra = $totalUnidades;
                foreach ($consultaTotal as $ct) {
                    $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                    $this->request->data = null;
                    if($sobra > 0 && $consultaprincipal['Movimiento']['total'] != 0)
                    {
                        if($sobra > $consultaprincipal['Movimiento']['total'])
                        {
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['ingreso'] = 0;
                            $this->request->data['Movimiento']['salida'] = $consultaprincipal['Movimiento']['total'];
                            $this->request->data['Movimiento']['total'] = 0;
                            $this->request->data['Movimiento']['almacene_id'] = 1;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Salida';
                            $this->Movimiento->save($this->request->data['Movimiento']);
                            $ultimo_movi = $this->Movimiento->getLastInsertID();
                            //
                            $this->request->data = null;
                            $sobra = $sobra - $consultaprincipal['Movimiento']['total'];
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['ingreso'] = $consultaprincipal['Movimiento']['total'];
                            $this->request->data['Movimiento']['salida'] = 0;
                            $this->request->data['Movimiento']['total'] = $consultaprincipal['Movimiento']['total'];
                            $this->request->data['Movimiento']['almacene_id'] = $almacen;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_unitario'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_importacion'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Ingreso';
                            $this->request->data['Movimiento']['origen'] = $ultimo_movi;
                            $this->Movimiento->save($this->request->data['Movimiento']);
                        }
                        else{
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['salida'] = $sobra;
                            $this->request->data['Movimiento']['ingreso'] = 0;
                            $this->request->data['Movimiento']['total'] = $consultaprincipal['Movimiento']['total'] - $sobra;
                            $this->request->data['Movimiento']['almacene_id'] = 1;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_unitario'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_importacion'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Salida';
                            $this->Movimiento->save($this->request->data['Movimiento']);
                            $ultimo_movi = $this->Movimiento->getLastInsertID();
                            //
                            $this->request->data = null;
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['ingreso'] = $sobra;
                            $this->request->data['Movimiento']['salida'] = 0;
                            $this->request->data['Movimiento']['total'] = $sobra;
                            $this->request->data['Movimiento']['almacene_id'] = $almacen;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_unitario'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_importacion'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Ingreso';
                            $this->request->data['Movimiento']['origen'] = $ultimo_movi;
                            $this->Movimiento->save($this->request->data['Movimiento']);
                            $sobra = 0;
                        }
                    }
                }
            }
            $this->Session->setFlash('Se registro correctamente !!!!','msgbueno');
            $this->redirect(array('action' => 'index'));
           
        } else {
            $this->Session->setFlash('No se guardo!!', 'msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function _ultimomovimiento($idProducto = null) {
        $ultimoMovimiento = $this->Movimiento->find('first', array(
            'recursive' => -1,
            'conditions' => array('Movimiento.producto_id' => $idProducto),
            'order' => array('Movimiento.id DESC')
        ));
        //debug($idProducto);
        return $ultimoMovimiento;
    }

    public function registros($idProducto = null) {
        
        $this->layout = 'ajax';
        //debug('eyyybar');exit;
        $registros = $this->Movimiento->find('all', array(
            'limit' => 20, 'order' => 'Movimiento.id DESC', 
            'fields' => array('date(Movimiento.created) fecha','Movimiento.origen','Movimiento.ingreso','Movimiento.total','Almacene.nombre','Movimiento.id'),
            'conditions' => array(
                'OR' => array('Movimiento.almacene_id' => 1,'Movimiento.origen !=' => 'NULL'),
                'Movimiento.estado' => 'Ingreso','Movimiento.producto_id' => $idProducto)));
        $producto = $this->Producto->find('first', array('conditions' => array('Producto.id' => $idProducto)));
        //debug($registros);exit;
        
        
        
        //debug($idProducto);
        //debug($idAlmacen);exit;
        $almacenes = $this->Almacene->find('all');
        $totales_almacenes = array();
        $i = 0;
        foreach($almacenes as $al)
        {
            $cantidadTotal = 0;
            $totales_almacenes[$i]['Almacene']['nombre'] = $al['Almacene']['nombre']; 
            $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    'Movimiento.id',
                    'Movimiento.precio_unitario',
                    'Movimiento.precio_importacion',
                    'Movimiento.precio_venta',
                    'Movimiento.numero',
                    'MAX(Movimiento.id) max',
                    'Movimiento.total'
                ),
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    //'Movimiento.total !=' => 0,
                    'Movimiento.almacene_id' => $al['Almacene']['id']
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
            //debug($consultaTotal);exit;
            
            foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
            $totales_almacenes[$i]['Almacene']['total'] = $cantidadTotal;
            $i++;
        }
        //debug($totales_almacenes);exit;
        $ultimo_movimiento = $this->Movimiento->find('first',array('recursive' => -1,'order' => 'Movimiento.id DESC'));
        //debug($ultimo_movimiento);exit;
        $this->set(compact('registros', 'producto','totales_almacenes','ultimo_movimiento'));
    }

    public function cancela($idMovimiento = null) {
        if(!empty($idMovimiento))
        {
            $movimiento = $this->Movimiento->findByid($idMovimiento,null,null,null,null,-1);
            $this->Movimiento->delete($movimiento['Movimiento']['origen']);
            $this->Movimiento->delete($idMovimiento);
            $this->Session->setFlash('Se elimino correctamente!!!','msgbueno');
            
        }
        else{
            $this->Session->setFlash('No se encontro el Movimiento!!!','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

    public function venta($idVenta = null) {
        if (empty($idVenta)) {
            $this->Venta->create();
            $this->request->data['Venta']['user_id'] = $this->Session->read('Auth.User.id');
            $this->Venta->save($this->data);
            $idVenta = $this->Venta->getLastInsertID();
            $this->redirect(array('action' => 'venta', $idVenta));
        }

        $clientes = $this->Cliente->find('list', array('fields' => 'Cliente.nombre', 'order' => 'Cliente.nombre ASC'));
        $productos = $this->Producto->find('list', array('fields' => 'Producto.nombre', 'order' => 'Producto.nombre ASC'));
        $ventas = $this->Movimiento->find('all', array('recursive' => 0, 'conditions' => array('Movimiento.venta_id' => $idVenta)));
        $venta = $this->Venta->findByid($idVenta, null, null, -1);
        //debug($venta);exit;
        $total = 0.00;
        foreach ($ventas as $mo) {
            $total = $total + $mo['Movimiento']['precioventa'];
        }
        //$total = $this->calculaventa($idVenta);
        $this->set(compact('clientes', 'productos', 'idVenta', 'ventas', 'venta', 'total'));
    }

    public function guardacliente($idVenta = null) {
        $this->layout = 'ajax';
        $this->Venta->id = $idVenta;
        $this->Venta->save($this->data);
    }

    public function detalleproducto($idProducto = null,$idAlmacen = null) {
        $this->layout = 'ajax';
        //$idProducto = $this->request->data['Movimiento']['producto_id'];
        $cantidadTotal = 0;
        //debug($idProducto);
        //debug($idAlmacen);exit;
        if(!empty($idProducto) && !empty($idAlmacen))
        {
            $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    'Movimiento.id',
                    'Movimiento.precio_unitario',
                    'Movimiento.precio_importacion',
                    'Movimiento.precio_venta',
                    'Movimiento.numero',
                    'MAX(Movimiento.id) max',
                    'Movimiento.total'
                ),
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    //'Movimiento.total !=' => 0,
                    'Movimiento.almacene_id' => $idAlmacen
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
            //debug($consultaTotal);exit;
            
            foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
        }
        $producto = $this->Producto->findByid($idProducto,null,null,null,null,-1);
        $this->set(compact('cantidadTotal','producto'));
    }

    public function adicionaventa() {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;

        if (!empty($this->request->data)) {
            if (!empty($this->request->data['Movimiento']['producto_id']) && !empty($this->request->data['Movimiento']['salida']) && !empty($this->request->data['Movimiento']['venta_id'])) {
                if ($this->request->data['Movimiento']['salida'] > 0) {
                    $producto = $this->Producto->findByid($this->request->data['Movimiento']['producto_id']);
                    $salida = $this->request->data['Movimiento']['salida'] * $producto['Producto']['uporcaja_salida'];
                    if ($producto['Producto']['total'] > 0 && $producto['Producto']['total'] >= $salida) {

                        $this->Producto->id = $producto['Producto']['id'];
                        $this->request->data['Producto']['total'] = $producto['Producto']['total'] - $salida;
                        $this->Producto->save($this->request->data);
                        $this->Movimiento->create();
                        $this->request->data['Movimiento']['salida'] = $salida;
                        $this->request->data['Movimiento']['total'] = $producto['Producto']['total'] - $salida;
                        ;
                        $this->request->data['Movimiento']['uporcaja_salida'] = $producto['Producto']['uporcaja_salida'];
                        $this->request->data['Movimiento']['uporcaja'] = $producto['Producto']['uporcaja'];
                        $this->request->data['Movimiento']['precioventa'] = $producto['Producto']['preciocajasalida'] * $salida;
                        $this->Movimiento->save($this->request->data);
                        $mensaje = 'Se adiciono a la lista';
                        $color = 'green';
                    } else {
                        $mensaje = 'No se puede no alcanza';
                        $color = 'red';
                    }
                } else {
                    $mensaje = 'La cantidad debe ser mayor a cero';
                    $color = 'red';
                }
            } else {
                $mensaje = 'Error no se adiciono';
                $color = 'red';
            }
        } else {
            $mensaje = 'Error no se adiciono';
            $color = 'red';
        }
        $this->redirect(array('action' => 'listaproductos', $this->request->data['Movimiento']['venta_id'], $mensaje, $color));
        /* $ventas = $this->Movimiento->findAllByventa_id($this->request->data['Movimiento']['venta_id'],null,null,0);
          $total = $this->calculaventa($this->request->data['Movimiento']['venta_id']); */
        //debug($ventas);exit;
        //$this->set(compact('mensajemalo','mensaje','ventas','total'));
    }

    public function quitaventa($idMovimiento = null) {
        $this->layout = 'ajax';
        $movimiento = $this->Movimiento->findByid($idMovimiento, null, null, -1);
        $producto = $this->Producto->findByid($movimiento['Movimiento']['producto_id']);
        $this->Producto->id = $movimiento['Movimiento']['producto_id'];
        $this->request->data['Producto']['total'] = $producto['Producto']['total'] + $movimiento['Movimiento']['salida'];
        $this->Producto->save($this->request->data);
        $idVenta = $movimiento['Movimiento']['venta_id'];
        $this->Movimiento->delete($idMovimiento);
        $total = $this->calculaventa($idVenta);
        $ventas = $this->Movimiento->findAllByventa_id($idVenta, null, null, 0);
        $mensaje = 'Se retiro correctamente';
        $color = 'green';
        $this->redirect(array('action' => 'listaproductos', $idVenta, $mensaje, $color));
    }

    public function calculaventa($idVenta = null) {
        //debug($idVenta);exit;
        //debug($this->request->data);exit;
        $movimientos = $this->Movimiento->findAllByventa_id($idVenta, null, null, -1);
        $total = 0.00;
        foreach ($movimientos as $mo) {
            $total = $total + $mo['Movimiento']['precioventa'];
        }
        $this->Venta->id = $idVenta;
        //$this->request->data['Venta']['id'] = $idVenta;
        $this->request->data['Venta']['total'] = $total;
        //debug($this->request->data);exit;
        $this->Venta->save($this->request->data);

        return $total;
    }

    public function actualizatotal() {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;
        $this->Movimiento->id = $this->request->data['Movimiento']['id'];
        $this->Movimiento->save($this->request->data);
        $mensaje = 'Se actualizo correctamente';
        $color = 'green';
        $this->redirect(array('action' => 'listaproductos', $this->request->data['Movimiento']['venta_id'], $mensaje, $color));
    }

    public function listaproductos($idventa = null, $mensaje = null, $color = null) {
        $this->layout = 'ajax';
        //debug($mensaje);exit;
        $ventas = $this->Movimiento->findAllByventa_id($idventa, null, null, 0);
        $total = $this->calculaventa($idventa);
        //debug($ventas);exit;
        $this->set(compact('mensaje', 'ventas', 'total', 'color'));
    }

    public function notaventa() {
        //debug($this->request->data);exit;
        $idVenta = $this->request->data['Movimiento']['venta_id'];
        $cancelado = $this->request->data['Movimiento']['total'];
        $venta = $this->Venta->findByid($idVenta);
        $ventas = $this->Movimiento->findAllByventa_id($idVenta, null, null, 0);
        $total = $this->calculaventa($idVenta);
        $saldo = 0.00;
        if ($cancelado < $total) {
            $saldo = $total - $cancelado;
        }
        $this->Venta->id = $idVenta;
        $this->request->data['Veta']['total'] = $cancelado;
        $this->request->data['Veta']['total'] = $saldo;
        ;
        $this->Venta->save($this->request->data);
        $this->set(compact('ventas', 'venta'));
    }

    public function listadoventas() {
        $listaventas = $this->Venta->find('all', array('order' => 'Venta.id DESC'));
        //debug($listaventas);exit;
        $this->set(compact('listaventas'));
    }

    public function pedido($idPedido = null) {
        $this->Pedido->id = $idPedido;
        $this->request->data = $this->Pedido->read();
        $clientes = $this->Cliente->find('list',array('fields' => 'Cliente.nombre','order' => 'Cliente.nombre ASC'));
        $productos = $this->Producto->find('list',array('fields' => 'Producto.nombre','order' => 'Producto.nombre ASC'));
        if(!empty($idPedido))
        {
            $itemsPedido = $this->Item->findAllBypedido_id($idPedido,null,null,null,null,0);
        }
        $almacenes = $this->Almacene->find('list',array('fields' => 'Almacene.nombre'));
        //debug($this->request->data);exit;
        $this->set(compact('clientes','productos','itemsPedido','almacenes','idPedido'));
    }
    public function guardaclientepedido()
    {
        
        if(!empty($this->request->data['Pedido']))
        {
            $idPedido = $this->request->data['Pedido']['id'];
            $this->request->data['Pedido']['estado'] = 'PEDIDO';
            $this->Pedido->create();
            $this->Pedido->save($this->request->data['Pedido']);
            $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
            if(empty($idPedido))
            {
                $idPedido = $this->Pedido->getLastInsertID();
            }
            $this->redirect(array('action' => 'pedido',$idPedido));
        }
        else{
            $this->Session->setFlash('No se pudo registrar!!!','msgerror');
            $this->redirect($this->referer());
        }
        
    }
    public function guardapedido()
    {
        if(!empty($this->request->data))
        {
            $idPedido = $this->request->data['Pedido']['id'];
            $cajas = $this->request->data['Movimiento']['cajas'];
            $mediacaja = $this->request->data['Movimiento']['media_caja'];
            $unidades = $this->request->data['Movimiento']['unidades'];
            $idProducto = $this->request->data['Movimiento']['producto_id'];
            $idAlmacen = $this->request->data['Movimiento']['almacene_id'];
            //debug($this->request->data);exit;
            $verifica_existe = $this->Item->find('first',array('recursive' => -1,'conditions' => array('Item.pedido_id' => $idPedido,'Item.producto_id' => $idProducto)));
            if(!empty($verifica_existe))
            {
                $this->Session->setFlash('El producto ya esta adicionado!!!','msginfo');
                $this->redirect($this->referer());
            }
            $this->Pedido->create();
            $this->Pedido->save($this->request->data['Pedido']);
            if(empty($idPedido))
            {
                $idPedido = $this->Pedido->getLastInsertID();
            }
            $producto = $this->Producto->findByid($idProducto,null,null,null,null,-1);
            $unidad_total = 0;
            if(!empty($cajas) || !empty($mediacaja) || !empty($unidades))
            {
                $cajas = $cajas +0; $mediacaja =$mediacaja+0; $unidades = $unidades+0;
                $this->request->data['Item']['cantidad_cajas'] = $cajas; 
                $this->request->data['Item']['cantidad_media_caja'] = $mediacaja; 
                $this->request->data['Item']['cantidad_unidades'] = $unidades; 
                $unidad_total = ($producto['Producto']['caja']*$cajas) + ($producto['Producto']['media_caja']*$mediacaja)+$unidades;
            }
            
            $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    'Movimiento.id',
                    'Movimiento.precio_unitario',
                    'Movimiento.precio_importacion',
                    'Movimiento.precio_venta',
                    'Movimiento.numero',
                    'MAX(Movimiento.id) max',
                    'Movimiento.total'
                ),
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    //'Movimiento.total !=' => 0,
                    'Movimiento.almacene_id' => $idAlmacen
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
            //debug($consultaTotal);
            $cantidadTotal = 0;
            foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
            if($unidad_total > $cantidadTotal)
            {
                $this->Session->setFlash('No hay lo suficiente en almacen!!!','msginfo');
                $this->redirect($this->referer());
            }
            //debug($cantidadTotal);exit;
            $sobra = $unidad_total;
            $precio_total = 0.00;
                foreach ($consultaTotal as $ct) {
                    $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                    //debug($precio_total);
                    if($sobra > 0 && $consultaprincipal['Movimiento']['total'] != 0)
                    {
                        if($sobra > $consultaprincipal['Movimiento']['total'])
                        {
                            $sobra = $sobra - $consultaprincipal['Movimiento']['total'];
                            $precio_total = $precio_total + ($consultaprincipal['Movimiento']['precio_venta']*$consultaprincipal['Movimiento']['total']);
                        }
                        else{
                            $precio_total = $precio_total + ($consultaprincipal['Movimiento']['precio_venta']*$sobra);
                            $sobra = 0;
                        }
                    }
                }
                //exit;
            $this->request->data['Item']['precio_venta'] = $precio_total;
            $this->request->data['Item']['precio_venta_final'] = $precio_total;
            $this->request->data['Item']['pedido_id'] = $idPedido;
            $this->request->data['Item']['producto_id'] = $idProducto;
            $this->request->data['Item']['almacene_id'] = $idAlmacen;
            $this->Item->create();
            $this->Item->save($this->request->data['Item']);
            
            $this->Session->setFlash('Se registro correctamente !!!','msgbueno');
            $this->redirect(array('action' => 'pedido',$idPedido));
        }
        else{
            $this->Session->setFlash('No se pudo registrar nada!!!','msgerror');
            $this->redirect($this->referer());
        }
    }

    public function ajaxguardaprecios() {
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            //debug($this->request->data);
            $idProducto = $this->request->data['Movimiento']['producto_id'];
            $idGasto = $this->request->data['Movimiento']['gasto_id'];
            $precioUnitario = $this->request->data['Movimiento']['precio_unitario'];
            $precioImportacion = $this->request->data['Movimiento']['precio_importacion'];
            $precioVenta = $this->request->data['Movimiento']['precio_venta'];
//            debug($precioUnitario);
//            debug($precioImportacion);
//            debug($precioVenta);

            $idMovimiento = $this->Movimiento->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    'Movimiento.gasto_id' => $idGasto,
                )
            ));
            $idMovimientoM = $idMovimiento['Movimiento']['id'];
            //$this->Movimiento->read(null, $idMovimientoM);
            $this->Movimiento->id = $idMovimientoM;
            $this->Movimiento->set(array(
                'precio_unitario' => $precioUnitario,
                'precio_importacion' => $precioImportacion,
                'precio_venta' => $precioVenta
            ));
            //$this->Movimiento->save();
            if ($this->Movimiento->save()) {
                $this->set(compact('precioVenta'));
                //$this->Session->setFlash('Se guardo el precio con exito', 'msgbueno');
            }
            //$mov = $this->Movimiento->read(null, $idMovimientoM);
            //debug($mov1);
            //debug($mov);
            //debug($idMovimiento);
        }
    }
    public function ajaxitem($idItem = null)
    {
        $this->layout = 'ajax';
        $this->Item->id = $idItem;
        $this->request->data = $this->Item->read();
    }
    public function guardaitem()
    {
        if(!empty($this->request->data))
        {
            $idPedido = $this->request->data['Item']['pedido_id'];
            $cajas = $this->request->data['Item']['cantidad_cajas'];
            $mediacaja = $this->request->data['Item']['cantidad_media_caja'];
            $unidades = $this->request->data['Item']['cantidad_unidades'];
            $idProducto = $this->request->data['Item']['producto_id'];
            $idAlmacen = $this->request->data['Item']['almacene_id'];
            //debug($this->request->data);exit;
            $producto = $this->Producto->findByid($idProducto,null,null,null,null,-1);
            $unidad_total = 0;
            if(!empty($cajas) || !empty($mediacaja) || !empty($unidades))
            {
                $cajas = $cajas +0; $mediacaja =$mediacaja+0; $unidades = $unidades+0;
                $this->request->data['Item']['cantidad_cajas'] = $cajas; 
                $this->request->data['Item']['cantidad_media_caja'] = $mediacaja; 
                $this->request->data['Item']['cantidad_unidades'] = $unidades; 
                $unidad_total = ($producto['Producto']['caja']*$cajas) + ($producto['Producto']['media_caja']*$mediacaja)+$unidades;
            }
            
            $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    'Movimiento.id',
                    'Movimiento.precio_unitario',
                    'Movimiento.precio_importacion',
                    'Movimiento.precio_venta',
                    'Movimiento.numero',
                    'MAX(Movimiento.id) max',
                    'Movimiento.total'
                ),
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    //'Movimiento.total !=' => 0,
                    'Movimiento.almacene_id' => $idAlmacen
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
            //debug($consultaTotal);
            $cantidadTotal = 0;
            foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
            if($unidad_total > $cantidadTotal)
            {
                $this->Session->setFlash('No hay lo suficiente en almacen!!!','msginfo');
                $this->redirect($this->referer());
            }
            //debug($cantidadTotal);exit;
            $sobra = $unidad_total;
            $precio_total = 0.00;
                foreach ($consultaTotal as $ct) {
                    $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                    //debug($precio_total);
                    if($sobra > 0)
                    {
                        if($sobra > $consultaprincipal['Movimiento']['total'])
                        {
                            $sobra = $sobra - $consultaprincipal['Movimiento']['total'];
                            $precio_total = $precio_total + ($consultaprincipal['Movimiento']['precio_venta']*$consultaprincipal['Movimiento']['total']);
                        }
                        else{
                            $precio_total = $precio_total + ($consultaprincipal['Movimiento']['precio_venta']*$sobra);
                            $sobra = 0;
                        }
                    }
                }
                //exit;
            $this->request->data['Item']['precio_venta'] = $precio_total;
            $this->request->data['Item']['precio_venta_final'] = $precio_total;
            $this->request->data['Item']['pedido_id'] = $idPedido;
            $this->request->data['Item']['producto_id'] = $idProducto;
            $this->Item->create();
            $this->Item->save($this->request->data['Item']);
            
            $this->Session->setFlash('Se registro correctamente !!!','msgbueno');
            $this->redirect(array('action' => 'pedido',$idPedido));
        }
        $this->redirect($this->referer());
    }
    public function guardaprecio()
    {
        if(!empty($this->request->data['Item']['precio_venta_final']))
        {
            $this->Item->create();
            $this->Item->save($this->request->data['Item']);
            $this->Session->setFlash('Se guardo correctamente!!1','msgbueno');
        }
        $this->redirect($this->referer());
    }
    public function cancelarpedido($idPedido = null)
    {
        $this->Item->deleteAll(array('Item.pedido_id' => $idPedido));
        $this->Pedido->delete($idPedido);
        $this->Session->setFlash('Se cancelo pedido '.$idPedido,'msgbueno');
        $this->redirect(array('action' => 'listapedidos'));
    }
    public function listapedidos()
    {
        $pedidos = $this->Pedido->find('all',array('order' => 'Pedido.id DESC','conditions' => array('Pedido.estado' => 'PEDIDO')));
        $this->set(compact('pedidos'));
    }
    public function eliminaitem($idItem = null)
    {
        if($this->Item->delete($idItem))
        {
            $this->Session->setFlash("Se elimino correctamente!!!",'msgbueno');
        }
        else{
            $this->Session->setFlash("No se pudo completar la accion!!!",'msgerror');
        }
        $this->redirect($this->referer());
    }
    public function generaventa()
    {
        //debug($this->request->data);exit;
        $idPedido = $this->request->data['Pedido']['id'];
        $totalp = $this->request->data['Pedido']['total']; 
        $total_cancelado = $this->request->data['Pedido']['total_cancelado']; 
        $items = $this->Item->findAllBypedido_id($idPedido,null,null,null,null,-1);
        //debug($items);exit;
        
        foreach($items as $it)
        {
            $idProducto = $it['Item']['producto_id'];
            $producto = $this->Producto->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Producto.id' => $idProducto
                )
            ));
            //debug($producto);
            $cantCaja = $producto['Producto']['caja'];
            $cantMediaCaja = $producto['Producto']['media_caja'];

            $caja = $it['Item']['cantidad_cajas']+0;
            $almacen = $it['Item']['almacene_id'];
            $media = $it['Item']['cantidad_media_caja']+0;
            $unidades = $it['Item']['cantidad_unidades'];
            $totalUnidades = 0;
            if (!empty($caja)) {
                $totalUnidades = ($caja * $cantCaja) + $totalUnidades;
            } if (!empty($media)) {
                $totalUnidades = ($media * $cantMediaCaja) + $totalUnidades;
            } if (!empty($unidades)) {
                $totalUnidades = $unidades + $totalUnidades;
            }
            ///debug($totalUnidades);exit;
            //validamos existencias peps
            $consultaTotal = $this->Movimiento->find('all', array(
                'recursive' => -1,
                'fields' => array(
                    'Movimiento.id',
                    'Movimiento.precio_unitario',
                    'Movimiento.precio_importacion',
                    'Movimiento.precio_venta',
                    'Movimiento.numero',
                    'MAX(Movimiento.id) max',
                    'Movimiento.total'
                ),
                'conditions' => array(
                    'Movimiento.producto_id' => $idProducto,
                    //'Movimiento.total !=' => 0,
                    'Movimiento.almacene_id' => $almacen
                ),
                'group' => ('Movimiento.numero'),
                'order' => ('Movimiento.id ASC'),
            ));
            //debug($consultaTotal);exit;
            $cantidadTotal = 0;
            foreach ($consultaTotal as $ct) {
                $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                $cantidadTotal += $consultaprincipal['Movimiento']['total'];
            }
            //debug($cantidadTotal);die;
            if ($totalUnidades > $cantidadTotal) {
                $this->Session->SetFlash('No se puede no hay en almacen', 'msginfo');
                $this->redirect(array('action' => 'index'));
            }
            else{
                
                $sobra = $totalUnidades;
                $precio_total = 0.00;
                foreach ($consultaTotal as $ct) {
                    $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                    //debug($precio_total);
                    if($sobra > 0)
                    {
                        if($sobra > $consultaprincipal['Movimiento']['total'])
                        {
                            $sobra = $sobra - $consultaprincipal['Movimiento']['total'];
                            $precio_total = $precio_total + ($consultaprincipal['Movimiento']['precio_venta']*$consultaprincipal['Movimiento']['total']);
                        }
                        else{
                            $precio_total = $precio_total + ($consultaprincipal['Movimiento']['precio_venta']*$sobra);
                            $sobra = 0;
                        }
                    }
                }
                //debug($precio_total);
                //debug($it['Item']['precio_venta']);exit;
                if($precio_total == $it['Item']['precio_venta'])
                {
                    
                    
                
                $sobra = $totalUnidades;
                foreach ($consultaTotal as $ct) {
                    $consultaprincipal = $this->Movimiento->findByid($ct[0]['max'],null,null,null,null,-1);
                    $this->request->data = null;
                    if($sobra > 0 && $consultaprincipal['Movimiento']['total'] != 0)
                    {
                        if($sobra > $consultaprincipal['Movimiento']['total'])
                        {
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['ingreso'] = 0;
                            $this->request->data['Movimiento']['salida'] = $consultaprincipal['Movimiento']['total'];
                            $this->request->data['Movimiento']['total'] = 0;
                            $this->request->data['Movimiento']['almacene_id'] = $almacen;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Salida';
                            $this->request->data['Movimiento']['pedido_id'] = $idPedido;
                            $this->Movimiento->save($this->request->data['Movimiento']);
                            //
                            $this->request->data = null;
                            $sobra = $sobra - $consultaprincipal['Movimiento']['total'];
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['ingreso'] = $consultaprincipal['Movimiento']['total'];
                            $this->request->data['Movimiento']['salida'] = 0;
                            $this->request->data['Movimiento']['total'] = $consultaprincipal['Movimiento']['total'];
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_unitario'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_importacion'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Ingreso';
                            $this->request->data['Movimiento']['pedido_id'] = $idPedido;
                            $this->Movimiento->save($this->request->data['Movimiento']);
                        }
                        else{
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['salida'] = $sobra;
                            $this->request->data['Movimiento']['ingreso'] = 0;
                            $this->request->data['Movimiento']['total'] = $consultaprincipal['Movimiento']['total'] - $sobra;
                            $this->request->data['Movimiento']['almacene_id'] = $almacen;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_unitario'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_importacion'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Salida';
                            $this->request->data['Movimiento']['pedido_id'] = $idPedido;
                            $this->Movimiento->save($this->request->data['Movimiento']);
                            //
                            $this->request->data = null;
                            $this->Movimiento->create();
                            $this->request->data['Movimiento']['producto_id'] = $idProducto;
                            $this->request->data['Movimiento']['ingreso'] = $sobra;
                            $this->request->data['Movimiento']['salida'] = 0;
                            $this->request->data['Movimiento']['total'] = $sobra;
                            $this->request->data['Movimiento']['caja'] = $caja;
                            $this->request->data['Movimiento']['media_caja'] = $media;                
                            $this->request->data['Movimiento']['precio_unitario'] = $ct['Movimiento']['precio_unitario'];
                            $this->request->data['Movimiento']['precio_importacion'] = $ct['Movimiento']['precio_importacion'];
                            $this->request->data['Movimiento']['precio_venta'] = $ct['Movimiento']['precio_venta'];
                            $this->request->data['Movimiento']['numero'] = $ct['Movimiento']['numero'];
                            $this->request->data['Movimiento']['estado'] = 'Ingreso';
                            $this->request->data['Movimiento']['pedido_id'] = $idPedido;
                            $this->Movimiento->save($this->request->data['Movimiento']);
                            $sobra = 0;
                        }
                    }
                }
                    
                }
                else{
                    debug($precio_total);exit;
                    $this->Movimiento->deleteAll(array('Movimiento.pedido_id' => $idPedido));
                    $this->Session->setFlash('Debe de recalcular el producto '.$producto['Producto']['nombre'],'msginfo');
                    $this->redirect($this->referer());
                }
            }
        }
        $this->request->data['Pedido']['total'] = $totalp;
        $this->request->data['Pedido']['total_cancelado'] = $total_cancelado; 
        $this->request->data['Pedido']['id'] = $idPedido;
        $this->request->data['Pedido']['estado'] = 'VENDIDO';
        $this->Pedido->create();
        $this->Pedido->save($this->request->data['Pedido']);
        $this->request->data['Pago']['pedido_id'] = $idPedido;
        $this->request->data['Pago']['total'] = $total_cancelado;
        $this->Pago->create();
        $this->Pago->save($this->request->data['Pago']);
        $this->Session->setFlash('Se guardo correctamente la venta','msgbueno');
        $this->redirect(array('action' => 'listapedidos'));
        
    }
    public function listaventas()
    {
        $ventas = $this->Pedido->find('all',array('order' => 'Pedido.id DESC','conditions' => array('Pedido.estado' => 'VENDIDO')));
        $this->set(compact('ventas'));
    }
    public function cancelarventa($idPedido = null)
    {
        $this->Movimiento->deleteAll(array('Movimiento.pedido_id' => $idPedido));
        $this->Item->deleteAll(array('Item.pedido_id' => $idPedido));
        $this->Pedido->delete($idPedido);
        $this->Session->setFlash('Se Elimino correctamente!!!','msgbueno');
        $this->redirect(array('action' => 'listaventas'));
    }
    public function ajaxpagos($idPedido = null)
    {
        $this->layout = 'ajax';
        $pedido = $this->Pedido->findByid($idPedido,null,null,null,null,0);
        $pagos = $this->Pago->find('all',array('order' => 'Pago.id DESC','conditions' => array('Pago.pedido_id' => $idPedido)));
        $this->set(compact('pagos','pedido','idPedido'));
    }
    public function guardapago($idPedido = null)
    {
        if(!empty($this->request->data['Pago']['total']))
        {
            $pedido = $this->Pedido->findByid($this->request->data['Pago']['pedido_id'],null,null,null,null,-1);
            $this->Pago->create();
            $this->Pago->save($this->request->data['Pago']);
            $this->Pedido->id = $this->request->data['Pago']['pedido_id'];
            $this->request->data['Pedido']['total_cancelado'] = $pedido['Pedido']['total_cancelado'] + $this->request->data['Pago']['total'];
            
            $this->Pedido->save($this->request->data['Pedido']);
        }
        $this->Session->setFlash('Se registro de correctamente!!','msgbueno');
        $this->redirect(array('action' => 'listaventas'));
    }
    
    public function controlpanel($idAlmacen = null){
        if(empty($idAlmacen))
        {
            $almacen = $this->Almacene->find('first');
            $idAlmacen = $almacen['Almacene']['id'];
            //debug($idAlmacen);exit;
        }
        
        $cantidadVentas = $this->Pedido->find('count', array(
            'recursive'=>-1,
            'conditions'=>array('Pedido.estado'=>'VENDIDO')
        ));
        
        $cantidadPedidos = $this->Pedido->find('count', array(
            'recursive'=>-1,
            'conditions'=>array('Pedido.estado'=>'PEDIDO')
        ));
        
        $cantidadProductos = $this->Producto->find('count', array(
            'recursive'=>-1,            
        ));
        
        $ultimosProductos = $this->Producto->find('all', array(
            'recursive'=>-1,
            'limit'=>10,
            'order'=>'Producto.id DESC'
        ));
        
        $ultimosPedidos = $this->Pedido->find('all', array(
            'recursive'=>0,
            'conditions'=>array('Pedido.estado'=>'PEDIDO'),
            'order'=>'Pedido.id DESC'
        ));
        $productos_chart = $this->Producto->find('all'); 
        $almacenes = $this->Almacene->find('all');
        //debug($productos_chart);exit;
        $this->set(compact('almacenes','idAlmacen','productos_chart','cantidadVentas', 'cantidadPedidos', 'cantidadProductos', 'ultimosProductos', 'ultimosPedidos'));
    }
    public function ajaxproducto($idProducto = null)
    {
        $this->layout = 'ajax';
        $this->Producto->id = $idProducto;
        $this->request->data = $this->Producto->read();
        
    }
    public function guardaproducto()
    {
        if(!empty($this->request->data['Producto']))
        {
            $this->Producto->create();
            $this->Producto->save($this->request->data['Producto']);
            $this->Session->setFlash('Se guardo correctamente!!!!','msgbueno');
        }
        else{
            $this->Session->setFlash('No se pudo guardar!!!','msgerror');
        }
        $this->redirect($this->referer());
    }
}
