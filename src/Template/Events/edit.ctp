<h1>Editer votre événement</h1>
<?= $this->Form->create($e) ?>
<?= $this->Form->control('title') ?>
<?= $this->Form->control('description', ['label' => 'description']) ?>
<?= $this->Form->control('location', ['label' => 'location']) ?>
<?= $this->Form->control('beginning', ['label' => 'Date de début', 'type' => 'datetime-local']) ?>
<?= $this->Form->button('Modifier') ?>
<?= $this->Form->end() ?>

