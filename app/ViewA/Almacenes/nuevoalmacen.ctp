<div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                 <h4 class="modal-title">Nuevo Almacen</h4>
                              </div>
                              <?php echo $this->Form->create('Almacene');?>
                              <div class="modal-body" >
                                 <div class="row">
                                       <div class="col-md-12">
                                       
                              <label >Nombre del Almacen</label>
                              <?php echo $this->Form->text('nombre',array('class' => 'form-control input-lg','placeholder' => 'Nombre del almacen','required'));?>
                              
                                       
                                       
                                       </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn blue">Guardar</button>
                              </div>
                              <?php echo $this->Form->end();?>