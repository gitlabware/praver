<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Editar Usuario</h4>
</div>
<?php echo $this->Form->create('User', array('action' => 'nuevo')); ?>
<div >
    <div class="modal-body" >
        <div class="row">
            <div class="col-md-12">

                <p><b>Nombre: </b><?php echo $this->Form->text('nombre', array('class' => 'col-md-12 form-control')); ?></p>
                <p>
                    <b>Usuario: </b> <?php echo $this->Form->text('username', array('class' => 'col-md-12 form-control')); ?>
                </p>
                <?php echo $this->Form->hidden('id'); ?>

            </div>

        </div>  

    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn blue">Guardar</button>
</div>
<?php echo $this->Form->end(); ?>