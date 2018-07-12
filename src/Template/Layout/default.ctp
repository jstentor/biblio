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
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['foundation.6.4.2', 'base', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar claro" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Biblioteca</a></h1>
            </li>
        </ul>
    </nav>

    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-3 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">
                <li class="active"><?= $this->Html->link(__('Libros'), ['controller' => 'libros']) ?></li>
                <li><?= $this->Html->link(__('Autores'), ['controller' => 'autores']) ?></li>
                <li><?= $this->Html->link(__('Temas'), ['controller' => 'temas']) ?></li>
            </ul>

            <ul class="right">
                <ul class="right">
                    <li><?= empty($logged_user) ?
                    $this->Html->link(__('Login'), ['controller' => 'users','action' => 'login']) :
                    $this->Html->link(__("$logged_user: Logout"), ['controller' => 'users','action' => 'logout']); ?></li>
                </ul>
            </ul>
        </div>
        <div class="top-bar-right">
          <ul class="menu">
           <li><a href="#">Libros</a></li>
           <li><a href="#">Autores</a></li>
           <li><a href="#">Revistas</a></li>
           <li><a href="#">Four</a></li>
           <?php 
           if (!empty($logged_user))
           { 
               echo ('<li>' .
                $this->Html->link(__("$logged_user: Logout"), ['controller' => 'users','action' => 'logout']));
           } 
           else
           {
            echo ('<li>' .  $this->Html->link(__('Login'), ['controller' => 'users','action' => 'login']) . '</li>');
        }
        ?>
    </ul>
</div>
</div>

<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
