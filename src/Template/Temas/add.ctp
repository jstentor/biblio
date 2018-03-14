<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tema $tema
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Temas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Temas'), ['controller' => 'Temas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Tema'), ['controller' => 'Temas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Old Libros'), ['controller' => 'OldLibros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Old Libro'), ['controller' => 'OldLibros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Old Subtemas'), ['controller' => 'OldSubtemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Old Subtema'), ['controller' => 'OldSubtemas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="temas form large-9 medium-8 columns content">
    <?= $this->Form->create($tema) ?>
    <fieldset>
        <legend><?= __('Add Tema') ?></legend>
        <?php
            echo $this->Form->control('tema');
            echo $this->Form->control('parent_id', ['options' => $parentTemas, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
