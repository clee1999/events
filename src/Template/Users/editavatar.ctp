<h1>Ajouter/Modifier votre avatar</h1>

<?php echo $this->Form->create($modif, ['enctype' => 'multipart/form-data']); ?>
<?php echo $this->Form->control('avatar', ['type' => 'file']); ?>
<?php echo $this->Form->button('Valider'); ?>
<?php echo $this->Form->end(); ?>
