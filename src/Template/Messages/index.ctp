<div class="container ">
    <h3 class=" text-center">Vos messages</h3>
    <div class="messaging">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>

                </div>

                    <div class="inbox_chat">
                        <div class="chat_list">
                            <?php foreach ($messages as $key => $m){ ?>
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5><?= $m->Receiver->pseudo ?> <span class="chat_date"><?= $m->created ?></span></h5>
                                    <p><?= $m->content ?></p>
                                    <p class="open"><?= $this->Html->link('Open', ['action' => 'viewmessages', $m->id])?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

            </div>




