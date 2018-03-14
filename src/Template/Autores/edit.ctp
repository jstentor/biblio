<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Autor $autor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
<div class="autores form large-9 medium-8 columns content">
    <?= $this->Form->create($autor) ?>
    <fieldset>
        <legend><?= __('Edit Autor') ?></legend>
        <?php
            echo $this->Form->control('ape_nom');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellidos');
            echo $this->Form->control('libros._ids', ['options' => $libros]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
