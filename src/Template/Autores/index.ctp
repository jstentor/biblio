<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Autor[]|\Cake\Collection\CollectionInterface $autores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Autor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="autores index large-9 medium-8 columns content">
    <h3><?= __('Autores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ape_nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($autores as $autor): ?>
            <tr>
                <td><?= $this->Number->format($autor->id) ?></td>
                <td><?= h($autor->ape_nom) ?></td>
                <td><?= h($autor->nombre) ?></td>
                <td><?= h($autor->apellidos) ?></td>
                <td><?= h($autor->created) ?></td>
                <td><?= h($autor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $autor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $autor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $autor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $autor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
