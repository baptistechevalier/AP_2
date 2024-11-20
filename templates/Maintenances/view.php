<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintenance $maintenance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Maintenance'), ['action' => 'edit', $maintenance->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Maintenance'), ['action' => 'delete', $maintenance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maintenance->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Maintenances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Maintenance'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="maintenances view content">
            <h3><?= h($maintenance->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Computer') ?></th>
                    <td><?= $maintenance->has('computer') ? $this->Html->link($maintenance->computer->processeur, ['controller' => 'Computers', 'action' => 'view', $maintenance->computer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($maintenance->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dates') ?></th>
                    <td><?= h($maintenance->dates) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
