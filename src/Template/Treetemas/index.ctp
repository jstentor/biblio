<?php
echo $this->Html->link("Add Tema",array('action'=>'add'));
echo "<ul>";
foreach($temas as $key=>$value)
{
 	$editurl = $this->Html->link("Edit", array('action'=>'edit', $key),array('style'=>'font-weight:lighter;font-size:9px;color:green;','title'=>'Edit This Node'));
 	$upurl = $this->Html->link("Up", array('action'=>'moveup', $key),array('style'=>'font-weight:lighter;font-size:9px;color:green;','title'=>'Move Up the Tree'));
 	$downurl = $this->Html->link("Down", array('action'=>'movedown', $key),array('style'=>'font-weight:lighter;font-size:9px;color:green;','title'=>'Move Down the Tree'));
 	$deleteurl = $this->Html->link("Delete", array('action'=>'delete', $key),array('style'=>'font-weight:lighter;font-size:9px;color:green;','title'=>'Delete the Node from the Tree'));
 	$removeurl =$this->Html->link("Remove From Tree",array('action'=>'removeNode',$key),array('style'=>'font-weight:lighter;font-size:9px;color:#b3b3b3;','title'=>'Remove the Node from the Tree'));
 	echo "<li><sub>-$editurl-$upurl-$downurl-$deleteurl- </sub><span style='color:red;'>$value</span> <sup>$removeurl</sup></li>";
}
echo "</ul>";
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tema[]|\Cake\Collection\CollectionInterface $temas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tema'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['controller' => 'Libros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libro'), ['controller' => 'Libros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="temas index large-9 medium-8 columns content">
    <h3><?= __('Temas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tema') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ParentTemas.tema', 'Tema padre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($temas as $key => $tema): ?>
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
