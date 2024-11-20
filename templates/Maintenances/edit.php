<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintenance $maintenance
 * @var string[]|\Cake\Collection\CollectionInterface $computers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $maintenance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $maintenance->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Maintenances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="maintenances form content">
            <?= $this->Form->create($maintenance) ?>
            <fieldset>
                <legend><?= __('Edit Maintenance') ?></legend>
                <?php
                    echo $this->Form->control('dates');
                    echo $this->Form->control('computer_id', ['options' => $computers]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
