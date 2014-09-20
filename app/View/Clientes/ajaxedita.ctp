

<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <?php echo $this->Form->create('Cliente');?>
                                          <p><b>Nombre: </b><?php echo $this->Form->text('nombre',array('class' => 'col-md-12 form-control'));?></p>
                                          <p>
                                            <b>C.I.: </b> <?php echo $this->Form->text('ci',array('class' => 'col-md-12 form-control'));?>
                                            </p>
                                            
                                            
                                            <?php echo $this->Form->hidden('id');?>

                                       </div>
                                       
                                    </div>
                                 </div>