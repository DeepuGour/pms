<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                <th><?= __('first_name') ?></th>
                <td><?= h($user->user_profile->first_name ) ?></td>
                </tr>
                <tr>
                <th><?= __('last_name') ?></th>
                <td><?= h($user->user_profile->last_name ) ?></td>
                </tr>
                <tr>
                <th><?= __('contact') ?></th>
                <td><?= h($user->user_profile->contact ) ?></td>
                </tr>
                <tr>
                <th><?= __('address') ?></th>
                <td><?= h($user->user_profile->address ) ?></td>
                <tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Type') ?></th>
                    <td><?= h($user->user_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?php echo $this->Html->image('/uploade/'.$user->image,['style'=>'width:120px;']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($user->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($user->modified_date) ?></td>
                </tr>
            </table>
                    <!-- back button  -->
                    <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('Back'), ['action' => 'userProfile'], ['class' => 'button'])  ?></p>
        </div>
       
    </div>
</div>
