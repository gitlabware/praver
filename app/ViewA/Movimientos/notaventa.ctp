<?php //debug($idVenta);exit;?>
<div class="row">
    <div class="col-md-8">
   
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box grey">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de Productos a vender</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-responsive" id="contenidoventas">
                        <table class="table">
                            <tr>
                                <td><b>Cliente: </b></td>
                                <td><?php echo $venta['Cliente']['nombre'];?></td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                        <thead>
                           <tr>
                              <th>Producto</th>
                              <th>Cajas</th>
                              <th>Total</th>
                              <th>Precio</th>
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
                              
                              <td><?php echo $ven['Movimiento']['precioventa'];?></td>
                             
                           </tr>
                        <?php endforeach;?>   
                        </tbody>
</table>
<div style="text-align: right;">
<h3>Total: <?php echo $venta['Venta']['total'];?></h3>
</div>
                     </div>
                     
                  </div>
               </div>
               <!-- END SAMPLE TABLE PORTLET-->
            </div>
            
           
</div>

    <?php echo $this->Js->writeBuffer(); ?>