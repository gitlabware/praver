<!-- BEGIN PAGE HEADER-->   
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Gastos <small>nuevo</small>
        </h3>              
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->

<div class="row">
    <div class="col-md-12">    
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-cogs"></i>Lista de productos</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>

            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th style="font-size: 8pt; font-weight: bolder;">Descripcion</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Cantidad</th>
                                <th style="font-size: 8pt; font-weight: bolder;">P/U $us</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Deposito $us</th>
                                <th class="numeric">%</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Comision Banco</th>
                                <th style="font-size: 8pt; font-weight: bolder;">ITF</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Flete Maritimo</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Camiones Ayudantes</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Gastos Extras</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Impuestos</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Otros</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Total</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Costo Final U</th>
                                <th style="font-size: 8pt; font-weight: bolder;">Costo Final Bs</th>                                
                                <th style="font-size: 8pt; font-weight: bolder;">P/Venta</th>
                            </tr>
                        </thead>
                        <tbody>        
                            <?php
                            $depositoTotal = 0;
                            $porcentajeUnitario = 0;
                            $j = $k = $p = $t = $c = 0;
                            $depositos = array();
                            $porcentajes = array();
                            $comisiones = array();
                            $itfs = array();
                            $fletes = array();
                            $gastosExtras = array();
                            $impuestos = array();
                            $totalUsd = array();
                            $camionAyudantes = array();
                            $camionesAyudantesTotal = 0;
                            ?>
                            <?php
                            foreach ($items as $ci) {
                                $cantidad = $ci['Gasto']['cantidad'];
                                $precioUnitario = $ci['Gasto']['precio_unitario'];
                                $depositoUnitario = $cantidad * $precioUnitario;
                                $depositos[$k] = $depositoUnitario;
                                $k++;
                            }

