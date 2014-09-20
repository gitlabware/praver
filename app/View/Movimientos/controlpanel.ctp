<?php 
App::uses('Item', 'Model');
$modeloitem = new Item();
?>
<?php /*$itemsventa = $modeloitem->find('all',array('recursive' => 0,
                                'fields' => array('Item.cantidad_cajas','Item.cantidad_media_caja',                                   
                                'Producto.caja','Producto.media_caja','date(Pedido.modified) fecha','Item.cantidad_unidades'),
                                'conditions' => array('Item.producto_id' => 35,
                                 'Pedido.estado' => 'VENDIDO','Year(Pedido.modified)' => date('Y'))));*/
?>
<script>
<?php //$fecha = split('-', $itemsventa[0][0]['fecha']);
//$fecha = $fecha[1].'-'.$fecha[2].'-'.$fecha[0];?>
//alert("<?php echo $fecha?>");
</script>
<?php 
//debug($itemsventa);exit;
?>
<link href="<?php echo $this->webroot; ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->webroot; ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<?php echo $this->element('charts')?>
<!-- END THEME STYLES -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Panel de Control <small>datos estadisticos</small>
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Inicio</a> 
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Panel de Control</a></li>
            <li class="pull-right">
                <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>
                    <span></span>
                    <i class="icon-angle-down"></i>
                </div>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="icon-file-text"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $cantidadPedidos; ?>
                </div>
                <div class="desc">                           
                    Pedidos Nuevos
                </div>
            </div>
            <a class="more" href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'listapedidos')); ?>">
                Ver mas <i class="m-icon-swapright m-icon-white"></i>
            </a>                 
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="icon-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $cantidadVentas; ?></div>
                <div class="desc">Ventas Totales</div>
            </div>
            <a class="more" href="<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'listaventas')); ?>">
                Ver mas <i class="m-icon-swapright m-icon-white"></i>
            </a>                 
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="icon-barcode"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $cantidadProductos; ?></div>
                <div class="desc">Productos</div>
            </div>
            <a class="more" href="<?php echo $this->Html->url(array('controller' => 'Productos', 'action' => 'index')); ?>">
                Ver mas <i class="m-icon-swapright m-icon-white"></i>
            </a>                 
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat yellow">
            <div class="visual">
                <i class="icon-bar-chart"></i>
            </div>
            <div class="details">
                <div class="number">12,5M$</div>
                <div class="desc">Total Profit</div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>                 
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
     
    
        <div class="portlet box blue">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-reorder"></i>Cantidades Totales en Almacen</div>
                     
                  </div>
        <?php //debug($idAlmacen);exit;?>
                  <div class="portlet-body">
                     <div id="chart_5" style="height:250px;"></div>
                     <div class="btn-toolbar">
                        <div class="btn-group stackControls">
                            <select class="form-control" onchange="location.href = '<?php echo $this->Html->url(array('controller' => 'Movimientos','action'=>'controlpanel',null))?>/'+this.value">
                                <?php foreach($almacenes as $al):?>
                                
                                <option value="<?php echo $al['Almacene']['id']?>" <?php if($idAlmacen == $al['Almacene']['id']){echo 'selected = ""';}?>><?php echo $al['Almacene']['nombre'];?></option>
                                
                                <?php endforeach;?>
                            </select>
                           
                        </div>
                        <div class="space5"></div>
                        
                     </div>
                  </div>
     </div>
        <?php //debug($productos_chart);exit;?>
        <script type="text/javascript">
        
	$(function() {
           var data = [
            <?php foreach($productos_chart as $pro):?>
                ["<?php echo $pro['Producto']['nombre']?>",<?php echo $this->requestAction(array('controller' => 'Reportes','action' => 'consulta_total_alamacen',$pro['Producto']['id'],$idAlmacen));?>],  
            <?php endforeach;?>
                ];
		///var data = [ ["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9] ];

		$.plot("#chart_5", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.4,
					align: "center"
				}
                                ,color: "#4b8df8"
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

		// Add the Flot version string to the footer

		//$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
     
    
        <div class="portlet box blue">
                  <div class="portlet-title">
                      <div class="caption"><i class="icon-reorder"></i>Ventas de la gestion <?php echo date('Y');?></div>
                     
                  </div>
        <?php //debug($idAlmacen);exit;?>
                  <div class="portlet-body">
                     <div id="placeholder" style="height:250px;"></div>
                     
                  </div>
            
     </div>
        
        <script type="text/javascript">

	$(function() {

		var data = [
                    <?php foreach($productos_chart as $pro):?>
                    {
                        label: "<?php echo $pro['Producto']['nombre'];?>",
                        
                        data: [
                            <?php $itemsventa = $modeloitem->find('all',array('recursive' => 0,
                                'fields' => array('Item.cantidad_cajas','Item.cantidad_media_caja',                                   
                                'Producto.caja','Producto.media_caja','date(Pedido.modified) fecha','Item.cantidad_unidades'),
                                'conditions' => array('Item.producto_id' => $pro['Producto']['id'],
                                    'Pedido.estado' => 'VENDIDO','Year(Pedido.modified)' => date('Y'))));?>
                            <?php 
                            $cantidadmes = 0;
                            foreach($itemsventa as $ite):
                                $cantidadmes =  (($ite['Producto']['caja']*$ite['Item']['cantidad_cajas'])+($ite['Producto']['media_caja']*$ite['Item']['cantidad_media_caja'])+$ite['Item']['cantidad_unidades']);
                            
                            ?>
                            //var myDate="";
                            //myDate=myDate.split("-");
                            //var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                            <?php $fecha = split('-', $ite[0]['fecha']);
                            $fecha = $fecha[1].'-'.$fecha[2].'-'.$fecha[0];?>
                            
                            [new Date("<?php echo $ite[0]['fecha']?>").getTime(),<?php echo $cantidadmes;?>],                  
                            <?php 
                            endforeach;
                            ?>
                            
                        ]
                    },
                    <?php endforeach;?>
                ];

		var options = {
			canvas: true,
			xaxes: [ { mode: "time" } ],
			yaxes: [ { min: 0 }, {
				position: "right",
				alignTicksWithAxis: 1,
				tickFormatter: function(value, axis) {
					return value.toFixed(axis.tickDecimals) + "€";
				}
			} ],
			legend: { position: "sw" }
		}

		$.plot("#placeholder", data, options);

		$("input").change(function () {
			options.canvas = $(this).is(":checked");
			$.plot("#placeholder", data, options);
		});

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
        
    </div>
</div>
<div class="clearfix"></div>
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-barcode"></i>Productos Recientes</div>                
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                    <ul class="feeds">                        
                        <?php foreach($ultimosProductos as $up): ?>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">                      
                                            <i class="icon-barcode"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            <?php echo $up['Producto']['nombre']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                    <?php 
                                        $fechaHora = $up['Producto']['created']; 
                                        $fecha = preg_split("/ /", $fechaHora);
                                        //echo $fecha[0];                                        
                                    ?>
                                    Ingresados
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>                        
                    </ul>
                </div>
                <div class="scroller-footer">
                    <div class="pull-right">
                        <a href="<?php echo $this->Html->url(array('action'=>'index')); ?>">Ver todos <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet box green tasks-widget">
            <div class="portlet-title">
                <div class="caption"><i class="icon-check"></i>Ultimos Pedidos</div>
                
            </div>
            <div class="portlet-body">
                <div class="task-content">
                    <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
                        <!-- START TASK LIST -->
                        <ul class="task-list">
                            <?php foreach ($ultimosPedidos as $ult):?>
                            <li>
                                
                                <div class="task-title">
                                    <span class="task-title-sp"><?php echo $this->Html->link(''.$ult['Cliente']['nombre'],array('controller' => 'Movimientos','action' => 'pedido',$ult['Pedido']['id']))?></span>
                                    <span class="label label-sm label-warning"><?php echo $ult['Pedido']['modified']?></span>
                            
                                </div>
                                
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <!-- END START TASK LIST -->
                    </div>
                </div>
                <div class="task-footer">
                    <span class="pull-right">
                        <a href="#">See All Tasks <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

