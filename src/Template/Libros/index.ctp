<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro[]|\Cake\Collection\CollectionInterface $libros
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Temas'), ['controller' => 'Temas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tema'), ['controller' => 'Temas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Autores'), ['controller' => 'Autores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Autor'), ['controller' => 'Autores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="libros index large-10 medium-9 columns content">
    <h3><?= __('Libros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombreautor', 'Autor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Temas.tema','Tema') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idioma') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= h($libro->nombreautor) ?></td>
                    <td><?= h($libro->titulo) ?></td>
                    <td><?= $libro->has('tema') ? $this->Html->link($libro->tema->tema, ['controller' => 'Temas', 'action' => 'view', $libro->tema->id]) : '' ?></td>
                    <td><?= h($libro->idioma) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $libro->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $libro->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $libro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libro->id)]) ?>
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

