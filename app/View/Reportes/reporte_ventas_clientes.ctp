<div class="invoice">
<div class="row invoice-logo">
    <div class="col-xs-2 invoice-logo-space"><img src="<?php echo $this->webroot; ?>img/logoPraver.png" alt="" /> </div>
    <div class="col-xs-8 col-centered">                    
        <h2>REPORTE DE VENTAS POR CLIENTE<br>
            <h3 align="center"><?php echo $fecha_ini; ?> hasta <?php echo $fecha_fin; ?></h3></h2>                    
    </div>
</div>
    <hr />
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">Reporte de Inventario</div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Precio Real</th>
                        <th>Precio Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $total_precio_real = 0;
                        $total_precio = 0;
                        ?>
                        <?php foreach($pedidos as $mo):?>
                        <tr>
                        <td><?php echo $mo['Pedido']['modified'];?></td>
                        <td><?php echo $mo['Cliente']['nombre'];?></td>
                        
                        <td><?php echo $mo['Pedido']['total'];?></td>
                        <td><?php echo $mo['Pedido']['total_cancelado'];?></td>
                        <?php $total_precio_real = $total_precio_real + $mo['Pedido']['total'];?>
                        <?php $total_precio = $total_precio + $mo['Pedido']['total_cancelado'];?>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        <td></td>
                        <td>TOTAL</td>
                        <td><?php echo $total_precio_real;?></td>
                        <td><?php echo $total_precio;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">Imprimir <i class="icon-print"></i></a>
