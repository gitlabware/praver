<div class="row">
    <div class="col-md-8">
    <h3 class="page-title">
                  Productos 
               </h3>
               <!-- BEGIN SAMPLE TABLE PORTLET-->
               <div class="portlet box red">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-cogs"></i>Lista de productos</div>
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
                              <th>Saldo</th>
                              <th>Total</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($listaventas as $lis):?>
                           <tr>
                              <td><?php echo $lis['Venta']['created'];?></td>
                              <td><?php echo $lis['Cliente']['nombre'];?></td>
                              <td><?php echo $lis['Venta']['saldo'];?></td>
                              <td><?php echo $lis['Venta']['total'];?></td>
                              <td><?php echo $this->Html->link('Ver Venta',array('action' => 'venta',$lis['Venta']['id']));?></td>
                              
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