<?php
App::import('Model', 'Cliente');
$modeloCliente = new Cliente();
$idPedido = $itemsPedido['0']['Pedido']['cliente_id'];
$datosCliente = $modeloCliente->find('first', array(
    'recursive' => -1,
    'conditions'
        ));
?>
<div class="row">
    <div class="col-md-8">

        <?php //impresion ?>

        <div class="invoice">
            <div class="row invoice-logo">
                <div class="col-xs-4 invoice-logo-space"><img src="<?php echo $this->webroot; ?>img/logoPraver.png" alt="" /> </div>
                <div class="col-xs-4 col-centered">                    
                    <h1>PEDIDO</h1>                    
                </div>
                <div class="col-xs-4">
                    <p><h1>No. <?php echo $this->request->data['Pedido']['id']; ?></h1></p>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-4">
                    <h4><b>Cliente: </b> <?php echo $this->request->data['Cliente']['nombre']; ?></h4>
                    <!--                    <ul class="list-unstyled">
                                            <li>John Doe</li>
                                            <li>Mr Nilson Otto</li>
                                            <li>FoodMaster Ltd</li>
                                            <li>Madrid</li>
                                            <li>Spain</li>
                                            <li>1982 OOP</li>
                                        </ul>-->
                </div>
                <!--                <div class="col-xs-4">
                                    <h4>About:</h4>
                                    <ul class="list-unstyled">
                                        <li>Drem psum dolor sit amet</li>
                                        <li>Laoreet dolore magna</li>
                                        <li>Consectetuer adipiscing elit</li>
                                        <li>Magna aliquam tincidunt erat volutpat</li>
                                        <li>Olor sit amet adipiscing eli</li>
                                        <li>Laoreet dolore magna</li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 invoice-payment">
                                    <h4>Payment Details:</h4>
                                    <ul class="list-unstyled">
                                        <li><strong>V.A.T Reg #:</strong> 542554(DEMO)78</li>
                                        <li><strong>Account Name:</strong> FoodMaster Ltd</li>
                                        <li><strong>SWIFT code:</strong> 45454DEMO545DEMO</li>
                                        <li><strong>V.A.T Reg #:</strong> 542554(DEMO)78</li>
                                        <li><strong>Account Name:</strong> FoodMaster Ltd</li>
                                        <li><strong>SWIFT code:</strong> 45454DEMO545DEMO</li>
                                    </ul>
                                </div>-->
            </div>
            <div class="row">
                <div class="col-xs-12">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Producto</th>
                                <th>Cantidad</th>                                
                                <th>P. Real</th> 
                                <th>P. Final</th>                                                              
                                <th class="hidden-print">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //echo $this->Form->create('Movimiento');?>
                            <?php if (!empty($itemsPedido)): ?>
                                <?php $i = 1; ?>
                                <?php $total = 0; ?>
                                <?php foreach ($itemsPedido as $ip): ?>                            
                                    <tr>                                    
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $ip['Producto']['nombre']; ?></td>
                                        <td>
                                            <?php
                                            $cantidad = '';
                                            if ($ip['Item']['cantidad_cajas'] > 0) {
                                                $cantidad = $cantidad . ' /' . $ip['Item']['cantidad_cajas'] . ' cajas';
                                            }
                                            if ($ip['Item']['cantidad_media_caja'] > 0) {
                                                $cantidad = $cantidad . ' /' . $ip['Item']['cantidad_media_caja'] . ' media';
                                            }
                                            if ($ip['Item']['cantidad_unidades'] > 0) {
                                                $cantidad = $cantidad . ' /' . $ip['Item']['cantidad_unidades'] . ' unidades';
                                            }
                                            echo $cantidad;
                                            ?>
                                        </td>
                                        <td><?php echo $ip['Item']['precio_venta']; ?></td>
                                        <?php echo $this->Form->create('Movimiento', array('action' => 'guardaprecio')); ?>
                                        <td>
                                            <?php echo $this->Form->hidden('Item.id', array('value' => $ip['Item']['id'])); ?>
                                            <?php echo $this->Form->text('Item.precio_venta_final', array('class' => 'form-control input-small', 'type' => 'number', 'step' => 'any', 'value' => $ip['Item']['precio_venta_final'])); ?></td>   
                                        <?php $total = $total + $ip['Item']['precio_venta_final']; ?>                                                                
                                        <td class="hidden-print">
                                            <?php echo $this->Form->submit('Guardar Precio', array('class' => 'btn btn-xs dark')); ?>
                                            <?php echo $this->Form->end(); ?>
                                            <a class="btn default btn-xs green" data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'ajaxitem', $ip['Item']['id'])); ?>');"><i class="icon-edit"></i> Editar</a>                                   
                                            <a href="<?php echo $this->Html->url(array('action' => 'eliminaitem', $ip['Item']['id'])); ?>" class="btn default btn-xs red" title="Eliminar" onclick="return confirm('Desea elimiar el item <?php echo $g['Producto']['nombre']; ?>?')"><i class="icon-trash"></i> Eliminar</a>                                        
                                        </td>  

                                        <?php $i++; ?>                               
                                    </tr>
                                <?php endforeach; ?>   
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <div class="well">
                        <address>
                            <strong>Praver SRL.</strong><br />
                            Plaza Israel<br />
                            Calle nicolas acosta #123<br />
                            <abbr title="Phone">Telf:</abbr> (234) 145-1810
                        </address>
                        <address>
                            <strong>Email</strong><br />
                            <a href="mailto:#">contacto@praver.com</a>
                        </address>
                    </div>
                </div>
                <div class="col-xs-8 invoice-block">
                    <ul class="list-unstyled amounts">
                        <li><strong>Monto Total: <?php echo $total; ?></strong> </li>
