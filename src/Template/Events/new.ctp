<h1>Créer un nouvel événement</h1>

<?= $this->Form->create($n, ['enctype' => 'multipart/form-data']) ?>
<?= $this->Form->control('title', ['label' => 'title']) ?>
<?= $this->Form->control('description', ['label' => 'description']) ?>
<?= $this->Form->control('location', ['label' => 'location']) ?>
<?= $this->Form->control('beginning', ['label' => 'Date de début', 'type' => 'datetime-local']) ?>
<?php echo $this->Form->control('picture', ['type' => 'file']); ?>

<?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>

