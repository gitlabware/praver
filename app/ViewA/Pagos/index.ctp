<div class="row">
    <div class="col-md-8">
        <h3 class="page-title">
            Pagos 
        </h3>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Lista de Pagos</div>
                <div class="actions">
                    <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('action' => 'pago', $us['Pago']['id'])); ?>');" class="btn blue"><i class="icon-pencil"></i> Nuevo</a>
                    
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="mitabla">
                        <thead>
                            <tr>
                                <th>Detalle</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($pagos as $us): ?>
                                <tr>
                                    <td><?php echo $us['Detalle']['nombre']; ?></td>
                                    <td><?php echo $us['Pago']['total']; ?></td>
                                    <td><?php echo $us['Pago']['created'];?></td>
                                    <td>
                                        <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('action' => 'pago', $us['Pago']['id'])); ?>');" title="Editar">
                                            <?php echo $this->Html->image('iconos/edit.png'); ?>
                                        </a>                                  
                                        <?php echo $this->Html->link($this->Html->image('iconos/del.png'), array('action' => 'eliminapago', $us['Pago']['id']), array('escape' => false, 'confirm' => 'Esta seguro de eliminar')); ?>
                                        <?php //echo $this->Html->link('Elimina', array('action' => 'eliminapago', $us['Pago']['id']), array('escape' => false, 'confirm' => 'Esta seguro de eliminar')); ?>
                                        
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