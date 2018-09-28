<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Autor $autor
 */
use Cake\Routing\Router;
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $autor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $autor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Autores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="autores form large-10 medium-9 columns content">
    <?= $this->Form->create($autor) ?>
    <fieldset>
        <legend><?= __('Edit Autor') ?></legend>
        <?php
            //echo $this->Form->control('ape_nom');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellidos');
            echo $this->Form->control('libros._ids', ['options' => $libros]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <div class='related form large-10 medium-9 columns content'>
        <h3>Usuarios relacionados</h3>
        <table class="noborder">
            <tr>
                <td class="noborder" width="50%">
                    <div id="libros-div">
                      <?= $this->element('librosdeunautor', ['libros_autor' => $autor['libros']]) ?>

                  </div>
                </td>
                <td class="noborder" width="50%">

                <table>
                    <tr><th>Asignar Libro</th></tr>
                    <tr><td class="ui-widget">
                        <?= $this->Form->text('busca-libros', ['label' => 'Libros: ', 'id' => 'busca-libros']); ?>
                        <div class="error" id="errores">
                        </div>
                    </td>
                </tr>
                </table>
                </td>
            </tr>
        </table>
    </div>    
</div>

<?php 
$ellibro_id = $autor['id'];
$url_addlibro = Router::url(array('controller'=>'autores','action'=>'ajaxAddlibro'));
$url_deletelibro1 = "'" . $this->Html->link('', ['controller'=> 'autores', 
                      'action' => 'ajaxDesasignar'], 
                  ['class' => 'fi-x filtro', 
                  'confirm' => '¿Seguro que desea desasignar este libro de este autor?']) . "'";

$this->Html->scriptStart(['block' => true]);
echo <<<EOL
$(function() {
    var accentMap = {
        "á": "a", "Á": "A", "é": "e", "É": "E", "ë": "e", "Ë": "E", "í": "i", "Í": "I", "ó": "o", "Ó": "o", "ú": "u", "Ú": "U", "ü": "u", "Ü": "U"
    };

    var normalize = function( term ) {
        var ret = "";
        for ( var i = 0; i < term.length; i++ ) {
            ret += accentMap[ term.charAt(i) ] || term.charAt(i);
        }
        return ret;
    };

    $( "#busca-libros" ).keypress(function() {
        alert("Handler for change() called");
    });

});
EOL;
$this->Html->scriptEnd(); ?>