//                                $comisionesSubtotal = array_sum($comisiones);
//                                debug($comisionesSubtotal);
                            $depositoTotal = array_sum($depositos);
                            $otrosParametros = $parametros['Parametro']['otros'];

                            foreach ($items as $ci) {
                                //$camionesAyudantes = $ci['Gasto']['camion_ayudantes'];
                                $porcentajes[$p] = $depositos[$p] / $depositoTotal;
                                $otros[$p] = $porcentajes[$p] * $otrosParametros;
                                $camionAyudantes[$p] = $porcentajes[$p] * $parametros['Parametro']['camion_ayudantes'];
                                $comisiones[$p] = $porcentajes[$p] * $parametros['Parametro']['comision_banco'];
                                $itfs[$p] = (($depositos[$p] + $comisiones[$p]) * 0.15) / 100;
                                $fletes[$p] = $porcentajes[$p] * $parametros['Parametro']['flete_maritimo'];
                                $gastosExtras[$p] = $porcentajes[$p] * $parametros['Parametro']['gastos_extras'];
                                $impuestos[$p] = $porcentajes[$p] * $parametros['Parametro']['impuestos'];
                                //$totalUsd[$p] = $depositos[$p] + $comisiones[$p] + $itfs[$p] + $fletes[$p] + $camionesAyudantes + $gastosExtras[$p] + $impuestos[$p] + $otrosParametros;
                                //debug($otros);
                                $p++;
                            }

                            $camionAyudantesTotal = array_sum($camionAyudantes);
                            //debug($camionAyudantesTotal);
                            $comisionTotal = array_sum($comisiones);
                            $fleteTotal = array_sum($fletes);
                            $gastosExtrasTotal = array_sum($gastosExtras);
                            $impuestosTotal = array_sum($impuestos);
                            $itfTotal = array_sum($itfs);
                            $totalTotal = array_sum($totalUsd);
                            //debug($comisionTotal);
                            //debug($porcentajes);
                            foreach ($items as $ci) {
                                //$camionesAyudantes = $ci['Gasto']['camion_ayudantes'];
                                //$camionesAyudantesTotal += $camionesAyudantes;
                                //$camionAyudantes;
                                $porcentajes[$t] = $depositos[$t] / $depositoTotal;
                                $comisiones[$t] = $porcentajes[$t] * $comisionTotal;
                                $itfs[$t] = (($depositos[$t] + $comisiones[$t]) * 0.15) / 100;
                                $fletes[$t] = $porcentajes[$t] * $fleteTotal;
                                $gastosExtras[$t] = $porcentajes[$t] * $gastosExtrasTotal;
                                $impuestos[$t] = $porcentajes[$t] * $impuestosTotal;
                                $totalUsd[$t] = $depositos[$t] + $comisiones[$t] + $itfs[$t] + $fletes[$t] + $camionAyudantes[$t] + $gastosExtras[$t] + $impuestos[$t] + $otros[$t];
//                                echo 'depo '.$depositos[$t] .'<br />'. 
//                                        'comi '.$comisiones[$t] .'<br />'. 
//                                        'itf '.$itfs[$t] . '<br />'.
//                                        'fletes '.$fletes[$t] . '<br />'.
//                                        'camioAyu '.$camionesAyudantes[$t] . '<br />'.
//                                        'gasExtras '.$gastosExtras[$t] . '<br />'.
//                                        'impuestos '.$impuestos[$t] . '<br />'.
//                                        'otros '.$otros[$t];
                                //debug($totalUsd[$t]);
                                //debug($camionAyudantes[$t]);
                                //debug($impuestos[$t]);
                                //debug($itfs[$t]);
                                $t++;
                            }
                            ?>
                            <?php foreach ($items as $i): ?>
                                <?php $idItem = $i['Gasto']['id']; ?> 
                                <?php $idGasto = $i['Gasto']['id']; ?> 
                                <?php $idProducto = $i['Producto']['id']; ?>
                                <tr>                                
                                    <td><?php echo $i['Producto']['nombre']; ?></td>
                                    <td><?php echo $i['Gasto']['cantidad']; ?></td>
                                    <td><b><?php echo $i['Gasto']['precio_unitario']; ?></b></td>                                
                                    <td><?php echo $depositos[$j]; ?></td>
                                    <td class="numeric"><?php echo round($porcentajes[$j], 3); ?></td>
                                    <td><?php echo round($comisiones[$j], 3); ?></td>
                                    <td><?php echo round($itfs[$j], 3); ?></td>
                                    <td><?php echo round($fletes[$j], 3); ?></td>
                                    <td><?php echo round($camionAyudantes[$j], 3); ?></td>
                                    <td><?php echo round($gastosExtras[$j], 3); ?></td>
                                    <td><?php echo round($impuestos[$j], 3); ?></td>
                                    <td><?php echo round($otros[$j], 3); ?></td>
                                    <td><?php echo round($totalUsd[$j], 3); ?></td>   
                                    <?php $totalTotal = array_sum($totalUsd); ?>
                                    <td>
                                    <?php
                                    $cant = $i['Gasto']['cantidad'];
                                    $costoUnitarioFinal = $totalUsd[$j] / $cant;
                                    $costoUnitarioFinalR = round($costoUnitarioFinal, 4);
                                    echo $costoUnitarioFinalR;
                                    ?>
                                    </td> 
                                    <td><B>                                    
                                        <?php
                                        $cambioDolar = $parametros['Parametro']['cambio_dolar'];
                                        //debug($cambioDolar);
                                        $costoFinalBs = $costoUnitarioFinal * $cambioDolar;
                                        echo round($costoFinalBs, 4);
                                        ?> 
                                            </B>
                                    </td>
                                    <td>
                                        <div id="por_<?php echo $j; ?>">
                                    <?php
                                    echo $this->Ajax->form(array('type' => 'post',
                                        'options' => array(
                                            'model' => 'Movimiento',
                                            'update' => "por_$j",
                                            'url' => array(
                                                'controller' => 'Movimientos',
                                                'action' => 'ajaxguardaprecios'
                                            ),
                                        )
                                    ));
                                    ?>
                                            <?php //echo 'el id es: '.$idProducto; ?>
                                            <?php $costoUnitarioFinalR = round($costoUnitarioFinal, 4); ?>
                                            <?php echo $this->Form->hidden('gasto_id', array('value' => $idGasto)); ?>
                                            <?php echo $this->Form->hidden('producto_id', array('value' => $idProducto)); ?>
                                            <?php //echo $this->Form->hidden('id', array('value' => $idProducto)); ?>
                                            <?php echo $this->Form->hidden('precio_unitario', array('value' => $i['Gasto']['precio_unitario'])); ?>
                                            <?php echo $this->Form->hidden('precio_importacion', array('value' => $costoUnitarioFinalR)); ?>
                                            <?php //echo $this->Form->hidden('precio_venta', array('value' => $costoUnitarioFinalR)); ?>                                            
                                            <input type="number" name="data[Movimiento][precio_venta]" class="input-xsmall" required>                                   
                                            <?php echo $this->Form->end('Guardar'); ?>
                                        </div>
                                    </td>
                                </tr>  
    <?php $j++; ?>
<?php endforeach; ?>
                        </tbody>
                            <?php
                            //debug($depositos);
                            //echo $depositoTotal;
                            //debug($depositoTotal);
                            ?>
                        <tfoot class="flip-content">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?php echo $depositoTotal; ?></th>
                                <th></th>
                                <th><?php echo $comisionTotal; ?></th>
                                <th><?php echo $itfTotal; ?></th>
                                <th><?php echo $fleteTotal; ?></th>
                                <th><?php echo $parametros['Parametro']['camion_ayudantes']; ?></th>
                                <th><?php echo $gastosExtrasTotal; ?></th>
                                <th><?php echo $impuestosTotal; ?></th>
                                <th><?php echo $parametros['Parametro']['otros']; ?></th>
                                <?php //$totalTotal=; ?>
                                <th><div style="color: #f00;"><?php echo $totalTotal; ?></div></th>
                        <th></th>
                        <th></th>                                
                        </tr>
                        </tfoot>
                    </table>
                    <b>Tipo de Cambio: &nbsp;</b><?php echo $parametros['Parametro']['cambio_dolar']; ?><br />
                    <b>Observaciones: &nbsp;</b><?php echo $parametros['Parametro']['observaciones']; ?>
                    <div class="modal-footer">  
                        <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>" class="btn blue">Volver</a>                        
                    </div>
                </div>
            </div>


        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>

</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Editar Producto</h4>
            </div>
<?php echo $this->Form->create('Producto', array('action' => 'nuevo')); ?>
            <div class="modal-body" >
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12" id="editar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn blue">Guardar</button>
            </div>
<?php echo $this->Form->end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function() {
        $('#mitabla').dataTable(
                {
                    "aaSorting": []
                }
        );
    });
</script>