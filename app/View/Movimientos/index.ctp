    <?php //debug(date("Y-m-d H:i:s"));exit;?>
    <?php
App::import('Model', 'Movimiento');
$modeloMovimientos = new Movimiento();
?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Movimientos</h3>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Listado de Movimiento de Productos</div>

            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-full-width" id="tablaMov">
                <thead>
                    <tr>
                        <th>Producto</th>                            
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $pro): ?>
                        <?php $idProducto = $pro['Producto']['id']; ?>
                        <tr>
                            <td><?php echo $pro['Producto']['nombre']; ?></td>                               
                            <td>
                                <?php
                                //echo $pro['Producto']['total'];
                                //$sql = "selec * from movimientos";
                                $consultaTotal = $modeloMovimientos->find('all', array(
                                    'recursive' => -1,
                                    'fields' => array('Movimiento.id', 'MAX(Movimiento.id) max', 'Movimiento.total'),
                                    'conditions' => array('Movimiento.producto_id' => $idProducto, 'Movimiento.almacene_id' => 1),
                                    'group' => ('Movimiento.numero')
                                ));
                                //debug($consultaTotal);

                                $cantidadTotal = 0;
                                foreach ($consultaTotal as $ct) {
                                    $consultaprincipal = $modeloMovimientos->find('first', array('recursive' => -1, 'conditions' => array('Movimiento.id' => $ct[0]['max'])));
                                    $cantidadTotal += $consultaprincipal['Movimiento']['total'];
                                }
                                echo $cantidadTotal;                                    //                                   
                                ?>
                            </td>
                            <td>
                                <?php if ($pro['Producto']['caja'] == 0): ?>
                                    <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'ajaxregistradatoscajas', $pro['Producto']['id'])); ?>');"title="Registro de cantidades Cajas">
                                        <?php echo $this->Html->image('iconos/cantidad.png'); ?>
                                    </a>
                                <?php else: ?>                                                                        
                                    <a data-toggle="modal" href="#enviaC_<?php echo $pro['Producto']['id'] ?>"title="CAJA">
                                        <?php echo $this->Html->image('iconos/caja.png'); ?>
                                    </a>                                        
                                    <a data-toggle="modal" href="#enviaMc_<?php echo $pro['Producto']['id'] ?>"title=" MEDIA CAJA">
                                        <?php echo $this->Html->image('iconos/box.png'); ?>
                                    </a>
                                    <a data-toggle="modal" href="#enviaU_<?php echo $pro['Producto']['id'] ?>"title="UNIDAD">
                                        <?php echo $this->Html->image('iconos/unidad.png'); ?>
                                    </a>
                                <?php endif; ?>                                        
                    <!--<a  data-toggle="modal" href="#basic<?php //echo $pro['Producto']['id']     ?>">Ingresar </a>-->                                     
                                <a  data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'registros', $pro['Producto']['id'])); ?>');"title="registrar Almacen">
                                    <?php echo $this->Html->image('iconos/registro.png'); ?>
                                </a>
                            </td>
                        </tr>

                    <div class="modal fade" id="basic<?php echo $pro['Producto']['id'] ?>" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"><?php echo $pro['Producto']['nombre'] ?></h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo $this->Form->create('Movimiento', array('action' => 'ingreso')); ?>
                                    <b>Cantidad a almacen principal: </b> <?php echo $this->Form->text('ingreso', array('placeholder' => 'Ingrese la cantidad ')); ?>
                                    <?php echo $this->Form->hidden('producto_id', array('value' => $pro['Producto']['id'])); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn blue">Guardar</button>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade" id="enviaC_<?php echo $pro['Producto']['id'] ?>" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Producto: <b><?php echo $pro['Producto']['nombre']; ?></b></h4>
                                    <h4>Cant. CAJA: <b><?php echo $pro['Producto']['caja']; ?></b> Unidades &nbsp;&nbsp;&nbsp; Cant. MEDIA CAJA: <b><?php echo $pro['Producto']['media_caja']; ?></b> Unidades</h4>
                                </div>
                                <?php echo $this->Form->create('Movimiento', array('action' => 'salida')); ?>
                                <div class="modal-body">                                      

                                    <?php echo $this->Form->hidden('producto_id', array('value' => $pro['Producto']['id'])); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php //echo $this->Form->create('Movimiento');?>
                                            <p>
                                                <b>Cantidad de Cajas: </b> <?php echo $this->Form->text('caja', array('placeholder' => 'Ingrese la cantidad Ej: 4', 'required', 'type' => 'number', 'class' => 'col-md-12 form-control')); ?>
                                            </p>                                                
                                            <p>
                                                <b>Almacen: </b> <?php echo $this->Form->select('almacene_id', $almacenes, array('required', 'class' => 'col-md-12 form-control')); ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn blue">Guardar</button>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade" id="enviaMc_<?php echo $pro['Producto']['id'] ?>" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Producto: <b><?php echo $pro['Producto']['nombre']; ?></b></h4>
                                    <h4>Cant. CAJA: <b><?php echo $pro['Producto']['caja']; ?></b> Unidades &nbsp;&nbsp;&nbsp; Cant. MEDIA CAJA: <b><?php echo $pro['Producto']['media_caja']; ?></b> Unidades</h4>
                                </div>
                                <?php echo $this->Form->create('Movimiento', array('action' => 'salida')); ?>
                                <div class="modal-body">                                      

                                    <?php echo $this->Form->hidden('producto_id', array('value' => $pro['Producto']['id'])); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php //echo $this->Form->create('Movimiento');?>                                               
                                            <p>
                                                <b>Cantidad de <b>Medias</b> Cajas: </b> <?php echo $this->Form->text('media', array('placeholder' => 'Ingrese la cantidad Ej: 2', 'type' => 'number', 'required', 'class' => 'col-md-12 form-control')); ?>
                                            </p>                                                
                                            <p>
                                                <b>Almacen: </b> <?php echo $this->Form->select('almacene_id', $almacenes, array('required', 'class' => 'col-md-12 form-control')); ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn blue">Guardar</button>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade" id="enviaU_<?php echo $pro['Producto']['id'] ?>" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Producto: <b><?php echo $pro['Producto']['nombre']; ?></b></h4>
                                    <h4>Cant. CAJA: <b><?php echo $pro['Producto']['caja']; ?></b> Unidades &nbsp;&nbsp;&nbsp; Cant. MEDIA CAJA: <b><?php echo $pro['Producto']['media_caja']; ?></b> Unidades</h4>
                                </div>
                                <?php echo $this->Form->create('Movimiento', array('action' => 'salida')); ?>
                                <div class="modal-body">                                      

                                    <?php echo $this->Form->hidden('producto_id', array('value' => $pro['Producto']['id'])); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php //echo $this->Form->create('Movimiento');?>                                                
                                            <p>
                                                <b>Unidades del Producto: </b> <?php echo $this->Form->text('unidades', array('placeholder' => 'Ingrese la cantidad Ej: 25', 'type' => 'number', 'required', 'class' => 'col-md-12 form-control')); ?>
                                            </p>
                                            <p>
                                                <b>Almacen: </b> <?php echo $this->Form->select('almacene_id', $almacenes, array('required', 'class' => 'col-md-12 form-control')); ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn blue">Guardar</button>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                <?php endforeach; ?> 

                </tbody>
            </table>
        </div>
    </div>
</div>




</div>
<script>
    jQuery(document).ready(function() {
        $('#tablaMov').dataTable({
            "aoColumns": [
                {"asSorting": ["asc"]},
                null,
                null
            ]
        });
    });
</script>

