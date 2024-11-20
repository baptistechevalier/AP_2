<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Game'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="games view content">
            <h3><?= h($game->nom_jeu) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nom Jeu') ?></th>
                    <td><?= h($game->nom_jeu) ?></td>
                </tr>
                <tr>
                    <th><?= __('Plateforme') ?></th>
                    <td><?= h($game->plateforme) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($game->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Computers') ?></h4>
                <?php if (!empty($game->computers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Processeur') ?></th>
                            <th><?= __('Os') ?></th>
                            <th><?= __('Ram') ?></th>
                            <th><?= __('Gpu') ?></th>
                            <th><?= __('Stockage') ?></th>
                            <th><?= __('Alim') ?></th>
                            <th><?= __('Disponiblie') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($game->computers as $computers) : ?>
                        <tr>
                            <td><?= h($computers->id) ?></td>
                            <td><?= h($computers->processeur) ?></td>
                            <td><?= h($computers->os) ?></td>
                            <td><?= h($computers->ram) ?></td>
                            <td><?= h($computers->gpu) ?></td>
                            <td><?= h($computers->stockage) ?></td>
                            <td><?= h($computers->alim) ?></td>
                            <td><?= h($computers->disponiblie) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Computers', 'action' => 'view', $computers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Computers', 'action' => 'edit', $computers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Computers', 'action' => 'delete', $computers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $computers->id)]) ?>
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
