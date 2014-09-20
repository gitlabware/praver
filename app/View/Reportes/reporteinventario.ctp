<div class="invoice">
<div class="row invoice-logo">
    <div class="col-xs-2 invoice-logo-space"><img src="<?php echo $this->webroot; ?>img/logoPraver.png" alt="" /> </div>
    <div class="col-xs-8 col-centered">                    
        <h2 align="center">REPORTE DE INVENTARIOS<br>
            <h3 align="center"><?php echo $fecha_ini; ?> hasta <?php echo $fecha_fin; ?></h3></h2>                    
    </div>
    <div class="col-xs-2">
        <p><h1>No. <?php echo $this->request->data['Pedido']['id']; ?></h1></p>
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
                                <th>Producto</th>
                                <?php if ($tipo == 'Todos' || $tipo == 'Ingreso'): ?>
                                    <th>Ingreso</th>
                                <?php endif; ?>
                                <?php if ($tipo == 'Todos' || $tipo == 'Salida'): ?>
                                    <th>Salida</th>
                                <?php endif; ?>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_ingreso = 0;
                            $total_salida = 0;
                            ?>
                            <?php foreach ($movimientos as $mo): ?>
                                <tr>
                                    <td><?php echo $mo['Movimiento']['created']; ?></td>
                                    <td><?php echo $mo['Producto']['nombre']; ?></td>
                                    <?php if ($tipo == 'Todos' || $tipo == 'Ingreso'): ?>
                                        <td><?php echo $mo['Movimiento']['ingreso'] ?></td>
                                    <?php endif; ?>
                                    <?php if ($tipo == 'Todos' || $tipo == 'Salida'): ?>
                                        <td><?php echo $mo['Movimiento']['salida'] ?></td>
                                    <?php endif; ?>
                                    <td><?php echo $mo['Movimiento']['total'] ?></td>
                                    <?php $total_ingreso = $total_ingreso + $mo['Movimiento']['ingreso']; ?>
                                    <?php $total_salida = $total_salida + $mo['Movimiento']['salida']; ?>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td>TOTAL</td>
                                <?php if ($tipo == 'Todos' || $tipo == 'Ingreso'): ?>
                                    <td><?php echo $total_ingreso; ?></td>
                                <?php endif; ?>
                                <?php if ($tipo == 'Todos' || $tipo == 'Salida'): ?>
                                    <td><?php echo $total_salida; ?></td>
                                <?php endif; ?>
                                <td></td>
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
    