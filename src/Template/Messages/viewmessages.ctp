<p><?= $this->Html->link('Retour', ['action' => 'index'])?></p>
<div class="mesgs">
    <div class="msg_history">
        <?php foreach ($message as $key => $value){ ?>
        <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                <?= $value->receiver_id ?></div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p><?= $value->content ?></p>
                    <span class="time_date"><?= $value->created ?></span></div>
            </div>
        </div>
        <?php } ?>


    </div>
    <div class="type_msg">
        <div class="input_msg_write">
            <?= $this->Form->create($new, ['url' => ['controller' => 'Messages', 'action' => 'new', $message->receiver_id]]) ?>
            <?= $this->Form->control('content', ['label' => 'Répondre']) ?>
            <?= $this->Form->button('Envoyer') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

