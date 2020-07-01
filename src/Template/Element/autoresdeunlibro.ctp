<?php
    if(!empty($tabla_autores)):?>
        <table id="tabla_autores">
            <tr>
                <th>Autor</th>
                <th>¿Desasignar?</th>
            </tr>
            <?php foreach($tabla_autores as $key => $output):?>
                <tr id="autor<?= $key ?>">
                    <td><?php echo $output['ape_nom']; ?></td>

                    <td><?php 
                    echo $this->Form->button('', [
                    	'type' => 'button', 
                    	'class' => 'button alert tiny fi-x', 'id'=>$key,
                    	'onclick' => 'borraUno(\'autor' . $key . '\'); return false;'
                    ]);
			        ?>
			        </td>
              </tr>
          <?php endforeach; ?>
      </table>
      <?php
  endif;

  
$this->Html->scriptStart(['block' => true]);
echo <<<EOL
let jsId;
function borraUno( id ) {
	// Convertir campo oculto a json
	let losAutores = JSON.parse($('#autores_hidden').val());
	// borrar elemento de json
	delete losAutores[id];
	// actualizar campo oculto
	$('#autores_hidden').val(JSON.stringify(losAutores));
	// borrar elemento de la tabla
	$('#' + id).remove();
}
EOL;
$this->Html->scriptEnd();
?>