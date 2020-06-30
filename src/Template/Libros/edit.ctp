<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>

<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $libro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $libro->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Temas'), ['controller' => 'Temas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tema'), ['controller' => 'Temas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Autores'), ['controller' => 'Autores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Autor'), ['controller' => 'Autores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Old Autores'), ['controller' => 'OldAutores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Old Autore'), ['controller' => 'OldAutores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="libros form large-10 medium-9 columns content">
    <?= $this->Form->create($libro) ?>
    <fieldset>
        <legend><?= __('Edit Libro') ?></legend>

        <div class="row">
            <?php
                echo $this->Form->control('nombreautor', ['label' => 'Nombre del autor', 'templates' => [
                        'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('titulo', ['templates' => [
                        'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
                    ]]);
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('tema', [ 'templates' => [
                        'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('topografia', ['templates' => [
                        'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
                    ]]);
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('idioma', [ 'templates' => [
                        'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('traductor', ['templates' => [
                        'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
                    ]]);
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('tipo', [ 'templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('editorial', ['templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('ciudad', ['templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('edicion', [ 'templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('anio_edicion', ['templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('primera_edicion', ['templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('paginas', [ 'templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('tomos', ['templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
                echo $this->Form->control('baja', ['templates' => [
                        'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                    ]]);
            ?>
        </div>
 
        <div class="row">
        <h3>Autores relacionados</h3>
          	<?= $this->Form->hidden('autores_hidden', ['id' => 'autores_hidden', 'value' => $autores_hidden]); ?> 	
          	<table class="noborder">
	            <tr>
	                <td class="noborder" width="50%">
	                    <div id="autores-div">
	                      <?= $this->element('autoresdeunlibro', ['tabla_autores' => $libro['autores'], 'idLibro' => $libro['id']]) ?>
	
	                  </div>
	                </td>
	                <td class="noborder" width="50%">
	
	                <table>
	                    <tr><th>Asignar Autor</th></tr>
	                    <tr><td class="ui-widget">
	                        <?= $this->Form->text('busca-autores', ['label' => 'Autores: ', 'id' => 'busca-autores']); ?>
	                        <div class="error" id="errores">
	                        </div>
	                    </td>
	                </tr>
	                </table>
	                </td>
	            </tr>
	        </table>

  
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

<!-- https://discourse.cakephp.org/t/how-to-make-simple-jquery-ajax-in-cakephp-3-7/5834/2 -->


