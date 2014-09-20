<?php //debug($idVenta);exit; ?>
<div class="row">
    <div class="col-md-8">
        <h3 class="page-title">
            Venta 
        </h3>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Lista de Productos a vender</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive" id="contenidoventas">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cajas</th>
                                <th>Total</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //echo $this->Form->create('Movimiento');?>
                            <?php foreach ($ventas as $ven): ?>
                                <tr>
                                    <?php echo $this->Form->create('Movimiento', array('id' => 'formul' . $ven['Movimiento']['id'])); ?>
                                    <td><?php echo $ven['Producto']['nombre']; ?></td>
                                    <td><?php echo $ven['Movimiento']['salida'] / $ven['Movimiento']['uporcaja_salida']; ?></td>
                                    <td><?php echo $ven['Movimiento']['salida'] ?></td>

                                    <td><?php echo $this->Form->text('precioventa', array('id' => 'precioventa' . $ven['Movimiento']['id'], 'type' => 'number', 'step' => 'any', 'value' => $ven['Movimiento']['precioventa'])); ?></td>
                                    <td>
                                        <?php
                                        echo $this->Js->link('Quitar', array('controller' => 'Movimientos', 'action' => 'quitaventa', $ven['Movimiento']['id']), array('update' => '#contenidoventas', 'class' => 'label label-sm label-danger', 'escape' => false, 'confirm' => 'Esta seguro de Quitar de la lista'));
                                        ?>
                                        <a href="javascript:;" class="label label-sm label-success" id="actualiza<?php echo $ven['Movimiento']['id']; ?>">Actualizar</a>
                                        <?php //echo $this->Form->end();?>

                                    </td>
                                    <?php echo $this->Form->hidden('id', array('value' => $ven['Movimiento']['id'], 'id' => 'idmovi' . $ven['Movimiento']['id'])); ?>
                                    <?php echo $this->Form->hidden('venta_id', array('value' => $ven['Movimiento']['venta_id'], 'id' => 'idmovi' . $ven['Movimiento']['id'])); ?>
                                    <?php
                                    $this->Js->get('#actualiza' . $ven['Movimiento']['id'])->event(
                                            'click', $this->Js->request(
                                                    array('action' => 'actualizatotal'), array('async' => true,
                                                'update' => '#contenidoventas',
                                                'method' => 'post', 'dataExpression' => true,
                                                'data' => '$("#formul' . $ven['Movimiento']['id'] . '").serialize()'
                                                    )
                                            )
                                    );
                                    ?>
                                    <?php echo $this->Form->end(); ?>
                                </tr>
                                <?php endforeach; ?>   
                        </tbody>
                    </table>
                    <div style="text-align: right;">
                        <h3>Total: <?php echo $total; ?></h3>
                    </div>
                </div>

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-4">
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
<?php echo $this->Form->create('Venta'); ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label>Cliente</label>
<?php echo $this->Form->select('cliente_id', $clientes, array('class' => 'form-control input-large select2me', 'data-placeholder' => 'Seleccione el cliente', 'required', 'id' => 'selectcliente', 'value' => $venta['Venta']['cliente_id'])); ?>

                            <?php
                            $this->Js->get('#selectcliente');
                            $this->Js->event('change', $this->Js->request(
                                            array('action' => 'guardacliente', $idVenta), array('async' => true,
                                        //'update' => '#divcliente',
                                        //'before' => '$("#imagencargando'.$p['EventosPista']['id'].'").toggle(400);',
                                        //'complete' => '$("#imagencargando'.$p['EventosPista']['id'].'").toggle(400);',
                                        'method' => 'post', 'dataExpression' => true,
                                        'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true)))));
                            ?>
                            <?php echo $this->Form->end(); ?>

                        </div>
<?php echo $this->Form->create('Movimiento'); ?>
                        <div class="form-group">
                            <label >Productos</label>
<?php echo $this->Form->select('producto_id', $productos, array('class' => 'form-control input-large select2me', 'data-placeholder' => 'Seleccione el Producto', 'required', 'id' => 'selectproducto')); ?>
                            <?php
                            $this->Js->get('#selectproducto');
                            $this->Js->event('change', $this->Js->request(
                                            array('action' => 'detalleproducto'), array('async' => true,
                                        'update' => '#divdetalleproducto',
                                        //'before' => '$("#imagencargando'.$p['EventosPista']['id'].'").toggle(400);',
                                        //'complete' => '$("#imagencargando'.$p['EventosPista']['id'].'").toggle(400);',
                                        'method' => 'post', 'dataExpression' => true,
                                        'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true)))));
                            ?>


                        </div>
                        <div class="form-group" id="divdetalleproducto">

                        </div>

                        <div class="form-group">
                            <label >Cantidad en cajas</label>
<?php echo $this->Form->text('Movimiento.salida', array('class' => 'form-control input-small', 'required', 'type' => 'number', 'min' => 1, 'id' => 'cantidadpro')); ?>
                            <?php echo $this->Form->hidden('venta_id', array('value' => $idVenta)); ?>
                        </div>
                            <?php
                            echo $this->Js->submit('Adicionar producto a la lista', array('url' => '/Movimientos/adicionaventa',
                                'update' => '#contenidoventas',
                                'before' => '$("#divdetalleproducto").empty(); $("#cantidadpro").val("");',
                                'novalidate' => false, 'class' => 'btn green'));
                            echo $this->Form->end();
                            ?>
                        <?php echo $this->Form->create('Movimiento', array('action' => 'notaventa')) ?>
                        <br />
                        <div class="form-group">
                            <label>Total Cancelado</label>
                        <?php echo $this->Form->text('Movimiento.total', array('class' => 'form-control input-small', 'required', 'type' => 'number', 'min' => 0, 'id' => 'cantidadpro', 'step' => 'any', 'value' => 0.00)); ?>
<?php echo $this->Form->hidden('venta_id', array('value' => $idVenta)); ?>
                        </div>
                    </div>
                            <?php //echo $this->Form->end();?>
                </div>
                <div class="form-actions right">
                    <?php //echo $this->Html->link('Terminar Venta',array('action' => 'notaventa',$idVenta),array('class' => 'btn blue')); ?> 
                    <button type="button" class="btn default" onclick="location = '<?php echo $this->Html->url(array('action' => 'cancelaventa', $idVenta)); ?>'">Cancelar</button>  
                    <button type="submit" class="btn blue" >Terminar Venta</button>                             
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Editar Almacen</h4>
            </div>
<?php echo $this->Form->create('Movimiento', array('action' => 'nuevo')); ?>
            <div class="modal-body" id="editar">

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
<?php echo $this->Js->writeBuffer(); ?>