<div class="row">
    <div class="col-md-6">
    <h3 class="page-title">
                  Almacenes 
               </h3>
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de almacenes</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-responsive">
                        <table class="table table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Nombre Almacen</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($almacenes as $al):?>
                           <tr>
                              <td><?php echo $al['Almacene']['id'];?></td>
                              <td><?php echo $al['Almacene']['nombre'];?></td>
                              <td>
                                  <a  data-toggle="modal" href="#basic" onclick="$('#editar').load('<?php echo $this->Html->url(array('action' => 'ajaxedita',$al['Almacene']['id']));?>');"title="Edita el Almacen">
                                      <?php echo $this->Html->image('iconos/edit.png'); ?>
                                  </a>
                              <?php echo $this->Html->link($this->Html->image('iconos/del.png', array('title'=>'Elimina el Almacen')), array('action'=>'elimina', $al['Almacene']['id']), array('escape'=>false, 'confirm'=>'Esta seguro de Eliminar')); ?>    
                              <?php //echo $this->Html->link('Eliminar',array('action' => 'elimina',$al['Almacene']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar'));?>
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
            <div class="col-md-6">
            <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption">
                        <i class="icon-reorder"></i>Formulario para Insertar Nuevo Almacen
                     </div>
                     <div class="tools">
                        <a href="" class="collapse"></a>
                        
                     </div>
                  </div>
                  <div class="portlet-body form">
                     <div role="form">
                     <?php echo $this->Form->create('Almacene',array('action' => 'nuevo'));?>
                        <div class="form-body">
                           <div class="form-group">
                              <label >Nombre</label>
                              <?php echo $this->Form->text('nombre',array('class' => 'form-control input-lg','placeholder' => 'Inserte Nombre del Nuevo Almacen','required'));?>
                              
                           </div>
                        </div>
                        <div class="form-actions right">                           
                            
                           <button type="submit" class="btn green">Guardar</button>                            
                        </div>
                        <?php echo $this->Form->end();?>
                     </div>
                  </div>
               </div>
            </div>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                 <h4 class="modal-title">Editar Almacen</h4>
                              </div>
                              <?php echo $this->Form->create('Almacene',array('action' => 'nuevo'));?>
                              <div class="modal-body" id="editar">
                                 
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