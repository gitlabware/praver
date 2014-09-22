<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><b>Cliente: </b><?php echo $pedido['Cliente']['nombre']; ?> </h4>
</div>
<?php echo $this->Form->create('Movimiento',array('action' => 'guardapago')); ?>
<div class="modal-body">    
    <div class="scroller" data-always-visible="1" data-rail-visible1="1">
        <div class="row">
            
            <div class="col-md-6">
                <h4>Nuevo Pago</h4>             
            </div>
            <div class="col-md-6">
                <?php echo $this->Form->hidden('Pago.pedido_id',array('value' => $pedido['Pedido']['id']));?>
                <p><?php echo $this->Form->text('Pago.total',array('class' => 'col-md-12 form-control','type' => 'number'));?></p> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                <thead>
                <tr>
                <td>Fecha</td>
                <td>Cantidad</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pagos as $pa):?>
                <tr>
                <td><?php echo $pa['Pago']['created']?></td>
                <td><?php echo $pa['Pago']['total']?></td>
                </tr>
                <?php endforeach;?>
                <tr>
                <td>TOTAL</td>
                <td><?php echo $pedido['Pedido']['total_cancelado'];?></td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
<?php echo $this->Form->submit('Guardar',array('class' => 'btn green'));?>
    <?php 
                   /* echo $this->Js->submit('Guardar', array(
                        'url' => array(
                            'action' => 'guardapago',$idPedido
                        ),
                        'before' => "$('#contenidomodaluno').toggle();",
                        'update' => '#contenidomodaluno',
                        'success' => "$('#contenidomodaluno').toggle(100);",
                        'class' => 'btn green'
                    )
                );*/
    ?>
    
</div>
<?php echo $this->Form->end();?>