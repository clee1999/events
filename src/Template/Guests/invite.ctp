<h1>Envoyer une invitation d'adhésion à un event</h1>

<?= $this->Form->create($guest) ?>

<?= $this->Form->control('event_id', ['options' => $events]) ?>

<?= $this->Form->control('user_id', ['options' => $users]) ?>


<?= $this->Form->button('Inviter') ?>
<?= $this->Form->end() ?>
