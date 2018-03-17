<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Libro'), ['action' => 'edit', $libro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Libro'), ['action' => 'delete', $libro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Libros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Libro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Temas'), ['controller' => 'Temas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tema'), ['controller' => 'Temas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Autores'), ['controller' => 'Autores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Autor'), ['controller' => 'Autores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Old Autores'), ['controller' => 'OldAutores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Old Autor'), ['controller' => 'OldAutores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="libros view large-9 medium-8 columns content">
    <h3><?= h($libro->titulo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Autor') ?></th>
            <td><?= h($libro->autor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($libro->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tema') ?></th>
            <td><?= $libro->has('tema') ? $this->Html->link($libro->tema->tema, ['controller' => 'Temas', 'action' => 'view', $libro->tema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Traductor') ?></th>
            <td><?= h($libro->traductor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudad') ?></th>
            <td><?= h($libro->ciudad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edición') ?></th>
            <td><?= h($libro->edicion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editorial') ?></th>
            <td><?= h($libro->editorial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($libro->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Topografía') ?></th>
            <td><?= h($libro->topografia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idioma') ?></th>
            <td><?= h($libro->idioma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anio Edicion') ?></th>
            <td><?= $this->Number->format($libro->anio_edicion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Primera Edición') ?></th>
            <td><?= $this->Number->format($libro->primera_edicion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paginas') ?></th>
            <td><?= $this->Number->format($libro->paginas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tomos') ?></th>
            <td><?= $this->Number->format($libro->tomos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($libro->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($libro->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baja') ?></th>
            <td><?= $libro->baja ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observaciones') ?></h4>
        <?= $this->Text->autoParagraph(h($libro->observaciones)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Autores') ?></h4>
        <?php if (!empty($libro->autores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ape Nom') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellidos') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($libro->autores as $autores): ?>
            <tr>
                <td><?= h($autores->id) ?></td>
                <td><?= h($autores->ape_nom) ?></td>
                <td><?= h($autores->nombre) ?></td>
                <td><?= h($autores->apellidos) ?></td>
                <td><?= h($autores->created) ?></td>
                <td><?= h($autores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Autores', 'action' => 'view', $autores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Autores', 'action' => 'edit', $autores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Autores', 'action' => 'delete', $autores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $autores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Old Autores') ?></h4>
        <?php if (!empty($libro->old_autores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('AuNombre') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellido') ?></th>
                <th scope="col"><?= __('AuTimeStamp') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($libro->old_autores as $oldAutores): ?>
            <tr>
                <td><?= h($oldAutores->id) ?></td>
                <td><?= h($oldAutores->auNombre) ?></td>
                <td><?= h($oldAutores->nombre) ?></td>
                <td><?= h($oldAutores->apellido) ?></td>
                <td><?= h($oldAutores->auTimeStamp) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OldAutores', 'action' => 'view', $oldAutores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OldAutores', 'action' => 'edit', $oldAutores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OldAutores', 'action' => 'delete', $oldAutores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldAutores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>