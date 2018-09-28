<?php
    if(!empty($libros_autor)):?>
        <table id="tabla_libros">
            <tr>
                <th>Título</th>
                <th>¿Borrar?</th>
            </tr>
            <?php foreach($libros_autor as $output):?>
                <tr>
                    <td><?php echo $output['titulo']; ?></td>

                    <td><?php echo $this->Html->link('', ['controller'=> 'autor', 
                      'action' => 'desasignar', 
                      $output['id'], $output['extension_id']
                        ], 
                        ['class' => 'fi-x filtro', 
                        'confirm' => '¿Seguro que desea desasignar este usuario de esta extensión?']);?></td>
              </tr>
          <?php endforeach; ?>
      </table>
      <?php
  endif;
?>