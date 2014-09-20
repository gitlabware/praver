<div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                 <h4 class="modal-title">Nuevo Cliente</h4>
                              </div>
                              <?php echo $this->Form->create('Cliente',array('action' => 'nuevocliente'))?>
                              <div class="modal-body" >
                                 <div class="row">
                                       <div class="col-md-12">
                                       
                              <label >Nombre</label>
                              <?php echo $this->Form->text('nombre',array('class' => 'form-control input-lg','placeholder' => 'Nombre del Cliente' ,'required'));?>
                              
                              <label >C.I.:</label>
                              <?php echo $this->Form->text('ci',array('class' => 'form-control input-lg','placeholder' => 'C.I. del cliente' ,'required'));?>
                                      
                                       </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn blue">Guardar</button>
                              </div>