<div class="row">
    <div class="col-md-8">
    <h3 class="page-title">
                 Ventas 
               </h3>
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de Ventas</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-responsive">
                        <table class="table table-hover" id="mitabla">
                        <thead>
                           <tr>
                              
                              <th>Fecha</th>
                              <th>Cliente</th>
                              <th>Cancelado</th>
                              <th>Tota</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($ventas as $us):?>
                           <tr>
                              <td><?php echo $us['Pedido']['created'];?></td>
                              <td><?php echo $us['Cliente']['nombre'];?></td>
                              <td><?php echo $us['Pedido']['total_cancelado'];?></td>
                              <td><?php echo $us['Pedido']['total'];?></td>
                              <td> 
                              <a data-toggle="modal" href="#modaluno" onclick="$('#contenidomodaluno').load('<?php echo $this->Html->url(array('controller' => 'Movimientos', 'action' => 'ajaxpagos',$us['Pedido']['id'])); ?>');"title="PAGOS">
                                  <?php echo $this->Html->image('iconos/pagos.png'); ?>
                              </a>
                              <?php echo $this->Html->link($this->Html->image('iconos/del.png'), array('action' => 'cancelarventa', $us['Pedido']['id']), array('escape' => false, 'confirm' => 'Esta seguro de eliminar')); ?>
                              <?php //echo $this->Html->link('Editar',array('action' => 'pedido',$us['Pedido']['id']));?>
                              <?php //echo $this->Html->link('Eliminar',array('action' => 'cancelarventa',$us['Pedido']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar'));?>
                              </td>
                              
                           </tr>
                        <?php endforeach;?>   
                        </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- END SAMPLE TABLE PORTLET-->
            </div>
</div>
    <script>
    $(document).ready(function(){
    $('#mitabla').dataTable(
    {
        "aaSorting": [] 
    }
    );
});
    </script>