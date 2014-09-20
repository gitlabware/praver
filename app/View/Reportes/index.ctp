<?php //$itemsventa = $this->requestAction(array('controller' => 'Reportes','action' => 'total_venta',35));
//debug($itemsventa);exit;?>
<?php 
App::uses('Item', 'Model');
$modeloitem = new Item();
?>
<div class="row">
    <div class="col-md-12">
    <h3 class="page-title">REPORTES</h3>
    <?php echo $this->element('charts')?>
    <script type="text/javascript">
        
	$(function() {
            var data = [
            <?php foreach($productos_chart as $pro):?>
                  ["<?php echo $pro['Producto']['nombre']?>",<?php echo $this->requestAction(array('action' => 'consulta_total_alamacen',$pro['Producto']['id'],$idAlmacen));?>],  
            <?php endforeach;?>
                ];
		//var data = [ ["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9] ];

		$.plot("#chart_5", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.5,
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
    <div class="portlet box blue">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-reorder"></i>Cantidades Totales en Almacen</div>
                     
                  </div>
        <?php //debug($idAlmacen);exit;?>
                  <div class="portlet-body">
                     <div id="chart_5" style="height:350px;"></div>
                     <div class="btn-toolbar">
                        <div class="btn-group stackControls">
                            <select class="form-control" onchange="location.href = '<?php echo $this->Html->url(array('action'=>'index',null))?>/'+this.value">
                                <?php foreach($almacenes as $al):?>
                                
                                <option value="<?php echo $al['Almacene']['id']?>" <?php if($idAlmacen == $al['Almacene']['id']){echo 'selected = ""';}?>><?php echo $al['Almacene']['nombre'];?></option>
                                
                                <?php endforeach;?>
                            </select>
                           
                        </div>
                        <div class="space5"></div>
                        
                     </div>
                  </div>
     </div>
    <div class="portlet box blue">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-reorder"></i>Torta de ventas de Productos</div>
                     
                  </div>
        <?php //debug($idAlmacen);exit;?>
        <script>
            $(function() {
                
                
            var data = [
        <?php foreach($productos_chart as $pro):?>
                
                <?php 
                $condiciones = array();
                $condiciones['Item.producto_id'] = $pro['Producto']['id'];
                $condiciones['Pedido.estado'] = 'VENDIDO';
                if(!empty($fecha_ini) && !empty($fecha_ini))
                {
                    $condiciones['date(Pedido.modified) BETWEEN ? AND ?'] = array($fecha_ini,$fecha_fin);
                }
                $itemsventa = $modeloitem->find('all',array('recursive' => 0,
                                'fields' => array('Item.cantidad_cajas','Item.cantidad_media_caja',                                   
                                'Producto.caja','Producto.media_caja','date(Pedido.modified) fecha','Item.cantidad_unidades'),
                                'conditions' => $condiciones));?>
                            <?php 
                            $cantidadmes = 0;
                            foreach($itemsventa as $ite):
                                $cantidadmes =  (($ite['Producto']['caja']*$ite['Item']['cantidad_cajas'])+($ite['Producto']['media_caja']*$ite['Item']['cantidad_media_caja'])+$ite['Item']['cantidad_unidades']);
                            endforeach;
                            ?>
                {
                    label: "<?php echo $pro['Producto']['nombre'];?>",
                    data: <?php echo $cantidadmes;?>
                },  
        <?php endforeach;?>
            ];
            $.plot('#chartorta', data, {
                series: {
                    pie: {
                        show: true
                    }
                }
            });
            });
        </script>
                  <div class="portlet-body">
                     <div id="chartorta" style="height:350px;"></div>
                     <div class="btn-toolbar">
                        <div class="btn-group stackControls">
                            <?php echo $this->Form->create('Reporte');?>
                            <div class="row">
                                <div class="col-md-4">
                                    <?php echo $this->Form->date('fecha_ini2',array('class' => 'form-control','required'));?>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->date('fecha_fin2',array('class' => 'form-control','required'));?>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->submit('Enviar',array('class' => 'btn btn-primary'));?>
                                </div>
                            </div>
                            
                            <?php echo $this->Form->end();?>
                        </div>
                        <div class="space5"></div>
                        
                     </div>
                  </div>
     </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">Reporte de Inventario</div>
        </div>
        <div class="portlet-body form">
        <?php echo $this->Form->create('Reporte',array('action' => 'reporteinventario'));?>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-2 form-group">
                    <label>Desde</label>
                    <?php echo $this->Form->date('fecha_ini',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-2 form-group">
                    <label>Hasta</label>
                    <?php echo $this->Form->date('fecha_fin',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Almacen</label>
                    <?php echo $this->Form->select('almacene_id',$listalmacenes,array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Producto</label>
                    <?php echo $this->Form->select('producto',$productos,array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-2 form-group">
                    <label>Tipo</label>
                    <?php echo $this->Form->select('tipo',array('Todos' => 'TODOS','Ingreso' => 'INGRESO','Salida' => 'SALIDA'),array('class' => 'form-control','required'));?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
            <?php echo $this->Form->submit('Generar Reporte',array('class' => 'btn btn-primary'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">Reporte de Ventas por Productos</div>
        </div>
        <div class="portlet-body form">
        <?php echo $this->Form->create('Reporte',array('action' => 'reporte_ventas_productos'));?>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-3 form-group">
                    <label>Desde</label>
                    <?php echo $this->Form->date('fecha_ini',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Hasta</label>
                    <?php echo $this->Form->date('fecha_fin',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Almacen</label>
                    <?php echo $this->Form->select('almacene_id',$listalmacenes,array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Producto</label>
                    <?php echo $this->Form->select('producto',$productos,array('class' => 'form-control','required'));?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
            <?php echo $this->Form->submit('Generar Reporte',array('class' => 'btn btn-primary'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">Reporte de Pedidos por Productos</div>
        </div>
        <div class="portlet-body form">
        <?php echo $this->Form->create('Reporte',array('action' => 'reporte_pedidos_productos'));?>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-3 form-group">
                    <label>Desde</label>
                    <?php echo $this->Form->date('fecha_ini',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Hasta</label>
                    <?php echo $this->Form->date('fecha_fin',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Almacen</label>
                    <?php echo $this->Form->select('almacene_id',$listalmacenes,array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-3 form-group">
                    <label>Producto</label>
                    <?php echo $this->Form->select('producto',$productos,array('class' => 'form-control','required'));?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
            <?php echo $this->Form->submit('Generar Reporte',array('class' => 'btn btn-primary'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">Reporte de Ventas por Cliente</div>
        </div>
        <div class="portlet-body form">
        <?php echo $this->Form->create('Reporte',array('action' => 'reporte_ventas_clientes'));?>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                    <label>Desde</label>
                    <?php echo $this->Form->date('fecha_ini',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-4 form-group">
                    <label>Hasta</label>
                    <?php echo $this->Form->date('fecha_fin',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-4 form-group">
                    <label>Cliente</label>
                    <?php echo $this->Form->select('cliente',$clientes,array('class' => 'form-control','required'));?>
                    </div>
                    
                </div>
            </div>
            <div class="form-actions">
            <?php echo $this->Form->submit('Generar Reporte',array('class' => 'btn btn-primary'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">Reporte de Pagos</div>
        </div>
        <div class="portlet-body form">
        <?php echo $this->Form->create('Reporte',array('action' => 'reporte_pagos'));?>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <label>Desde</label>
                    <?php echo $this->Form->date('fecha_ini',array('class' => 'form-control','required'));?>
                    </div>
                    <div class="col-md-6 form-group">
                    <label>Hasta</label>
                    <?php echo $this->Form->date('fecha_fin',array('class' => 'form-control','required'));?>
                    </div>
                    
                    
                </div>
            </div>
            <div class="form-actions">
            <?php echo $this->Form->submit('Generar Reporte',array('class' => 'btn btn-primary'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    </div>
</div>
    
   