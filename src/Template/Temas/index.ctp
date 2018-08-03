<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tema[]|\Cake\Collection\CollectionInterface $temas
 */
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tema'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="temas index large-10 medium-9 columns content">
    <h3><?= __('Temas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
            <tr>
                <th scope="col"><?= $this->Form->control('fTema', ['label' => '&nbsp;', 'escape' => false]);?></th>
                <th scope="col"><?= $this->Form->control('fPadre', ['label' => '&nbsp;', 'escape' => false]); ?></th>
                <th scope="col">
                    <?= $this->Form->button('', ['name' => 'boton', 'value' => 'filtrar', 'class' => 'fi-check filtro', 'alt' => 'Filtrar', 'title' => 'Filtrar']); ?>
                    <?=  $this->Form->button('', ['name' => 'boton', 'value' => 'borrar', 'class' => 'fi-x filtro', 'alt' => 'Borrar filtro', 'title' => 'Borrar filtro']); ?>                    
                </th>
            </tr>
                <?= $this->Form->end() ?>
        </thead>

        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tema') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ParentTemas.tema', 'Tema padre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($temas as $tema): ?>
            <tr>
                <td><?= h($tema->tema) ?></td>
                <td><?= $tema->has('parent_tema') ? $this->Html->link($tema->parent_tema->tema, ['controller' => 'Temas', 'action' => 'view', $tema->parent_tema->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tema->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tema->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tema->id)]) ?>
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
