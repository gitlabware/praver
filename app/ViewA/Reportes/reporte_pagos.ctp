<div class="invoice">
<div class="row invoice-logo">
    <div class="col-xs-2 invoice-logo-space"><img src="<?php echo $this->webroot; ?>img/logoPraver.png" alt="" /> </div>
    <div class="col-xs-8 col-centered">                    
        <h2 align="center">REPORTE DE PAGOS<br>
            <h3 align="center"><?php echo $fecha_ini; ?> hasta <?php echo $fecha_fin; ?></h3></h2>                    
    </div>
</div>
    <hr />
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">Reporte de Pagos</div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                        <th>Fecha</th>
                        <th>Detalle</th>
                        <th>total</th>
                        
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $total = 0;
                        ?>
                        <?php foreach($pagos as $mo):?>
                        <tr>
                        <td><?php echo $mo['Pago']['created'];?></td>
                        <td><?php echo $mo['Detalle']['nombre']?></td>
                        <td><?php echo $mo['Pago']['total'];?></td>
                        
                        <?php $total = $total + $mo['Pago']['total'];?>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        
                        <td></td>
                        <td>TOTAL</td>
                        <td><?php echo $total;?></td>
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
