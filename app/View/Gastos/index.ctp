<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">
            Compras
        </h3>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Lista de Compras</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="mitabla">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>                                
                                <th style="width: 30px;">No.</th>                                
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gastos as $g): ?>
                                <tr>
                                    <?php $numero = $g['Gasto']['numero']; ?>
                                    <td><?php echo $g['Producto']['nombre']; ?></td>                              
                                    <td><?php echo $g['Gasto']['cantidad']; ?></td>
                                    <td><?php echo $g['Gasto']['precio_unitario']; ?></td>                                    
                                    <td style="background-color: #CCEAFE;"><?php echo $g['Gasto']['numero']; ?></td>                                    
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('action'=>'generado', $numero)); ?>"title="Ver">
                                        <?php echo $this->Html->image('iconos/ver.png'); ?>
                                        </a>                                        
                                        <a href="<?php echo $this->Html->url(array('action'=>'nuevo', $numero)); ?>"title="Editar">
                                        <?php echo $this->Html->image('iconos/edit.png'); ?>
                                        </a>
                                        <?php echo $this->Html->link($this->Html->image('iconos/del.png'), array('action' => 'eliminagasto', $g['Gasto']['id']), array('escape' => false, 'confirm' => 'Esta seguro de eliminar este gasto')); ?>
                                        <?php //echo $this->Html->link('Eliminar',array('action' => 'eliminagasto',$g['Gasto']['id']),array('class' => 'btn default btn-xs red','confirm' => 'Desea Eliminar realmente este gasto???'));?>
                                        
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
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Editar Producto</h4>
            </div>
            <?php echo $this->Form->create('Producto', array('action' => 'nuevo')); ?>
            <div class="modal-body" >
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12" id="editar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn blue">Guardar</button>
            </div>
            <?php echo $this->Form->end(); ?>
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