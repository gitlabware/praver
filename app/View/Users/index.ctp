<div class="row">
    <div class="col-md-8">
        <h3 class="page-title">
            Usarios 
        </h3>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Lista de Usuarios</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="mitabla">
                        <thead>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <th>Uusario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $us): ?>
                                <tr>
                                    <td><?php echo $us['User']['nombre']; ?></td>
                                    <td><?php echo $us['User']['username']; ?></td>
                                    <td>
                                        <a data-toggle="modal" href="#basic" onclick="$('#editar').load('<?php echo $this->Html->url(array('action' => 'ajaxedita', $us['User']['id'])); ?>');" title="Editar">
                                            <?php echo $this->Html->image('iconos/edit.png'); ?>
                                        </a>                                  
                                        <?php echo $this->Html->link($this->Html->image('iconos/del.png'), array('action' => 'elimina', $us['User']['id']), array('escape' => false, 'confirm' => 'Esta seguro de eliminar')); ?>
                                        <a data-toggle="modal" href="#basic" onclick="$('#editar').load('<?php echo $this->Html->url(array('action' => 'ajaxcambiopass', $us['User']['id'])); ?>');" title="Cambiar Password">
                                            <?php echo $this->Html->image('iconos/password.png'); ?>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-4">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-reorder"></i> Nuevo Usuario
                </div>
                <div class="tools">
                    <a href="" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <div role="form">
                    <?php echo $this->Form->create('User', array('action' => 'nuevo')); ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label >Nombre</label>
                            <?php echo $this->Form->text('nombre', array('class' => 'form-control input-lg', 'placeholder' => 'Nombre del Usuario', 'required')); ?>

                        </div>
                        <div class="form-group">
                            <label >Usuario</label>
                            <?php echo $this->Form->text('username', array('class' => 'form-control input-lg', 'placeholder' => 'Usuario / username', 'required')); ?>

                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <?php echo $this->Form->password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese el password', 'required')); ?>

                        </div>

                    </div>
                    <div class="form-actions right">                           
                        <button type="submit" class="btn green">Guardar</button>                            
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="editar">

            <?php //echo $this->Form->create('User',array('action' => 'nuevo'));?>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function() {
        $('#mitabla').dataTable(
                {
                    "aaSorting": []
                }
        );
    });
</script>