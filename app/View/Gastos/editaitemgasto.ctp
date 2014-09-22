<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><b>Producto: </b><?php //debug($datosGasto);  ?><?php echo $datosGasto['Producto']['nombre']; ?> </h4>
</div>
<?php echo $this->Form->create('Gasto'); ?>
<div class="modal-body">    
    <div class="scroller" data-always-visible="1" data-rail-visible1="1">
        <div class="row">
            <div class="col-md-6">
                <h4>Cantidad</h4>
                <?php echo $this->Form->hidden('numero', array('value'=>$numero)); ?>
                <p><input type="number" name="data[Gasto][cantidad]" value="<?php echo $datosGasto['Gasto']['cantidad']; ?>" class="col-md-12 form-control" step="any" required></p>                
            </div>
            <div class="col-md-6">
                <h4>Precio Unitario</h4>
                <p><input type="number" name="data[Gasto][precio_unitario]" value="<?php echo $datosGasto['Gasto']['precio_unitario']; ?>" class="col-md-12 form-control" step="any" required></p>                
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn default">Cerrar</button>
    <button type="submit" class="btn green">Editar</button>
</div>
