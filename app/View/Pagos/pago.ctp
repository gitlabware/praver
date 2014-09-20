<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><b>Pago </b></h4>
</div>
<?php echo $this->Form->create('Pago',array('action' => 'guardapago')); ?>
<div class="modal-body">    
    <div class="scroller" data-always-visible="1" data-rail-visible1="1">
        <div class="row">
            <?php echo $this->Form->hidden('id');?>
            <div class="col-md-12" id="detalle_texto" style="display: none" >
                <h4>Detalle <a class="btn btn-xs dark" href="#" onclick="$('#detalle_texto').toggle(400);$('#detalle_select').toggle(400);">Seleccionar</a></h4>
                <?php echo $this->Form->hidden('Detalle.id');?>
                <p><?php echo $this->Form->textarea('Detalle.nombre',array('class' => 'col-md-12 form-control','placeholder' => 'Ingrese el detalle del pago'))?></p>              
            </div>
            <div class="col-md-12" id="detalle_select">
                <h4>Detalle <a class="btn btn-xs dark" href="#" onclick="$('#detalle_select').toggle(400);$('#detalle_texto').toggle(400);">
                    <?php if(empty($this->request->data['Detalle']['id'])){echo 'Nuevo';}else{echo 'Editar';}?>
                    </a></h4>
                <p><?php echo $this->Form->select('detalle_id',$detalles,array('class' => 'col-md-12 form-control','placeholder' => 'Ingrese el detalle del pago'))?></p>              
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Total pago</h4>
                <p><?php echo $this->Form->text('total',array('class' => 'col-md-12 form-control','type' => 'number','step' => 'any','required'));?></p>
            </div>
        </div>
        
    </div>
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn default">Cerrar</button>
    <button type="submit" class="btn green">Guardar</button>
</div>
