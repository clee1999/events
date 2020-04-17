
<p><?= $this->Html->link('Retour', ['action' => 'index'])?></p>

<article class="">
    <h1><?= $e->title ?></h1>



    <?php
    //si on est non-connecté
    if(!$Auth->user()) { ?>

    <?php } else { ?>

        <p><?= $this->Html->link('Modifier', ['action' => 'edit', $e->id])?></p>
        <p><?= $this->Html->link('Supprimer ', ['action' => 'delete', $e->id])?></p>

    <?php }  ?>

    <div>
        <p>Créer le : <?= $e->created ?></p>
        <p>Par : <?= $e->user->pseudo ?></p>
        <p>Description : <?= $e->description ?></p>
        <p>Date de l'event : <?= $e->beginning ?></p>
        <p>Lieu : <?= $e->location ?></p>
        <?php if(!empty($e->picture)) {?>
            <figure class="avatar">
                <?= $this->Html->image('pictures/'.$e->picture, ['alt' => 'photo de '.$e->title]) ?>
            </figure>
        <?php } else {?>
            <figure>
                <?= $this->Html->image('default.jpg', ['alt' => 'picture par défault ']) ?>
            </figure>
        <?php } ?>

    </div>
    <br/>
    <?php if($e->created != $e->modified){ ?>
        <p>Dernière modification le : <?= $e->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></p>
    <?php } ?>
</article>

<h1>Liste des guests</h1>

<table>
    <thead>
    <tr>
        <th>Membre</th>
        <th>Depuis</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($e->guests as $key => $value){ ?>
        <tr>
            <td><?= $value->user->pseudo ?></td>
            <td><?= $value->created ?></td>

        </tr>

    <?php } ?>
    </tbody>
</table>



