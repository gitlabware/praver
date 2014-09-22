<div class="row">
    <div class="col-md-8">
    <h3 class="page-title">
                 Pedidos 
               </h3>
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de Pedidos</div>
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
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pedidos as $us):?>
                           <tr>
                              <td><?php echo $us['Pedido']['created'];?></td>
                              <td><?php echo $us['Cliente']['nombre'];?></td>
                              <td> 
                              <?php echo $this->Html->link($this->Html->image("iconos/pedido.png", array("alt" => 'editar', 'title' => 'Realizar Pedido')), array('action'=>'pedido', $us['Pedido']['id']), array('escape'=>false));?>    
                              <?php echo $this->Html->link($this->Html->image('iconos/del.png'), array('action' => 'cancelarpedido', $us['Pedido']['id']), array('escape' => false, 'confirm' => 'Esta seguro de eliminar')); ?>
                                  
                              <?php //echo $this->Html->link('Editar',array('action' => 'pedido',$us['Pedido']['id']));?>
                              <?php //echo $this->Html->link('Eliminar',array('action' => 'cancelarpedido',$us['Pedido']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar'));?>
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