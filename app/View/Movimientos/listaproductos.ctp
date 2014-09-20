<div>

<?php 
if(!empty($mensaje))
{
    echo '<h3 style="color: '.$color.';">'.$mensaje.'</h3>';
}
else{
    
}
?>

</div>
<table class="table table-hover">
                        <thead>
                           <tr>
                              <th>Producto</th>
                              <th>Cajas</th>
                              <th>Total</th>
                              <th>Precio</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php //echo $this->Form->create('Movimiento');?>
                        <?php foreach($ventas as $ven):?>
                           <tr>
                           <?php echo $this->Form->create('Movimiento', array('id' => 'formul'.$ven['Movimiento']['id']));?>
                              <td><?php echo $ven['Producto']['nombre'];?></td>
                              <td><?php echo $ven['Movimiento']['salida']/$ven['Movimiento']['uporcaja_salida'];?></td>
                              <td><?php echo $ven['Movimiento']['salida']?></td>
                              
                              <td><?php echo $this->Form->text('precioventa',array('id' => 'precioventa'.$ven['Movimiento']['id'],'type' => 'number','step' => 'any','value' => $ven['Movimiento']['precioventa']));?></td>
                              <td>
                              <?php
                                echo $this->Js->link('Quitar', array('controller'=>'Movimientos', 'action'=>'quitaventa',$ven['Movimiento']['id']), array('update'=>'#contenidoventas','class' => 'label label-sm label-danger','escape' => false,'confirm' => 'Esta seguro de Quitar de la lista'));
                                ?>
                                <a href="javascript:;" class="label label-sm label-success" id="actualiza<?php echo $ven['Movimiento']['id'];?>">Actualizar</a>
                                <?php //echo $this->Form->end();?>
                                
                              </td>
                              <?php echo $this->Form->hidden('id',array('value' => $ven['Movimiento']['id'],'id' => 'idmovi'.$ven['Movimiento']['id']));?>
                              <?php echo $this->Form->hidden('venta_id',array('value' => $ven['Movimiento']['venta_id'],'id' => 'idmovi'.$ven['Movimiento']['id']));?>
                               <?php 
                                $this->Js->get('#actualiza'.$ven['Movimiento']['id'])->event(
                                            'click',
                                            $this->Js->request(
                                            array('action' => 'actualizatotal'),
                                                array('async' => true,
                                                'update' => '#contenidoventas',
                                                'method' => 'post','dataExpression'=>true,
                                                'data'=> '$("#formul'.$ven['Movimiento']['id'].'").serialize()'
                                                )
                                            )
                                            );
                                ?>
                              <?php echo $this->Form->end();?>
                           </tr>
                        <?php endforeach;?>   
                        </tbody>
</table>
<div style="text-align: right;">
<h3>Total: <?php echo $total;?></h3>
</div>




<?php echo $this->Js->writeBuffer(); ?>