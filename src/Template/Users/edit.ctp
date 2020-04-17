<h1>Modifier votre compte</h1>

<?= $this->Form->create($e) ?>
<?= $this->Form->control('pseudo') ?>
<?= $this->Form->control('password', ['value' => '']) ?>
<?= $this->Form->button('Modifier') ?>
<?= $this->Form->end() ?>

<?= $this->Form->postLink('Supprimer le compte', ['controller' => 'Users', 'action' => 'delete']) ?>
