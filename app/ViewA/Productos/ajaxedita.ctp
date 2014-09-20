<?php echo $this->Form->create('Producto'); ?>
<p><b>Nombre: </b><?php echo $this->Form->text('nombre', array('class' => 'col-md-12 form-control')); ?></p>
<p>
    <b>Descripcion: </b> <?php echo $this->Form->text('descripcion', array('class' => 'col-md-12 form-control')); ?>
</p>
<p>
    <b>Caja: </b> <?php echo $this->Form->text('caja', array('class' => 'col-md-12 form-control', 'type' => 'number', 'required')); ?>
</p>
<p>
    <b>Media caja: </b> <?php echo $this->Form->text('media_caja', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
</p>
<p>
    <b>Precio Unitario: </b> <?php echo $this->Form->text('precio_unitario', array('class' => 'col-md-12 form-control', 'type' => 'number', 'required')); ?>
</p>
<p>
    <b>Precio de Venta: </b> <?php echo $this->Form->text('precio_venta', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
</p>
<p>
    <b>Precio de Venta: </b> <?php echo $this->Form->text('porcentaje_ganancia', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
</p>
<?php echo $this->Form->hidden('id'); ?>

