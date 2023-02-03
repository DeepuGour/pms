<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'button float->right'])?></p>
            <?php echo $this->Html->link(__('profile'), ['controller'=>'Users','action' => 'adminPanel'], ['class' => 'button']) ?>
            <?php echo $this->Html->link(__('Show User Profile'), ['controller'=>'Users','action' => 'userProfile'], ['class' => 'button']) ?>
            <?php echo $this->Html->link(__('Properties'), ['controller'=>'Users','action' => 'showProperty'], ['class' => 'button']) ?>
        </div>
    </aside>
<h1>Admin Panel</h1>

<div class="users index content">
     
    <h3><?= __('User Profiles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('user_type') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = $this->Paginator->counter('{{start}}');
                foreach ($users as $user){
                    if($user->user_type == 'user'){
                 ?>
                <tr>
                    <td><?= $this->Number->format($count) ?></td>
                    <td><?= h($user->user_profile->first_name) ?></td>
                    <td><?= h($user->user_profile->last_name) ?></td>
                    <td><?= h($user->user_profile->contact) ?></td>
                    <td><?= h($user->user_profile->address) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->user_type) ?></td>
                    <td><?= $this->Number->format($user->status) ?></td>
                    <td><?php echo $this->Html->image('/uploade/'.$user->image,['style'=>'width:120px;']); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?php if($user->status == 1){
                           echo  $this->Html->link(__('Inactive'), ['action' => 'inactive', $user->id]);
                        }else{
                           echo $this->Html->link(__('Active'), ['action' => 'active', $user->id]);
                        } ?>
                         <?php if($user->user_type == 'admin'){
                           echo  $this->Html->link(__('user'), ['action' => 'userActive', $user->id]);
                        }else{
                           echo $this->Html->link(__('admin'), ['action' => 'adminActive', $user->id]); 
                        } ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php
                    }
                $count++;
                } 
             ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>