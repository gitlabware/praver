<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Nuevo Producto</h4>
</div>
<?php echo $this->Form->create('Producto', array('action' => 'nuevoproducto')) ?>
<div class="modal-body" >
    <div class="row">
        <div class="col-md-12">

            <label >Nombre</label>
            <?php echo $this->Form->text('nombre', array('class' => 'form-control input-lg', 'placeholder' => 'Nombre del Producto', 'required')); ?>

            <label >Descripcion</label>
            <?php echo $this->Form->text('descripcion', array('class' => 'form-control input-lg', 'placeholder' => 'Descripcion del almacen')); ?>

            <label >Cantidad por Caja</label>
            <?php echo $this->Form->text('caja', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number')); ?>

            <label >Cantidad media Caja</label>
            <?php echo $this->Form->text('media_caja', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
            
            <label >Precio Unitario</label>
            <?php echo $this->Form->text('precio_unitario', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn blue">Guardar</button>
</div>