<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */

?>
<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'button float->right'])?></p>
            <?php echo $this->Html->link(__('profile'), ['controller'=>'Users','action' => 'adminPanel'], ['class' => 'button']) ?>
            <?php echo $this->Html->link(__('Show User Profile'), ['controller'=>'Users','action' => 'userProfile'], ['class' => 'button']) ?>
            <?php echo $this->Html->link(__('properties'), ['controller'=>'Users','action' => 'showProperty'], ['class' => 'button']) ?>
        </div>
    </aside>
<h1>Admin Panel</h1>

<div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($post->user_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Profile Image') ?></th>
                    <td><?php echo $this->Html->image('/uploade/'.$post->image,['style'=>'width:200px;']) ?></td>
                </tr>
                <tr>
                <th><?= __('first_name') ?></th>
                <td><?= h($post->user_profile->first_name ) ?></td>
                </tr>
                <tr>
                <th><?= __('last_name') ?></th>
                <td><?= h($post->user_profile->last_name ) ?></td>
                </tr>
                <tr>
                <th><?= __('contact') ?></th>
                <td><?= h($post->user_profile->contact ) ?></td>
                </tr>
                <tr>
                <th><?= __('address') ?></th>
                <td><?= h($post->user_profile->address ) ?></td>
                <tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($post->email) ?></td>
                </tr>
            </table>
        </div>
       
    </div>
</div>


<!-- property details  -->
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */
?>
