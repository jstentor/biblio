<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Autor $autor
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Autor'), ['action' => 'edit', $autor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Autor'), ['action' => 'delete', $autor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $autor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Autores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Autor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="autores view large-10 medium-9 columns content">
    <h3><?= h($autor->ape_nom) ?></h3>
    <table class="vertical-table large-9">
        <tr>
            <th scope="row"><?= __('Ape Nom') ?></th>
            <td><?= h($autor->ape_nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($autor->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($autor->apellidos) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Libros') ?></h4>
        <?php if (!empty($autor->libros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Tema') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($autor->libros as $libros): ?>
            <tr>
                <td><?= h($libros->titulo) . ($libros->baja ? ' <em>(baja)</em>' : '') ?></td>
                <td><?= ($libros->tema) ? h($libros->tema->tema) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Libros', 'action' => 'view', $libros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Libros', 'action' => 'edit', $libros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Libros', 'action' => 'delete', $libros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
