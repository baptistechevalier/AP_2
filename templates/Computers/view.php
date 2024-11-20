<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Computer $computer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Computer'), ['action' => 'edit', $computer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Computer'), ['action' => 'delete', $computer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $computer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Computers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Computer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="computers view content">
            <h3><?= h($computer->processeur) ?></h3>
            <table>
                <tr>
                    <th><?= __('Processeur') ?></th>
                    <td><?= h($computer->processeur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Os') ?></th>
                    <td><?= h($computer->os) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ram') ?></th>
                    <td><?= h($computer->ram) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gpu') ?></th>
                    <td><?= h($computer->gpu) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stockage') ?></th>
                    <td><?= h($computer->stockage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alim') ?></th>
                    <td><?= h($computer->alim) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($computer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Disponiblie') ?></th>
                    <td><?= $computer->disponiblie ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Games') ?></h4>
                <?php if (!empty($computer->games)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nom Jeu') ?></th>
                            <th><?= __('Plateforme') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($computer->games as $games) : ?>
                        <tr>
                            <td><?= h($games->id) ?></td>
                            <td><?= h($games->nom_jeu) ?></td>
                            <td><?= h($games->plateforme) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $games->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Maintenances') ?></h4>
                <?php if (!empty($computer->maintenances)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dates') ?></th>
                            <th><?= __('Computer Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($computer->maintenances as $maintenances) : ?>
                        <tr>
                            <td><?= h($maintenances->id) ?></td>
                            <td><?= h($maintenances->dates) ?></td>
                            <td><?= h($maintenances->computer_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Maintenances', 'action' => 'view', $maintenances->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Maintenances', 'action' => 'edit', $maintenances->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Maintenances', 'action' => 'delete', $maintenances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maintenances->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
