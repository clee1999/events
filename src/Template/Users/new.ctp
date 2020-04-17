<h1>Créer un compte</h1>

<?= $this->Form->create($new) ?>
<?= $this->Form->control('pseudo', ['label' => 'Pseudo']) ?>
<?= $this->Form->control('password', ['label' => 'Password']) ?>

<?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>
