<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Formulario para Insertar Nuevo Usuario</h4>
</div>
<?php echo $this->Form->create('User', array('action' => 'nuevousuario')) ?>
<div class="modal-body" >
    <div class="form-group">
        <div class="col-md-12 control-label">

            <label >Nombre</label>
            <?php echo $this->Form->text('nombre', array('class' => 'form-control input-lg', 'placeholder' => 'Nombre del Usuario', 'required')); ?>

            <label >Usuario</label>
            <?php echo $this->Form->text('username', array('class' => 'form-control', 'placeholder' => 'Usuario / username', 'required')); ?>

            <label >Password</label>
            <?php echo $this->Form->password('password', array('class' => 'form-control spinner', 'placeholder' => 'Inserte su Password', 'required')); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn blue">Guardar</button>
</div>
<?php echo $this->Form->end(); ?>