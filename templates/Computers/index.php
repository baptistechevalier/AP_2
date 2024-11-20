<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Computer> $computers
 */
?>
<div class="computers index content">
    <?= $this->Html->link(__('New Computer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Computers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('processeur') ?></th>
                    <th><?= $this->Paginator->sort('os') ?></th>
                    <th><?= $this->Paginator->sort('ram') ?></th>
                    <th><?= $this->Paginator->sort('gpu') ?></th>
                    <th><?= $this->Paginator->sort('stockage') ?></th>
                    <th><?= $this->Paginator->sort('alim') ?></th>
                    <th><?= $this->Paginator->sort('disponiblie') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($computers as $computer): ?>
                <tr>
                    <td><?= $this->Number->format($computer->id) ?></td>
                    <td><?= h($computer->processeur) ?></td>
                    <td><?= h($computer->os) ?></td>
                    <td><?= h($computer->ram) ?></td>
                    <td><?= h($computer->gpu) ?></td>
                    <td><?= h($computer->stockage) ?></td>
                    <td><?= h($computer->alim) ?></td>
                    <td><?= h($computer->disponiblie) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $computer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $computer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $computer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $computer->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
