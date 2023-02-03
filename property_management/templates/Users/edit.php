<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
    a.button {
    margin-top: 23px;
}
</style>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user,['role' => 'form','enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                     echo $this->Form->control('user_profile.first_name');
                     echo $this->Form->control('user_profile.last_name');
                     echo $this->Form->control('user_profile.contact');
                     echo $this->Form->control('user_profile.address');
                    echo $this->Form->control('email');
                    echo $this->Form->control('user_type',['type'=>'hidden']);
                    echo $this->Form->control('status',['type'=>'hidden']);
                   
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
             <!-- back button  -->
     <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('Back'), ['action' => 'userShow'], ['class' => 'button'])  ?></p>
        </div>
    </div>
    
</div>
