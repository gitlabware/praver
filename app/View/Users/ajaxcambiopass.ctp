<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Cambiar Password del Usuario</h4>
</div>
<?php echo $this->Form->create('User', array('action' => 'nuevo')); ?>
<div >
    <div class="modal-body" >
        <div class="row">
            <div class="col-md-12">
                <div id="divpass">
                    <p>
                        <a onclick="$('#divpass').load('<?php echo $this->Html->url(array('action' => 'ajaxpass')); ?>');" href="#">Cambiar password</a>
                    </p>
                </div>


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