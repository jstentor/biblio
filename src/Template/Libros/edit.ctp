<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
<div class="libros form large-9 medium-8 columns content">
    <?= $this->Form->create($libro) ?>
    <fieldset>
        <legend><?= __('Edit Libro') ?></legend>
        <div class="row">
            <?php
                echo $this->Form->control('nombreautor', ['label' => 'Nombre del autor']);
                echo $this->Form->control('titulo');
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('traductor');
                echo $this->Form->control('ciudad');
            ?>
        </div>
        <div class="row"
            <?php
                echo $this->Form->control('anio_edicion');
                echo $this->Form->control('edicion');
                ?>
            </div>
        <div class="row">
            <?php
                echo $this->Form->control('primera_edicion');
                echo $this->Form->control('editorial');
                ?>
        </div>
        <div class="row">
            <¿php
                echo $this->Form->control('tema_id', ['options' => $temas, 'empty' => true]);
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('tipo');
                echo $this->Form->control('topografia');
            ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('paginas');
                echo $this->Form->control('tomos');
            ?>
        </div>
        <div class="row">
            <?php 
                echo $this->Form->control('idioma');
                ?>
        </div>
        <div class="row">
            <?php
                echo $this->Form->control('observaciones');
            ??
        </div>
        <div class="row">
        <?ph
            echo $this->Form->control('baja');
            ?>
        </div>
        <div class="row"><
            <
            echo $this->Form->control('autores._ids', ['options' => $autores]);
        </div>
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
