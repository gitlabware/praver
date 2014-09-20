<div class="invoice">
<div class="row invoice-logo">
    <div class="col-xs-2 invoice-logo-space"><img src="<?php echo $this->webroot; ?>img/logoPraver.png" alt="" /> </div>
    <div class="col-xs-8 col-centered">                    
        <h2>REPORTE DE PEDIDOS POR PRODUCTO<br>
            <h3 align="center"><?php echo $fecha_ini; ?> hasta <?php echo $fecha_fin; ?></h2></h1>                    
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
                        <th>Almacen</th>
                        <th>Producto</th>
                        <th>Cliente</th>
                        <th>Total U.</th>
                        <th>Precio Real</th>
                        <th>Precio Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $total_unidades = 0;
                        $total_precio_real = 0;
                        $total_precio = 0;
                        ?>
                        <?php foreach($items as $mo):?>
                        <tr>
                        <td><?php echo $mo['Pedido']['modified'];?></td>
                        <td><?php echo $mo['Almacene']['nombre']?></td>
                        <td><?php echo $mo['Producto']['nombre'];?></td>
                        <td><?php echo $mo['Pedido']['Cliente']['nombre']?></td>
                        <?php $unidades = 0;?>
                        <td><?php $unidades =  $mo['Item']['cantidad_unidades'] + ($mo['Item']['cantidad_cajas']*$mo['Producto']['caja']) + ($mo['Item']['cantidad_media_caja']*$mo['Producto']['media_caja']); echo $unidades;?></td>
                        <td><?php echo $mo['Item']['precio_venta'];?></td>
                        <td><?php echo $mo['Item']['precio_venta_final'];?></td>
                        <?php $total_unidades = $total_unidades + $unidades;?>
                        <?php $total_precio_real = $total_precio_real + $mo['Item']['precio_venta'];?>
                        <?php $total_precio = $total_precio + $mo['Item']['precio_venta_final'];?>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td><?php echo $total_unidades;?></td>
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
