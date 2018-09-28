<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Libro') ?></legend>
        <?php
            echo $this->Form->control('autor');
            echo $this->Form->control('titulo');
            echo $this->Form->control('traductor');
            echo $this->Form->control('ciudad');
            echo $this->Form->control('anio_edicion');
            echo $this->Form->control('edicion');
            echo $this->Form->control('primera_edicion');
            echo $this->Form->control('editorial');
            echo $this->Form->control('tema_id', ['options' => $temas, 'empty' => true]);
            echo $this->Form->control('tipo');
            echo $this->Form->control('topografia');
            echo $this->Form->control('paginas');
            echo $this->Form->control('tomos');
            echo $this->Form->control('idioma');
            echo $this->Form->control('observaciones');
            echo $this->Form->control('baja');
            echo $this->Form->control('autores._ids', ['options' => $autores]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
