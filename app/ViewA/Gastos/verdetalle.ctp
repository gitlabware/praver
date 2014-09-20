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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>P/U $us</th>
                                <th>Deposito $us</th>
                                <th>%</th>
                                <th>Comision Banco</th>
                                <th>ITF</th>
                                <th>Flete Maritimo</th>
                                <th>Camiones Ayudantes</th>
                                <th>Gastos Extras</th>
                                <th>Impuestos</th>
                                <th>Total</th>
                                <th>Costo Final U</th>
                                <th>Costo Final Bs</th>                                
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
                                $camionesAyudantesTotal = 0;
                            ?>
                            <?php 
                            
                                foreach($items as $ci){
                                    $cantidad = $ci['Gasto']['cantidad'];
                                    $precioUnitario = $ci['Gasto']['precio_unitario'];
                                    $depositoUnitario = $cantidad*$precioUnitario;                                                                                                               
                                    $depositos[$k]=$depositoUnitario;                                       
                                    $k++;
                                }
                                
//                                $comisionesSubtotal = array_sum($comisiones);
//                                debug($comisionesSubtotal);
                                $depositoTotal = array_sum($depositos);                                                                
                                
                                foreach($items as $ci){
                                    $camionesAyudantes = $ci['Gasto']['camion_ayudantes'];
                                    $porcentajes[$p] = $depositos[$p]/$depositoTotal;
                                    $comisiones[$p] = $porcentajes[$p]*$parametros['Parametro']['comision_banco'];
                                    $itfs[$p] = (($depositos[$p]+$comisiones[$p])*0.15)/100;
                                    $fletes[$p] = $porcentajes[$p]*$parametros['Parametro']['flete_maritimo'];
                                    $gastosExtras[$p] = $porcentajes[$p]*$parametros['Parametro']['gastos_extras'];
                                    $impuestos[$p] = $porcentajes[$p]*$parametros['Parametro']['impuestos'];
                                    $totalUsd[$p] = $depositos[$p] + $comisiones[$p] + $itfs[$p] + $fletes[$p] + $camionesAyudantes + $gastosExtras[$p] + $impuestos[$p];
                                    //debug($totalUsd);
                                    $p++;
                                }
                                
                                $comisionTotal = array_sum($comisiones);
                                $fleteTotal = array_sum($fletes);
                                $gastosExtrasTotal = array_sum($gastosExtras);
                                $impuestosTotal = array_sum($impuestos);
                                $itfTotal = array_sum($itfs);
                                $totalTotal = array_sum($totalUsd);
                               //debug($comisionTotal);
                                //debug($porcentajes);
                                foreach($items as $ci){
                                    $camionesAyudantes = $ci['Gasto']['camion_ayudantes'];
                                    $camionesAyudantesTotal += $camionesAyudantes;
                                    $porcentajes[$t] = $depositos[$t]/$depositoTotal;
                                    $comisiones[$t] = $porcentajes[$t]*$comisionTotal;
                                    $itfs[$t] = (($depositos[$t]+$comisiones[$t])*0.15)/100;
                                    $fletes[$t] = $porcentajes[$t]*$fleteTotal;
                                    $gastosExtras[$t] = $porcentajes[$t]*$gastosExtrasTotal;
                                    $impuestos[$t] = $porcentajes[$t]*$impuestosTotal;
                                    $totalUsd[$t] = $depositos[$t] + $comisiones[$t] + $itfs[$t] + $fletes[$t] + $camionesAyudantes + $gastosExtras[$t] + $impuestos[$t];
                                    //debug($totalUsd);
                                    $t++;
                                }
                            ?>
                            <?php foreach ($items as $i): ?>
                            <?php $idItem = $i['Gasto']['id']; ?>                            
                            <tr>                                
                                <td><?php echo $i['Producto']['nombre']; ?></td>
                                <td><?php echo $i['Gasto']['cantidad']; ?></td>
                                <td><?php echo $i['Gasto']['precio_unitario']; ?></td>                                
                                <td><?php echo $depositos[$j]; ?></td>
                                <td><?php echo round($porcentajes[$j], 3); ?></td>
                                <td><?php echo round($comisiones[$j], 3); ?></td>
                                <td><?php echo round($itfs[$j], 3); ?></td>
                                <td><?php echo round($fletes[$j], 3); ?></td>
                                <td><?php echo $i['Gasto']['camion_ayudantes']; ?></td>
                                <td><?php echo round($gastosExtras[$j], 3); ?></td>
                                <td><?php echo round($impuestos[$j], 3); ?></td>
                                <td><?php echo round($totalUsd[$j], 3); ?></td>                                                               
                                <td>
                                    <?php 
                                        $cant = $i['Gasto']['cantidad'];
                                        $costoUnitarioFinal = $totalUsd[$j]/$cant;
                                        echo round($costoUnitarioFinal, 2);                                        
                                    ?>
                                </td> 
                                <td>                                    
                                    <?php
                                        $costoFinalBs = $costoUnitarioFinal*6.96;
                                        echo round($costoFinalBs, 3);                                        
                                    ?>                                    
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
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?php echo $depositoTotal; ?></th>
                                <th></th>
                                <th><?php echo $comisionTotal; ?></th>
                                <th><?php echo $itfTotal; ?></th>
                                <th><?php echo $fleteTotal; ?></th>
                                <th><?php echo $camionesAyudantesTotal; ?></th>
                                <th><?php echo $gastosExtrasTotal; ?></th>
                                <th><?php echo $impuestosTotal; ?></th>
                                <th><div style="color: #f00;"><?php echo $totalTotal; ?></div></th>
                                <th></th>
                                <th></th>                                
                            </tr>
                        </tfoot>
                    </table>
                    <div class="modal-footer">  
                        <a href="<?php echo $this->Html->url(array('action'=>'index')); ?>" class="btn blue">Volver</a>                        
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