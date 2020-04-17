<?= $this->Form->create($n) ?>
    <fieldset>
        <legend><?= __('Envoyer un message') ?></legend>
        <?php
        echo $this->Form->control('content');
        echo $this->Form->control('receiver_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button('Submit') ?>
    <?= $this->Form->end() ?>
