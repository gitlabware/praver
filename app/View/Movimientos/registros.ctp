
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Registros de <?php echo $producto['Producto']['nombre']; ?></h4>
</div>

<div class="modal-body" >
    <table class="table">
    <?php foreach($totales_almacenes as $tota):?>
        <tr>
            <td><?php echo $tota['Almacene']['nombre'];?></td>
            <td><?php echo $tota['Almacene']['total'],' Unidades';?></td>
        </tr>
    
    <?php endforeach;?>
    </table>
    
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption"><i class="icon-cogs"></i>Listado de Registro del Producto</div>
            
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover" id="mitabla">
                    <thead>
                        <tr>

                            <th>Fecha</th>
                            <th>Movimiento</th>
                            <th>Almacen</th>
                            <th>C.Unidades</th>
                            <th>Total</th>
                            <th>Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($registros as $reg): ?>
                            <tr>
                                <td><?php echo $reg[0]['fecha']; ?></td>
                                <td><?php
                                    if (!empty($reg['Movimiento']['origen']))
                                    {
                                        echo 'Envio';
                                    } else
                                    {
                                        echo 'Ingreso';
                                    }
                                    ?></td>
                                <td><?php echo $reg['Almacene']['nombre']?></td>
                                <td><?php echo $reg['Movimiento']['ingreso']; ?></td>
                                <td><?php echo $reg['Movimiento']['total']?></td>
                                <td>
                                    <?php if($ultimo_movimiento['Movimiento']['id'] == $reg['Movimiento']['id']):?>
                                    
                                    <?php echo $this->Html->link('Cancelar',array('action' => 'cancela',$reg['Movimiento']['id']))?>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>

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
