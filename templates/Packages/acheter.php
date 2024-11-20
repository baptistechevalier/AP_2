<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Package> $packages
 */
?>

<h1>Acheter le forfait : <?= h($package->nom) ?></h1>

<p>
    <strong>Description :</strong> <?= h($package->description) ?><br>
    <strong>Prix :</strong> <?= h($package->prix) ?> €<br>
    <strong>Durée :</strong> <?= h($package->duration) ?> jours
</p>

<?= $this->Form->create() ?>
    <?= $this->Form->button(__('Confirmer l\'achat')) ?>
<?= $this->Form->end() ?>

<p>
    <?= $this->Html->link('Retour à la liste des forfaits', ['action' => 'liste']) ?>
</p>