<!--                        <li><strong>Discount:</strong> 12.9%</li>
                        <li><strong>VAT:</strong> -----</li>
                        <li><strong>Grand Total:</strong> $12489</li>-->
                    </ul>
                    <br />
                    <a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">Imprimir <i class="icon-print"></i></a>
                    <!--<a class="btn btn-lg green hidden-print">Submit Your Invoice <i class="icon-ok"></i></a>-->
                </div>
            </div>
        </div>

        <?php //fin de impresion ?>

        <?php if (!empty($idPedido)): ?>


            <div class="portlet box blue hidden-print">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-reorder"></i> Forma de Venta
                    </div>
                    <div class="tools">
                        <a href="" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="" class="reload"></a>
                        <a href="" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <?php echo $this->Form->create('Movimiento', array('action' => 'generaventa')); ?>
                    <?php echo $this->Form->hidden('Pedido.id'); ?>
                    <?php echo $this->Form->hidden('Pedido.total', array('value' => $total)); ?>
                    <div>
                        <div class="form-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Cancelado</label>
                                <?php echo $this->Form->text('Pedido.total_cancelado', array('class' => 'form-control')) ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue">Generar Venta</button>

                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>                        
            <?php //echo $this->Html->link('Generar Venta',array('action' => 'generaventa',$idPedido),array('class' => 'btn btn-warning')); ?>
        <?php endif; ?>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-4 hidden-print">
        <h3 class="page-title">
            Seleccione Item 
        </h3>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-reorder"></i> Datos de Venta
                </div>
                <div class="tools">
                    <a href="" class="collapse"></a>

                </div>
            </div>
            <div class="portlet-body form">
                <div role="form">
                    <?php echo $this->Form->create('Movimiento', array('action' => 'guardaclientepedido', 'id' => 'formpedido')); ?>
                    <div class="form-body">
                        <div class="form-group" >
                            <label>Cliente</label>
                            <?php echo $this->Form->hidden('Pedido.id'); ?>
                            <?php echo $this->Form->select('Pedido.cliente_id', $clientes, array('class' => 'form-control input-large select2me', 'data-placeholder' => 'Seleccione el cliente', 'required', 'id' => 'selectcliente', 'onChange' => '$("#formpedido").submit();')); ?>                          
                        </div>
                        <?php echo $this->Form->end(); ?>
                        <?php echo $this->Form->create('Movimiento', array('action' => 'guardapedido')); ?>
                        <?php echo $this->Form->hidden('Pedido.id'); ?>
                        <?php echo $this->Form->hidden('Pedido.cliente_id'); ?>
                        <?php //echo $this->Form->create('Movimiento'); ?>
                        <div class="form-group">
                            <label>Almacen</label>
                            <?php echo $this->Form->select('almacene_id', $almacenes, array('class' => 'form-control input-large select2me', 'data-placeholder' => 'Seleccione el Almacen', 'required', 'id' => 'selectalmacen')); ?>
                        </div>
                        <div class="form-group">
                            <label >Productos</label>
                            <?php echo $this->Form->select('producto_id', $productos, array('class' => 'form-control input-large select2me', 'data-placeholder' => 'Seleccione el Producto', 'required', 'id' => 'selectproducto')); ?>                           
                            <script>
                                $('#selectproducto').change(function() {
                                    var id = $('#selectproducto').val();
                                    var idalmacen = $('#selectalmacen').val();
                                    //alert('Cambio'+id);
                                    $('#divdetalleproducto').load('<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'detalleproducto')); ?>/' + id + '/' + idalmacen);
                                });
                                $('#selectalmacen').change(function() {
                                    var id = $('#selectproducto').val();
                                    var idalmacen = $('#selectalmacen').val();
                                    //alert('Cambio'+id);
                                    $('#divdetalleproducto').load('<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'detalleproducto')); ?>/' + id + '/' + idalmacen);
                                });
                            </script>
                        </div>

                        <div class="form-group" id="divdetalleproducto">
                        </div>
                        <div class="portlet-body">
                            <ul  class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab">Cajas</a></li>
                                <li class=""><a href="#tab_1_2" data-toggle="tab">Media Cajas</a></li>
                                <li class=""><a href="#tab_1_3" data-toggle="tab">Unidades</a></li>
                            </ul>
                            <div  class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1_1">
                                    <div class="form-group">
                                        <label >Cantidad de cajas</label>
                                        <?php echo $this->Form->text('cajas', array('class' => 'form-control input-small', 'type' => 'number', 'min' => 1, 'id' => 'cantidadpro')); ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_1_2">
                                    <div class="form-group">
                                        <label >Cantidad de Medias  Cajas</label>
                                        <?php echo $this->Form->text('media_caja', array('class' => 'form-control input-small', 'type' => 'number', 'min' => 1, 'id' => 'cantidadpro')); ?>                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_1_3">
                                    <div class="form-group">
                                        <label>Unidades</label>
                                        <?php echo $this->Form->text('unidades', array('class' => 'form-control input-small', 'type' => 'number', 'min' => 1, 'id' => 'cantidadpro')); ?>                                        
                                    </div>
                                </div>                               
                            </div>
                        </div>
                        <button type="submit" class="btn green"><i class="icon-arrow-left"></i> Adiciona Producto a la venta</button>
                        <?php $this->Form->end(); ?>                        
                        <br />

                    </div>                    
                </div>
                <div class="form-actions right">
                    <?php //echo $this->Html->link('Terminar Venta',array('action' => 'notaventa',$idVenta),array('class' => 'btn blue'));   ?> 
                    <button type="button" class="btn default" onclick="location = '<?php echo $this->Html->url(array('action' => 'cancelarpedido', $idPedido)); ?>'">Cancelar</button>  
                    <button type="button" class="btn blue" onclick="location = '<?php echo $this->Html->url(array('action' => 'listapedidos')); ?>'">Terminar Pedido</button>                             
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo $this->Js->writeBuffer(); ?>