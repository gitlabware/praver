<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Producto: <?php echo $this->request->data['Producto']['nombre']?></h4>
</div>
<?php echo $this->Form->create('Movimiento', array('action' => 'guardaproducto')) ?>
<div class="modal-body" >
    <div class="row">
        <div class="col-md-12">

            <label >Cantidad por Caja</label>
            <?php echo $this->Form->hidden('Producto.id');?>
            <?php echo $this->Form->text('Producto.caja', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number')); ?>

            <label >Cantidad media Caja</label>
            <?php echo $this->Form->text('Producto.media_caja', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn blue">Guardar</button>
</div>