<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Producto: <b><?php echo $datosProducto['Producto']['nombre']; ?></b></h4>
</div>
<?php echo $this->Form->create('Producto') ?>
<div class="modal-body" >
    <div class="row">
        <div class="col-md-12">

            <label>Cantidad por caja</label>
            <?php echo $this->Form->text('caja', array('type'=>'number', 'class' => 'form-control input-lg', 'placeholder' => 'Ingrese la cantidad', 'required')); ?>
            <?php echo $this->Form->hidden('producto_id', array('value'=>$datosProducto['Producto']['id'])); ?>
            <label >Cantidad por media caja</label>
            <?php echo $this->Form->text('media', array('type'=>'number', 'class' => 'form-control input-lg', 'placeholder' => 'Ingrese la cantidad')); ?>           

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn blue">Guardar</button>
</div>