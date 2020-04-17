<h1>Se connecter</h1>

<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __("Merci d'entrer votre nom d'utilisateur et votre mot de passe") ?></legend>
    <?= $this->Form->control('pseudo') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button('Se Connecter'); ?>
<?= $this->Form->end() ?>
