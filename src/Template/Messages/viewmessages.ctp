<p><?= $this->Html->link('Retour', ['action' => 'index'])?></p>
<div class="mesgs">
    <div class="msg_history">
        <?php foreach ($message as $key => $value){ ?>
        <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p><?= $value->content ?></p>
                    <span class="time_date"><?= $value->created ?></span></div>
            </div>
        </div>
        <?php } ?>
        <div class="outgoing_msg">
            <div class="sent_msg">
                <p>Test which is a new approach to have all
                    solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
        </div>

    </div>
    <div class="type_msg">
        <div class="input_msg_write">
            <input type="text" class="write_msg" placeholder="Type a message" />
            <button class="msg_send_btn" value="Envoyer" type="button"></button>
        </div>
    </div>
</div>

