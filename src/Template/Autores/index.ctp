<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Autor[]|\Cake\Collection\CollectionInterface $autores
 */
$this->loadHelper('Form', [
    'templates' => 'semantic',
]);
?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Autor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="autores index large-10 medium-9 columns content">
    <h3><?= __('Autores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <?= $this->Form->create(null, ['valueSources' => 'query']); ?>
            <tr>
                <th><?= $this->Form->control('busca_nombre', ['label' => '']); ?></th>
                <th><?= $this->Form->control('busca_apellidos', ['label' => '']); ?></th> 
                <th>
                    <?= $this->Form->button('', ['type' => 'submit', 'class' => 'fi-check filtro', 'label' => '']);?>
                    <?= $this->Html->link('', ['action' => 'index'], ['class' => 'fi-x filtro button']);?>
                </th>
            </tr>
            <?= $this->Form->end();?>
        </thead>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($autores as $autor): ?>
            <tr>
                <td><?= h($autor->nombre) ?></td>
                <td><?= h($autor->apellidos) ?></td>
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
