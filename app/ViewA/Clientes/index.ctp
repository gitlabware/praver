<div class="row">
    <div class="col-md-6">
    <h3 class="page-title">
                  Clientes 
               </h3>
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de Clientes</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-responsive">
                        <table class="table table-hover">
                        <thead>
                           <tr>
                              <th>Nombre</th>
                              <th>ci</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($clientes as $cli):?>
                           <tr>
                              <td><?php echo $cli['Cliente']['nombre'];?></td>
                              <td><?php echo $cli['Cliente']['ci'];?></td>
                              <td>
                                  
                                  <a  data-toggle="modal" href="#basic" onclick="$('#editar').load('<?php echo $this->Html->url(array('action' => 'ajaxedita',$cli['Cliente']['id']));?>');"title="Editar">
                                            <?php echo $this->Html->image('iconos/edit.png'); ?>
                                  </a> 
                              
                              <?php echo $this->Html->link($this->Html->image('iconos/del.png'), array('action'=>'elimina', $cli['Cliente']['id']), array('escape'=>false, 'confirm'=>'Esta seguro de Eliminar')); ?>
                              <?php //echo $this->Html->link('Eliminar',array('action' => 'elimina',$cli['Cliente']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar'));?>
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
                        <i class="icon-reorder"></i>Formulario para Insertar Nuevo Cliente
                     </div>
                     <div class="tools">
                        <a href="" class="collapse"></a>
                        
                     </div>
                  </div>
                  <div class="portlet-body form">
                     <div role="form">
                     <?php echo $this->Form->create('Cliente',array('action' => 'nuevo'));?>
                        <div class="form-body">
                           <div class="form-group">
                              <label >Nombre</label>
                              <?php echo $this->Form->text('nombre',array('class' => 'form-control input-lg','placeholder' => 'Insertar Nombre del cliente','required'));?>
                              
                           </div>
                        </div>
                        <div class="form-body">
                           <div class="form-group">
                              <label >C.I.</label>
                              <?php echo $this->Form->text('ci',array('class' => 'form-control input-lg','placeholder' => 'Insertar Nro de C.I.: del cliente Eje. 53426534 LP','required'));?>
                              
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
                                 <h4 class="modal-title">Editar Cliente</h4>
                              </div>
                              <?php echo $this->Form->create('Cliente',array('action' => 'nuevo'));?>
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