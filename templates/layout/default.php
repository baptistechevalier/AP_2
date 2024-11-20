<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Arras Game';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Arras</span>Game</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="/AP_2/packages/liste">Nos forfaits</a>
            <?php $user = $this->request->getAttribute('identity'); 
            
            if($role =='admin'){
                ?>
                <a target="_blank" rel="noopener" href="/AP_2/packages/index">Géré les utilisateurs</a>
                <a target="_blank" rel="noopener" href="/AP_2/users/index">Géré les forfaits</a>
                <a target="_blank" rel="noopener" href="/AP_2/computer/index">Géré les ordinateurs</a>
                <a target="_blank" rel="noopener" href="/AP_2/games/index">Géré les jeux</a>
                <?php
            } ?>
            
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
