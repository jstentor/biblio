<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tema $tema
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
        <li><?= $this->Html->link(__('List Old Libros'), ['controller' => 'OldLibros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Old Libro'), ['controller' => 'OldLibros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Old Subtemas'), ['controller' => 'OldSubtemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Old Subtema'), ['controller' => 'OldSubtemas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Temas'), ['controller' => 'Temas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Tema'), ['controller' => 'Temas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="temas view large-9 medium-8 columns content">
    <h3><?= h($tema->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tema') ?></th>
            <td><?= h($tema->tema) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Tema') ?></th>
            <td><?= $tema->has('parent_tema') ? $this->Html->link($tema->parent_tema->id, ['controller' => 'Temas', 'action' => 'view', $tema->parent_tema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tema->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tema->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tema->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Libros') ?></h4>
        <?php if (!empty($tema->libros)): ?>
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
            <?php foreach ($tema->libros as $libros): ?>
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
    <div class="related">
        <h4><?= __('Related Old Libros') ?></h4>
        <?php if (!empty($tema->old_libros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('LAutor') ?></th>
                <th scope="col"><?= __('LTitulo') ?></th>
                <th scope="col"><?= __('LTraductor') ?></th>
                <th scope="col"><?= __('LCiudad') ?></th>
                <th scope="col"><?= __('LAnioEdicion') ?></th>
                <th scope="col"><?= __('LEdicion') ?></th>
                <th scope="col"><?= __('LPrimeraEdicion') ?></th>
                <th scope="col"><?= __('LEditorial') ?></th>
                <th scope="col"><?= __('Tema Id') ?></th>
                <th scope="col"><?= __('Subtema Id') ?></th>
                <th scope="col"><?= __('LTipo') ?></th>
                <th scope="col"><?= __('LTopografia') ?></th>
                <th scope="col"><?= __('LPaginas') ?></th>
                <th scope="col"><?= __('LTomos') ?></th>
                <th scope="col"><?= __('LIdioma') ?></th>
                <th scope="col"><?= __('LObservaciones') ?></th>
                <th scope="col"><?= __('LBaja') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tema->old_libros as $oldLibros): ?>
            <tr>
                <td><?= h($oldLibros->id) ?></td>
                <td><?= h($oldLibros->lAutor) ?></td>
                <td><?= h($oldLibros->lTitulo) ?></td>
                <td><?= h($oldLibros->lTraductor) ?></td>
                <td><?= h($oldLibros->lCiudad) ?></td>
                <td><?= h($oldLibros->lAnioEdicion) ?></td>
                <td><?= h($oldLibros->lEdicion) ?></td>
                <td><?= h($oldLibros->lPrimeraEdicion) ?></td>
                <td><?= h($oldLibros->lEditorial) ?></td>
                <td><?= h($oldLibros->tema_id) ?></td>
                <td><?= h($oldLibros->subtema_id) ?></td>
                <td><?= h($oldLibros->lTipo) ?></td>
                <td><?= h($oldLibros->lTopografia) ?></td>
                <td><?= h($oldLibros->lPaginas) ?></td>
                <td><?= h($oldLibros->lTomos) ?></td>
                <td><?= h($oldLibros->lIdioma) ?></td>
                <td><?= h($oldLibros->lObservaciones) ?></td>
                <td><?= h($oldLibros->lBaja) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OldLibros', 'action' => 'view', $oldLibros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OldLibros', 'action' => 'edit', $oldLibros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OldLibros', 'action' => 'delete', $oldLibros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldLibros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Old Subtemas') ?></h4>
        <?php if (!empty($tema->old_subtemas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tema Id') ?></th>
                <th scope="col"><?= __('Subtema') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tema->old_subtemas as $oldSubtemas): ?>
            <tr>
                <td><?= h($oldSubtemas->id) ?></td>
                <td><?= h($oldSubtemas->tema_id) ?></td>
                <td><?= h($oldSubtemas->subtema) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OldSubtemas', 'action' => 'view', $oldSubtemas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OldSubtemas', 'action' => 'edit', $oldSubtemas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OldSubtemas', 'action' => 'delete', $oldSubtemas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oldSubtemas->id)]) ?>
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
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tema') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tema->child_temas as $childTemas): ?>
            <tr>
                <td><?= h($childTemas->id) ?></td>
                <td><?= h($childTemas->tema) ?></td>
                <td><?= h($childTemas->parent_id) ?></td>
                <td><?= h($childTemas->created) ?></td>
                <td><?= h($childTemas->modified) ?></td>
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
