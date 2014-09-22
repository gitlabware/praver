<div class="row">
    <div class="col-md-12">
    <h3 class="page-title">
                  Productos 
               </h3>
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de productos</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-responsive">
                        <table class="table table-hover" id="mitabla">
                        <thead>
                           <tr>                              
                              <th>Nombre del Producto</th>
                              <th>Descripcion</th>>
                              <th>Cantidad Caja</th>
                              <th>Cantidad Media Caja</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($productos as $pro):?>
                           <tr>
                              <td><?php echo $pro['Producto']['nombre'];?></td>
                              <td><?php echo $pro['Producto']['descripcion'];?></td>
                              <td><?php echo $pro['Producto']['caja'];?></td>
                              <td><?php echo $pro['Producto']['media_caja'];?></td>                              
                              <td>
                                  <a  data-toggle="modal" href="#basic" onclick="$('#editar').load('<?php echo $this->Html->url(array('action' => 'ajaxedita',$pro['Producto']['id']));?>');"title="Editar Producto">
                                      <?php echo $this->Html->image('iconos/edit.png'); ?>
                                  </a> 
                              
                                <?php echo $this->Html->link($this->Html->image('iconos/del.png', array('title'=>'Elimina el Producto')), array('action'=>'elimina2', $pro['Producto']['id']), array('escape'=>false, 'confirm'=>'Esta seguro de Eliminar')); ?>
                                <?php //echo $this->Html->link('Eliminar',array('action' => 'elimina2',$pro['Producto']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar'));?>
                              </td>                              
                           </tr>
                        <?php endforeach;?>   
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
                              <?php echo $this->Form->create('Producto',array('action' => 'nuevo'));?>
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
                              <?php echo $this->Form->end();?>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
    </div>
    <script>
    $(document).ready(function(){
    $('#mitabla').dataTable(
    {
        "aaSorting": [] 
    }
    );
});
    </script>