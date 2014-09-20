<?php

App::uses('AppController', 'Controller');

/**
 * Productos Controller
 *
 * @property Producto $Producto
 * @property PaginatorComponent $Paginator
 */
class ProductosController extends AppController
{

    public $layout = 'praver';

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');
    public $uses = array('Producto','Movimiento');

    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function index()
    {
        /* $this->Producto->recursive = 0;
          $this->set('productos', $this->Paginator->paginate()); */
        $productos = $this->Producto->find('all', array('order' => 'Producto.id DESC'));
        $this->set(compact('productos'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Producto->exists($id))
        {
            throw new NotFoundException(__('Invalid producto'));
        }
        $options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
        $this->set('producto', $this->Producto->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post'))
        {
            $this->Producto->create();
            if ($this->Producto->save($this->request->data))
            {
                $this->Session->setFlash(__('The producto has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The producto could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Producto->exists($id))
        {
            throw new NotFoundException(__('Invalid producto'));
        }
        if ($this->request->is(array('post', 'put')))
        {
            if ($this->Producto->save($this->request->data))
            {
                $this->Session->setFlash(__('The producto has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash(__('The producto could not be saved. Please, try again.'));
            }
        } else
        {
            $options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
            $this->request->data = $this->Producto->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Producto->id = $id;
        if (!$this->Producto->exists())
        {
            throw new NotFoundException(__('Invalid producto'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Producto->delete())
        {
            $this->Session->setFlash(__('The producto has been deleted.'));
        } else
        {
            $this->Session->setFlash(__('The producto could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function listado()
    {
        $productos = $this->Producto->find('all');
        $this->set(compact('productos'));
    }

    public function guarda()
    {
        $this->layout = 'ajax';
        $productoidd = $_POST['data']['Producto']['idd'];
        $this->request->data['Producto']['nombre'] = $_POST['data']['Producto']['nombre'];
        $this->request->data['Producto']['descripcion'] = $_POST['data']['Producto']['descripcion'];
        $this->request->data['Producto']['uporcaja'] = $_POST['data']['Producto']['cantidad'];
        //debug($productoidd);

        if (!empty($productoidd) && $productoidd != 'nada')
        {
            $this->Producto->id = $productoidd;
            $this->Producto->save($this->request->data);
        } else
        {

            $this->Producto->create();
            if ($this->Producto->save($this->request->data))
            {
                $productoidd = $this->Producto->getLastInsertID();
            }
        }
        //debug($_POST['data']['Producto']['id']);exit;
        //debug($productoidd);exit;

        $array['productoid'] = $productoidd;
        //$mens = array("primero"=>'Hola', "segundo"=>'mundo');
        $this->respond($array, true);
        //$this->respond('holaaa');
        /* $this->Producto->create();
          $this->Producto->save($this->request->data); */
    }

    public function elimina($idProducto = null)
    {
        $this->layout = 'ajax';
        //debug($idProducto);exit;
        if (!empty($idProducto))
        {
            $this->Producto->delete($idProducto);
        }
        $this->respond($array, true);
    }

    public function prueba()
    {
        
    }

    function respond($message = null, $json = false)
    {
        if ($message != null)
        {
            if ($json == true)
            {
                $this->RequestHandler->setContent('json', 'application/json');
                $message = json_encode($message);
            }
            $this->set('message', $message);
        }
        $this->render('message');
    }

    public function nuevo()
    {
        if (!empty($this->request->data))
        {
            $this->Producto->create();
            $this->Producto->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente', 'msgbueno');
            $this->redirect(array('action' => 'index'));
        } else
        {
            $this->Session->setFlash('No se guardo', 'msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function ajaxedita($idproducto = null)
    {
        $this->layout = 'ajax';
        $this->Producto->id = $idproducto;
        $this->data = $this->Producto->read();
        $this->set(compact('idalmacen'));
        //debug($this->request->data);exit;
    }

    public function elimina2($idproducto = null)
    {
        $movimientos = $this->Movimiento->findByproducto_id($idproducto,null,null,null,null,-1);
        if(empty($movimientos))
        {
            if ($this->Producto->delete($idproducto))
            {
                $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('No se pudo eliminar', 'msgerror');
                $this->redirect(array('action' => 'index'));
            }
        }
        else{
            $this->Session->setFlash('No se puede eliminar. Este producto tiene movimientos!!!','msginfo');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function nuevoproducto()
    {
        $this->layout = 'ajax';
        //debug('eynar');exit;
        if ($this->request->is('post'))
        {
            //debug($this->request->data);die;
            $precioEntrada = $this->request->data['Producto']['precio_unitarioe'];
            $precioSalida = $this->request->data['Producto']['precio_unitarios'];
            $precioCajaE = $this->request->data['Producto']['uporcaja'] * $precioEntrada;
            $precioCajaS = $this->request->data['Producto']['uporcaja_salida'] * $precioSalida;
//            debug($precioCajaE);
//            debug($precioCajaS);die;            

            $this->request->data['Producto']['preciocaja'] = $precioCajaE;
            $this->request->data['Producto']['preciocajasalida'] = $precioCajaS;
            $this->Producto->create();
            $this->Producto->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente', 'msgbueno');
            $this->redirect($this->referer());
                
        }
    }

    public function ajaxregistradatoscajas($idProducto = null)
    {
        $this->layout = 'ajax';
        $datosProducto = $this->Producto->find('first', array(
            'recursive' => -1,
            'conditions' => array('Producto.id' => $idProducto)
        ));
        $this->set(compact('datosProducto'));
        if ($this->request->is('post'))
        {
            $idProducto = $this->request->data['Producto']['producto_id'];
            $caja = $this->request->data['Producto']['caja'];
            $media = $this->request->data['Producto']['media'];
            //debug($this->request->data);die;            
            //$this->Producto->id=$idProducto;
            $this->Producto->read(null, $idProducto);
            $this->Producto->set(array(
                'caja' => $caja,
                'media_caja' => $media
            ));
            if ($this->Producto->save())
            {
                $this->redirect(array('controller' => 'Movimientos', 'action' => 'index'));
            }
        }
    }

    public function ajaxguardaganacia()
    {
        $this->layout = 'ajax';
        if ($this->request->is('post'))
        {
            //debug($this->request->data);
            $idProducto = $this->request->data['Producto']['id'];
            $porcentaje = $this->request->data['Producto']['porcentaje_ganancia'];
            $porcentajeCalculado = $porcentaje/100;
            $this->Producto->id = $idProducto;
            $this->request->data['Producto']['porcentaje_ganancia']=$porcentajeCalculado;
            if($this->Producto->save($this->request->data['Producto'])){
                $datosProducto = $this->Producto->find('first', array(
                    'recursive'=>-1,
                    'conditions'=>array('Producto.id'=>$idProducto)
                ));
                $this->set(compact('datosProducto'));
            }
        }
    }

}

?>