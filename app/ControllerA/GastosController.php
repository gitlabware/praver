<?php

App::uses('AppController', 'Controller');

/**
 * Gastos Controller
 *
 * @property Gasto $Gasto
 * @property PaginatorComponent $Paginator
 */
class GastosController extends AppController {

    public $layout = 'praver';

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Gasto', 'Parametro', 'Producto', 'Movimiento', 'Parametro');
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->Gasto->recursive = 0;
        //$this->set('gastos', $this->Paginator->paginate());
        $gastos = $this->Gasto->find('all', array(
            'recursive' => 0,
                //'conditions' => array('Gasto.estado' => 'Calculado')
        ));
        $this->set(compact('gastos'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Gasto->exists($id)) {
            throw new NotFoundException(__('Invalid gasto'));
        }
        $options = array('conditions' => array('Gasto.' . $this->Gasto->primaryKey => $id));
        $this->set('gasto', $this->Gasto->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Gasto->create();
            if ($this->Gasto->save($this->request->data)) {
                $this->Session->setFlash(__('The gasto has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gasto could not be saved. Please, try again.'));
            }
        }
        $productos = $this->Gasto->Producto->find('list');
        $this->set(compact('productos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Gasto->exists($id)) {
            throw new NotFoundException(__('Invalid gasto'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Gasto->save($this->request->data)) {
                $this->Session->setFlash(__('The gasto has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gasto could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Gasto.' . $this->Gasto->primaryKey => $id));
            $this->request->data = $this->Gasto->find('first', $options);
        }
        $productos = $this->Gasto->Producto->find('list');
        $this->set(compact('productos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Gasto->id = $id;
        if (!$this->Gasto->exists()) {
            throw new NotFoundException(__('Invalid gasto'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Gasto->delete()) {
            $this->Session->setFlash(__('The gasto has been deleted.'));
        } else {
            $this->Session->setFlash(__('The gasto could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function nuevo($numeroCompra = null) {
        
        $productos = $this->Producto->find('all', array(
            'recursive' => -1,
            'fields' => array('id', 'nombre')
        ));

        $gastos = $this->Gasto->find('all', array(
            'recursive' => 0,
            'conditions' => array('Gasto.numero' => $numeroCompra),
            'limit' => 20,
            'order' => 'Gasto.id ASC',
        ));

        $primerGasto = $this->Gasto->find('first', array(
            'recursive' => 1,
            'conditions' => array(
                'Gasto.numero' => $numeroCompra,
            ),
            'order' => 'Gasto.id ASC',
        ));

        if ($this->request->is('post')) {
            //debug($this->request->data);
            //die;

            $verficaDatos = $this->Gasto->find('count');

            if ($verficaDatos != 0) {

                $buscaNumero = $this->Gasto->find('first', array(
                    'recursive' => -1,
                    'order' => 'Gasto.id DESC'
                ));

                $numero = $buscaNumero['Gasto']['numero'];
                $datoDolar = $this->request->data['Parametro']['cambio_dolar'];

                if (!empty($datoDolar)) {
                    $numeroGasto = ++$numero;
                } else {
                    $numeroGasto = $numero;
                }
            } else {
                $numeroGasto = 1;
            }

            $idProducto = $this->request->data['Gasto']['producto_id'];

            if (empty($idProducto)) {
                $this->request->data['Producto']['nombre'] = $this->request->data['Gasto']['nombre'];
                $this->Producto->create();
                $this->Producto->save($this->request->data['Producto']);
                $idProducto = $this->Producto->getLastInsertID();
            }

            $this->request->data['Movimiento']['producto_id'] = $idProducto;
            $this->request->data['Movimiento']['almacene_id'] = 1;
            $this->request->data['Movimiento']['ingreso'] = $this->request->data['Gasto']['cantidad'];
            $this->request->data['Movimiento']['estado'] = 'Ingreso';
            $this->request->data['Movimiento']['total'] = $this->request->data['Gasto']['cantidad'];
            $this->Movimiento->create();
            if ($this->Movimiento->save($this->request->data['Movimiento'])) {
                $idMovimiento = $this->Movimiento->getLastInsertID();
                $this->request->data['Gasto']['numero'] = $numeroGasto;
                $this->request->data['Gasto']['estado'] = 'Nuevo';
                $this->request->data['Gasto']['producto_id'] = $idProducto;

                $this->Gasto->create();
                if ($this->Gasto->save($this->request->data['Gasto'])) {
                    $idGasto = $this->Gasto->getLastInsertID();
                    $data = array('id' => $idMovimiento, 'gasto_id' => $idGasto,'numero' => $idMovimiento);
                    $this->Movimiento->save($data);

                    $this->request->data['Parametro']['gasto_id'] = $idGasto;
                    $cambioDolar = $this->request->data['Parametro']['cambio_dolar'];
                    if (!empty($cambioDolar)) {
                        $this->Parametro->create();
                        if ($this->Parametro->save($this->request->data['Parametro'])) {
                            $this->Session->setFlash('Registro correcto', 'msgbueno');
                            $this->redirect(array('action' => 'nuevo', $numeroGasto));
                        }
                    } else {
                        $this->Session->setFlash('Registro correcto', 'msgbueno');
                        $this->redirect(array('action' => 'nuevo', $numeroGasto));
                    }
                }
            }

            //else del is post
        } else {
            
        }
        $this->set(compact('productos', 'gastos', 'primerGasto'));
    }

    public function generar($numero = null) {

        $this->Gasto->updateAll(
                array('Gasto.estado' => "'Calculado'"), array('Gasto.numero' => $numero)
        );
        $this->redirect(array('action' => 'generado', $numero));
    }

    public function generado($numero = null) {

//        $gastoFinal = $this->Gasto->find('first', array(
//            'recursive' => -1,
//            'order' => 'Gasto.id DESC'
//        ));
//
//        $numeroPedido = $gastoFinal['Gasto']['numero'];

        $itemParametro = $this->Gasto->find('first', array(
            'conditions' => array('Gasto.numero' => $numero),
            'fields' => array('MIN(Gasto.id) as id'),
            'group' => ('Gasto.numero')
        ));

        $idGasto = $itemParametro['0']['id'];
        //debug($itemParametro);die;

        $items = $this->Gasto->find('all', array(
            'recursive' => 0,
            'conditions' => array('Gasto.numero' => $numero)
        ));
        //debug($numeroPedido);die;
        $parametros = $this->Parametro->find('first', array(
            'recursive' => -1,
            'conditions' => array('Parametro.gasto_id' => $idGasto)
        ));

        $this->set(compact('items', 'parametros'));

//        debug($gastoFinal);
//        debug($items);
    }

    public function verdetalle($numero = null) {
        $gastoFinal = $this->Gasto->find('first', array(
            'recursive' => -1,
            'conditions' => array('Gasto.numero' => $numero),
            'order' => 'Gasto.id DESC'
        ));

        $numeroPedido = $gastoFinal['Gasto']['numero'];

        $itemParametro = $this->Gasto->find('first', array(
            'conditions' => array('Gasto.numero' => $numeroPedido),
            'fields' => array('MIN(Gasto.id) as id'),
            'group' => ('Gasto.numero')
        ));

        $idGasto = $itemParametro['0']['id'];
        //debug($itemParametro);die;

        $items = $this->Gasto->find('all', array(
            'recursive' => 0,
            'conditions' => array('Gasto.numero' => $numeroPedido)
        ));
        //debug($numeroPedido);die;
        $parametros = $this->Parametro->find('first', array(
            'recursive' => -1,
            'conditions' => array('Parametro.gasto_id' => $idGasto)
        ));

        $this->set(compact('items', 'parametros'));
    }

    public function eliminaitem($idItem = null, $numero = null) {
        //debug($idItem);die;
        if ($this->Gasto->delete($idItem)) {
            $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
            $this->redirect(array('action' => 'nuevo', $numero));
        } else {
            $this->Session->setFlash('No se pudo eliminar', 'msgerror');
            $this->redirect(array('action' => 'nuevo', $numero));
        }
    }

    public function editaitemgasto($idGasto = null, $numero = null) {
        $this->layout = 'ajax';
        $datosGasto = $this->Gasto->find('first', array(
            'recursive' => 0,
            'conditions' => array('Gasto.id' => $idGasto)
        ));
        if ($this->request->is('post')) {
            //debug($this->request->data);
            //die;
            $this->Gasto->read(null, $idGasto);
            $this->Gasto->set(array(
                'cantidad' => $this->request->data['Gasto']['cantidad'],
                'precio_unitario' => $this->request->data['Gasto']['precio_unitario'],
                'camion_ayudantes' => $this->request->data['Gasto']['camion_ayudantes'],
            ));
            if ($this->Gasto->save()) {
                $this->redirect(array('action' => 'nuevo', $numero));
            }
        }
        $this->set(compact('datosGasto', 'numero'));
    }
    public function eliminagasto($idGasto = null)
    {
        if(!empty($idGasto))
        {
            $movimiento = $this->Movimiento->findBygasto_id($idGasto,null,null,null,null,-1);
            $this->Gasto->delete($idGasto);
            $this->Movimiento->deleteAll(array('Movimiento.numero' => $movimiento['Moviminto']['numero']));
            $this->Session->setFlash('Se elimino correctamente!!!','msgbueno');
        }
        else{
            $this->Session->setFlash('No se puede eliminar!!!','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
