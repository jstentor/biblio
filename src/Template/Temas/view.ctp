<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tema $tema
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tema'), ['action' => 'edit', $tema->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tema'), ['action' => 'delete', $tema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tema->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Temas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tema'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Temas'), ['controller' => 'Temas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Tema'), ['controller' => 'Temas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Temas'), ['controller' => 'Temas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Tema'), ['controller' => 'Temas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="temas view large-10 medium-9 columns content">
    <h3><?= h($tema->tema) ?></h3>
    <table class="vertical-table large-9">
        <tr>
            <th scope="row"><?= __('Tema') ?></th>
            <td><?= h($tema->tema) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tema padre') ?></th>
            <td><?= $tema->has('parent_tema') ? $this->Html->link($tema->parent_tema->tema, ['controller' => 'Temas', 'action' => 'view', $tema->parent_tema->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Libros') ?></h4>
        <?php if (!empty($tema->libros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Autor') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tema->libros as $libros): ?>
            <tr>
                <td><?= h($libros->nombreautor) ?></td>
                <td><?= h($libros->titulo) ?></td>
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
    <div class="related">
        <h4><?= __('Related Temas') ?></h4>
        <?php if (!empty($tema->child_temas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Tema') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tema->child_temas as $childTemas): ?>
            <tr>
                <td><?= h($childTemas->tema) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Temas', 'action' => 'view', $childTemas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Temas', 'action' => 'edit', $childTemas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Temas', 'action' => 'delete', $childTemas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childTemas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
