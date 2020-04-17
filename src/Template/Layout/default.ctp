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

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script('jquery-3.4.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <?php
    //si on est non-connecté
    if(!$Auth->user()) { ?>
        <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login']) ?>
        <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'new']) ?>
        <?= $this->Html->link('Evénements', ['controller' => 'Events', 'action' => 'index']) ?>
    <?php } else { ?>
        <?= $this->Html->link('Evénements', ['controller' => 'Events', 'action' => 'index'], ['class' => ($this->templatePath == 'Events' && $this->template == 'index') ? 'active' : ''])  ?>
        <?= $this->Html->link('Ajouter event', ['controller' => 'Events', 'action' => 'new'], ['class' => ($this->templatePath == 'Events' && $this->template == 'new') ? 'active' : ''])  ?>
        <?= $this->Html->link('Inviter', ['controller' => 'Guests', 'action' => 'invite'], ['class' => ($this->templatePath == 'Guests' && $this->template == 'invite') ? 'active' : ''])  ?>

        <?= $this->Html->link('Mes messages', ['controller' => 'Messages', 'action' => 'index'], ['class' => ($this->templatePath == 'Messages' && $this->template == 'index') ? 'active' : ''])  ?>

        <?= $this->Html->link('Liste des membres', ['controller' => 'Users', 'action' => 'index'], ['class' => ($this->templatePath == 'Users' && $this->template == 'index') ? 'active' : ''])  ?>
        <?= $this->Html->link('Modifier votre compte', ['controller' => 'Users', 'action' => 'edit'], ['class' => ($this->templatePath == 'Users' && $this->template == 'edit') ? 'active' : ''])  ?>
        <?= $this->Html->link('Edit avatar', ['controller' => 'Users', 'action' => 'editavatar'], ['class' => ($this->templatePath == 'Users' && $this->template == 'editavatar') ? 'active' : '']) ?>
        <?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout']) ?>



    <?php }  ?>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
