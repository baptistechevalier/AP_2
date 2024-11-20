<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Maintenance> $maintenances
 */
?>
<div class="maintenances index content">
    <?= $this->Html->link(__('New Maintenance'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Maintenances') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dates') ?></th>
                    <th><?= $this->Paginator->sort('computer_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($maintenances as $maintenance):?>
                <tr>
                    <td><?= $this->Number->format($maintenance->id) ?></td>
                    <td><?= h($maintenance->dates) ?></td>
                    <td><?= $maintenance->has('computer') ? $this->Html->link($maintenance->computer->id, ['controller' => 'Computers', 'action' => 'view', $maintenance->computer->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $maintenance->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $maintenance->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $maintenance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maintenance->id)]) ?>
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
