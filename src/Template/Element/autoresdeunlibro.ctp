<?php
    if(!empty($tabla_autores)):?>
        <table id="tabla_autores">
            <tr>
                <th>Autor</th>
                <th>¿Desasignar?</th>
            </tr>
            <?php foreach($tabla_autores as $key => $output):?>
                <tr>
                    <td><?php echo $output['ape_nom']; ?></td>

                    <td><?php 
                    echo $this->Html->link('', "#" ,
                    	['class' => 'fi-x filtro borra-el-autor', 'id'=>$key]);
                    	/*['class' => 'fi-x filtro borra-el-autor', 'id'=>$output['id']]);*/
                    
                    /*echo $this->Html->link('', ['controller'=> 'libros', 
                      'action' => 'desasignarrr', 
                      $idLibro, $output['id'] // libro_id, autor_id
                        ], 
                        ['class' => 'fi-x filtro borra-el-autor', 'id'=>'borra-el-autor'/*,
                        'confirm' => '¿Seguro que desea desasignar este autor de este libro?']);*/?></td>
                        
		           <!--   <td><?php echo $this->Html->link('', ['controller'=> 'libro', 
                      'action' => 'desasignar', 
                      $idLibro, $output['id'] // libro_id, autor_id
                        ], 
                        ['class' => 'fi-x filtro', 
                        'confirm' => '¿Seguro que desea desasignar este autor de este libro?']);?></td> -->
              </tr>
          <?php endforeach; ?>
      </table>
      <?php
  endif;
  
$this->Html->scriptStart(['block' => true]);
echo <<<EOL
let jsId;
$(function(){
  $('.borra-el-autor').on('click', function() {
  	$('#' + this.id).parent().parent().remove();
  	
  	var targeturl = '<?= Router::url(["controller"=>"libros","action"=>"desasignar"]); ?>';
  	 $.ajax({
              type:'post',
              url: targeturl,                  
			  data:'id='+id+'&type=state',
			  dataType: 'json',
			  success:function(result){
				  // $("#divLoading").removeClass('show');
				  // $('#state').append(result);
			  }
		  });	
  });
  
  /*$('.menu_button').click(function() {*/
     
 })
  
EOL;
$this->Html->scriptEnd();
?>