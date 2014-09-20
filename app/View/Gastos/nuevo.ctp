<?php $numero = $primerGasto['Gasto']['numero']; ?>
<!-- BEGIN PAGE HEADER-->   
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Compras <small>nuevo</small>
        </h3>              
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->

<div class="row">
    <div class="col-md-8">    
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>Lista de items</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>

            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>                                
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($gastos as $g): ?>
                                <?php $idGasto = $g['Gasto']['id']; ?>                                
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $g['Producto']['nombre']; ?></td>
                                    <td><?php echo $g['Gasto']['cantidad']; ?></td>
                                    <td><?php echo $g['Gasto']['precio_unitario']; ?></td>                                                                  
                                    <td>                                                                         
                                        <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Gastos', 'action' => 'editaitemgasto', $idGasto, $numero)); ?>');"title="Editar">
                                        <?php echo $this->Html->image('iconos/edit.png'); ?>
                                        </a>                                   
                                        <?php if($i != 1): ?>
                                        <a href="<?php echo $this->Html->url(array('action' => 'eliminaitem', $idGasto, $numero)); ?>"onclick="return confirm('Desea elimiar el item <?php echo $g['Producto']['nombre']; ?>?')"title="Eliminar">
                                           <?php echo $this->Html->image('iconos/del.png'); ?>
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>      
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                    
                    <div class="modal-footer">  
                        <a href="#" class="btn green" onclick="muestraComisiones();">Comisiones</a>                        
                        <a href="<?php echo $this->Html->url(array('action' => 'generar', $numero)); ?>" class="btn blue">Generar</a>                                                                        
                    </div>
                    <div id="comisiones" style="display: none;">  
                        <div class="portlet-body form">                        
                            <?php echo $this->Form->create('Parametro', array('action' => 'editaparametros', 'class' => 'horizontal-form')); ?>

                            <?php echo $this->Form->hidden('parametro_id', array('value' => $primerGasto['Parametro']['0']['id'])); ?>
                            <div class="form-body">                                
                                <h3 class="form-section">Comisiones</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cambio Dolar</label>
                                            <?php echo $this->Form->text('cambio_dolar', array('value' => $primerGasto['Parametro']['0']['cambio_dolar'], 'class' => 'form-control', 'type' => 'number', 'step'=>'any')); ?>                                            
                                            <?php //echo $this->Form->hidden('numero', array('value'=>$primerGasto['Gasto']['numero'])); ?>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Camion Ayudantes</label>
                                            <?php echo $this->Form->text('camion_ayudantes', array('value' => $primerGasto['Parametro']['0']['camion_ayudantes'], 'class' => 'form-control', 'type' => 'number')); ?>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->           

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Comision Banco</label>
                                            <?php echo $this->Form->text('comision_banco', array('value' => $primerGasto['Parametro']['0']['comision_banco'], 'class' => 'form-control', 'type' => 'number')); ?>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Flete Maritimo</label>
                                            <?php echo $this->Form->text('flete_maritimo', array('value' => $primerGasto['Parametro']['0']['flete_maritimo'], 'class' => 'form-control', 'type' => 'number')); ?>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->           
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gastos Extras</label>
                                            <?php echo $this->Form->text('gastos_extras', array('value' => $primerGasto['Parametro']['0']['gastos_extras'], 'class' => 'form-control', 'type' => 'number')); ?>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Impuestos</label>
                                            <?php echo $this->Form->text('impuestos', array('value' => $primerGasto['Parametro']['0']['impuestos'], 'class' => 'form-control', 'type' => 'number')); ?>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Observaciones</label>
                                            <?php echo $this->Form->textarea('observaciones', array('value' => $primerGasto['Parametro']['0']['observaciones'], 'class' => 'form-control', 'type' => 'number')); ?>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions right">                                
                                <button type="submit" class="btn blue"><i class="icon-ok"></i> Editar</button>
                            </div>
                            </form>            
                        </div>    
                    </div>
                </div>
            </div>

        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-4">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-reorder"></i> Nuevo Producto
                </div>
                <div class="tools">
                    <a href="" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <div role="form">
                    <?php echo $this->Form->create('Gasto'); ?>
                    <div class="form-body">   

                        <div class="portlet-body">
                            <ul  class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab">Nuevo Producto</a></li>
                                <li class=""><a href="#tab_1_2" data-toggle="tab">Producto Existente</a></li>                                
                            </ul>
                            <div  class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1_1">
                                    <div class="form-group">
                                        <label >Nombre del Producto</label>
                                        <?php echo $this->Form->text('Gasto.nombre', array('class' => 'form-control input-lg')); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_1_2">
                                    <div class="form-group">
                                        <label >Seleccione un Producto</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icon-th-large"></i>
                                            </span>
                                            <select name="data[Gasto][producto_id]" class="form-control select2me">
                                                <option value="">Seleccione un producto</option>
                                                <?php foreach ($productos as $p): ?>
                                                    <option value="<?php echo $p['Producto']['id']; ?>"><?php echo $p['Producto']['nombre'];         ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                                              
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label>Cantidad</label>
                            <?php echo $this->Form->text('Gasto.cantidad', array('class' => 'form-control input-lg', 'placeholder' => '0', 'required', 'type' => 'number', 'step' => 'any')); ?>
                        </div> 

                        <div class="form-group">
                            <label>Precio Unitario</label>
                            <?php echo $this->Form->text('Gasto.precio_unitario', array('class' => 'form-control input-lg', 'placeholder' => '0', 'required', 'type' => 'number', 'step' => 'any')); ?>
                        </div>                                                                           

                        <?php if (empty($gastos)): ?>
                            <div id="btComisiones" class="btn btn-sm blue"><i class="icon-plus-sign"></i> Comisiones</div>                                
                            <div id="muestraComisiones" style="display: none;">
                                <br />    
                                <div class="form-group">
                                    <label>Cambio Dolar</label>
                                    <?php echo $this->Form->text('Parametro.cambio_dolar', array('class' => 'form-control input-lg', 'placeholder' => '0', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div>

                                <div class="form-group">
                                    <label>Camion Y Ayudantes</label>
                                    <?php echo $this->Form->text('Parametro.camion_ayudantes', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div> 

                                <div class="form-group">
                                    <label>Comision Banco</label>
                                    <?php echo $this->Form->text('Parametro.comision_banco', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div>                                                                     

                                <div class="form-group">
                                    <label>Flete Maritimo</label>
                                    <?php echo $this->Form->text('Parametro.flete_maritimo', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div> 

                                <div class="form-group">
                                    <label>Gastos Extras Agencia Aduanera</label>
                                    <?php echo $this->Form->text('Parametro.gastos_extras', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div>     

                                <div class="form-group">
                                    <label>Impuestos</label>
                                    <?php echo $this->Form->text('Parametro.impuestos', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div>

                                <div class="form-group">
                                    <label>Otros</label>
                                    <?php echo $this->Form->text('Parametro.otros', array('class' => 'form-control input-lg', 'placeholder' => '', 'required', 'type' => 'number', 'step' => 'any')); ?>
                                </div>

                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <?php echo $this->Form->textarea('Parametro.observaciones', array('class' => 'form-control input-lg', 'placeholder' => '', 'type' => 'number', 'step' => 'any')); ?>                                   
                                </div>

                            </div>

                        <?php else: ?>

                        <?php endif; ?>

                    </div>
                    <div class="form-actions right">                           
                        <button type="submit" class="btn green">Insertar a la Lista</button>                                                    
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
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
                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn blue">Guardar</button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>

    function muestraComisiones()
    {
        //alert('click');
        $('#comisiones').toggle('slow');
    }

    $(document).ready(function() {
        $('#mitabla').dataTable(
                {
                    "aaSorting": []
                }
        );
        $("#btComisiones").click(function() {
            $("#muestraComisiones").toggle('slow');
        });
    });
</script>