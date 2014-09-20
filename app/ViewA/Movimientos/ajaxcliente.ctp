<div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                 <h4 class="modal-title">Venta de Productos</h4>
                              </div>
                              <?php echo $this->Form->create('Movimiento',array('action' => 'venta','class' => 'form-horizontal form-row-sepe'))?>
                              <div class="modal-body" >
                                 <div class="row">
                                       <div class="col-md-12">
                                       
                              <label >Cliente</label>
                              <?php echo $this->Form->select('cliente_id',$clientes,array('class' => 'form-control input-large select2me','data-placeholder' => 'Seleccione al cliente' ,'required'));?>
                              
                                       
                                       
                                       </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn blue">Guardar</button>
                              </div>
                              <?php echo $this->Form->end();?>
