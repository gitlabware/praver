<?php echo $this->Form->create('Producto',array('id' => 'formu'));?>
<?php echo $this->Form->text('nombre');?>
<a onclick="envia()">enviar</a>
<?php //echo $this->Form->submit('guardar');?>
<?php //echo $this->Form->end();?>
<script>
function envia()
{
    var src = $('#formu').serialize();
    alert(src);

  $.ajax({
                        type: "POST",
                        url: '<?php echo $this->Html->url(array('action' => 'guarda'));?>',
                        data: src,
                        //cache: false,
                        success: function(dato)
                        {
                            
                            alert($.parseJSON(dato).primero+" "+$.parseJSON(dato).segundo);
                        }
                    });
  
//
}

</script>