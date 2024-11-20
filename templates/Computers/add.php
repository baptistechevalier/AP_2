<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Computer $computer
 * @var \Cake\Collection\CollectionInterface|string[] $games
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Computers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="computers form content">
            <?= $this->Form->create($computer) ?>
            <fieldset>
                <legend><?= __('Add Computer') ?></legend>
                <?php
                    echo $this->Form->control('processeur');
                    echo $this->Form->control('os');
                    echo $this->Form->control('ram');
                    echo $this->Form->control('gpu');
                    echo $this->Form->control('stockage');
                    echo $this->Form->control('alim');
                    echo $this->Form->control('disponiblie');
                    echo $this->Form->control('games._ids', ['options' => $games]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
