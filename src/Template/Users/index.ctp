<h1>Liste des utilisateurs</h1>

<?php
if($users->count() == 0)
    echo'<p>Désolé, il n\'y a pas d\'autres users d\'inscrits.</p>';
else{?>
    <table>
        <thead>
        <tr>
            <th>Pseudo</th>
            <th>Created</th>
            <th>Modified</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $key => $u){ ?>
            <tr>
                <td><?= $u->pseudo ?></td>
                <td><?= $u->created ?></td>
                <td><?= $u->modified ?></td>
                <td><?= $this->Html->link('En savoir plus', ['action' => 'viewuser', $u->id])?></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>

<?php } ?>



