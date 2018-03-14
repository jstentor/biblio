<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Autor $autor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
<div class="autores view large-9 medium-8 columns content">
    <h3><?= h($autor->id) ?></h3>
    <table class="vertical-table">
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
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($autor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($autor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($autor->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Libros') ?></h4>
        <?php if (!empty($autor->libros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Autor') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Traductor') ?></th>
                <th scope="col"><?= __('Ciudad') ?></th>
                <th scope="col"><?= __('Anio Edicion') ?></th>
                <th scope="col"><?= __('Edicion') ?></th>
                <th scope="col"><?= __('Primera Edicion') ?></th>
                <th scope="col"><?= __('Editorial') ?></th>
                <th scope="col"><?= __('Tema Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Topografia') ?></th>
                <th scope="col"><?= __('Paginas') ?></th>
                <th scope="col"><?= __('Tomos') ?></th>
                <th scope="col"><?= __('Idioma') ?></th>
                <th scope="col"><?= __('Observaciones') ?></th>
                <th scope="col"><?= __('Baja') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($autor->libros as $libros): ?>
            <tr>
                <td><?= h($libros->id) ?></td>
                <td><?= h($libros->autor) ?></td>
                <td><?= h($libros->titulo) ?></td>
                <td><?= h($libros->traductor) ?></td>
                <td><?= h($libros->ciudad) ?></td>
                <td><?= h($libros->anio_edicion) ?></td>
                <td><?= h($libros->edicion) ?></td>
                <td><?= h($libros->primera_edicion) ?></td>
                <td><?= h($libros->editorial) ?></td>
                <td><?= h($libros->tema_id) ?></td>
                <td><?= h($libros->tipo) ?></td>
                <td><?= h($libros->topografia) ?></td>
                <td><?= h($libros->paginas) ?></td>
                <td><?= h($libros->tomos) ?></td>
                <td><?= h($libros->idioma) ?></td>
                <td><?= h($libros->observaciones) ?></td>
                <td><?= h($libros->baja) ?></td>
                <td><?= h($libros->created) ?></td>
                <td><?= h($libros->modified) ?></td>
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
