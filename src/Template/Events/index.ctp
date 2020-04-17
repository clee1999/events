<h3>Liste des événements à venir</h3>
<br>
<table>
    <head>
        <tr>
            <th>Events</th>
            <th>Auteur</th>
            <th>Crée le </th>
            <th>Date </th>
            <th>Voir les détails</th>
        </tr>
    </head>
    <tbody>
    <?php foreach ($list as $key => $value){ ?>
        <tr>
            <td>
                <?= $this->Html->link($this->Text->truncate(strip_tags($value->title), 15, ['ellipsis' => '...']), ['controller' => 'Events', 'action' => 'view', $value->id]) ?>
            <td>
                <?php
                //si on est non-connecté
                if(!$Auth->user()) { ?>
                    <?= $value->user->pseudo ?>
                <?php } else { ?>
                    <?= $this->Html->link($this->Text->truncate(strip_tags($value->user->pseudo), 15, ['ellipsis' => '...']), ['controller' => 'Users', 'action' => 'viewuser', $value->user->id]) ?>
                <?php }  ?>

            </td>
            <td><?= $value->created->i18nFormat('dd/MM/yy') ?></td>
            <td><?= $value->beginning ?></td>
            <td><?= $this->Html->link('Plus', ['action' => 'view', $value->id])?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>




