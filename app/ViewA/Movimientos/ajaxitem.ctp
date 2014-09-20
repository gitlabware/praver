<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><b>Producto: </b><?php //debug($datosGasto);  ?><?php echo $item['Producto']['nombre']; ?> </h4>
</div>
<?php echo $this->Form->create('Movimiento',array('action' => 'guardaitem')); ?>
<div class="modal-body">    
    <div class="scroller" data-always-visible="1" data-rail-visible1="1">
        <div class="row">
            <div class="col-md-4">
                <h4>Cajas</h4>
                <?php echo $this->Form->hidden('Item.id'); ?>
                <?php echo $this->Form->hidden('Item.almacene_id'); ?>
                <?php echo $this->Form->hidden('Item.producto_id'); ?>
                <?php echo $this->Form->hidden('Item.pedido_id'); ?>
                <p><?php echo $this->Form->text('Item.cantidad_cajas',array('class' => 'col-md-12 form-control','type' => 'number'));?></p>                
            </div>
            <div class="col-md-4">
                <h4>Media Caja</h4>
                <p><?php echo $this->Form->text('Item.cantidad_media_caja',array('class' => 'col-md-12 form-control','type' => 'number'));?></p>                 
            </div>
            <div class="col-md-4">
                <h4>Unidades</h4>
                <p><?php echo $this->Form->text('Item.cantidad_unidades',array('class' => 'col-md-12 form-control','type' => 'number'));?></p> 
            </div>
        </div>
        
        
    </div>
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn default">Cerrar</button>
    <button type="submit" class="btn green">Editar</button>
</div>
