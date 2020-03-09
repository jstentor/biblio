<?php
    if(!empty($tabla_autores)):?>
        <table id="tabla_autores">
            <tr>
                <th>Autor</th>
                <th>¿Desasignar?</th>
            </tr>
            <?php foreach($tabla_autores as $output):?>
                <tr>
                    <td><?php echo $output['ape_nom']; ?></td>

                    <td><?php echo $this->Html->link('', ['controller'=> 'libro', 
                      'action' => 'desasignar', 
                      $idLibro, $output['id'] // libro_id, autor_id
                        ], 
                        ['class' => 'fi-x filtro', 
                        'confirm' => '¿Seguro que desea desasignar este autor de este libro?']);?></td>
                        
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
?>