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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">EventsWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if(!$Auth->user()) { ?>
                <li class="nav-item">
                    <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'new']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Evénements', ['controller' => 'Events', 'action' => 'index']) ?>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <?= $this->Html->link('Evénements', ['controller' => 'Events', 'action' => 'index'], ['class' => ($this->templatePath == 'Events' && $this->template == 'index') ? 'active' : ''])  ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Ajouter event', ['controller' => 'Events', 'action' => 'new'], ['class' => ($this->templatePath == 'Events' && $this->template == 'new') ? 'active' : ''])  ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Inviter', ['controller' => 'Guests', 'action' => 'invite'], ['class' => ($this->templatePath == 'Guests' && $this->template == 'invite') ? 'active' : ''])  ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Mes messages', ['controller' => 'Messages', 'action' => 'index'], ['class' => ($this->templatePath == 'Messages' && $this->template == 'index') ? 'active' : ''])  ?>
                </li>
            <li class="nav-item">
                <?= $this->Html->link('Liste des membres', ['controller' => 'Users', 'action' => 'index'], ['class' => ($this->templatePath == 'Users' && $this->template == 'index') ? 'active' : ''])  ?>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav" >
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mon compte
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <div  class="dropdown-item">                    <?= $this->Html->link('Modifier votre compte', ['controller' => 'Users', 'action' => 'edit'], ['class' => ($this->templatePath == 'Users' && $this->template == 'edit') ? 'active' : ''])  ?>
                 </div>
                    <div  class="dropdown-item">
                        <?= $this->Html->link('Edit avatar', ['controller' => 'Users', 'action' => 'editavatar'], ['class' => ($this->templatePath == 'Users' && $this->template == 'editavatar') ? 'active' : '']) ?>

                    </div>
                    <div class="dropdown-divider"></div>
                    <div  class="dropdown-item">
                        <?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout']) ?>

                    </div>
                </div>
            </li>
            </ul>
        </form>
        <?php }  ?>
    </div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
