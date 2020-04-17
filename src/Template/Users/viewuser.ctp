
<p><?= $this->Html->link('Retour', ['action' => 'index'])?></p>

<article class="">
    <h1><?= $user->pseudo ?></h1>
    <div>
        <p>Créer le :</p>  <?= $user->created ?>
    </div>

    <?php if(!empty($user->avatar)) {?>
        <figure class="avatar">
            <?= $this->Html->image('avatars/'.$user->avatar, ['alt' => 'Avatar de '.$user->pseudo]) ?>
        </figure>
    <?php } else {?>
        <figure>
            <?= $this->Html->image('default.jpg', ['alt' => 'Avatar par défault ']) ?>
        </figure>
    <?php } ?>


    <br/>
    <?php if($user->created != $user->modified){ ?>
        <p>Dernière modification le : <?= $user->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></p>
    <?php } ?>
</article>

<h3>Liste de ses événements</h3>
<ul>
    <?php
    foreach ($user->events as $key => $value) {
        echo '<li>'.$this->Html->link($value->title, ['controller' => 'Events', 'action' => 'view', $value->id]).'</li>';
    }
    ?>
</ul>

<h3>Liste de ses événements auxquel il a participé</h3>
<ul>
    <?php
    foreach ($user->guests as $key => $value) {
        echo '<li>'.$value->event->title.'</li>';
    }
    ?>
</ul>
