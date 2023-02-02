<style>
    a.button {
    margin-top: 22px;
}
</style>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Property'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive column-80">
        <div class="properties view content">
            <h3><?= h($property->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?php echo $this->Html->image('/property/'.$property->image,['style'=>'width:300px;']); ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $property->has('user') ? $this->Html->link($property->user->id, ['controller' => 'Users', 'action' => 'view', $property->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($property->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Title') ?></th>
                    <td><?= h($property->property_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Description') ?></th>
                    <td><?= h($property->property_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Category') ?></th>
                    <td><?= h($property->property_category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Tags') ?></th>
                    <td><?= h($property->property_tags) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($property->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($property->status) ?></td>
                </tr>
           <?php 
            echo $this->Form->create(null,['action'=>'/users/propertyComment/'.$property->id]);
            echo $this->Form->control('comment',['type'=>'text','class'=>'form-control']);
            echo $this->Form->submit(__('Post'),['class'=>'btn btn-success pull-right mt-5','id'=>'btn_submit']);
            echo $this->Form->end();
    ?>
            </table>
            <h1>Comments</h1>
            <?php if (!empty($property->property_comments)){ ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Comments') ?></th>
                         
                           
                        </tr>
                        <?php foreach ($property->property_comments as $propertyComments){?>
                        <tr>
                            <td><?= h($propertyComments->user_name) ?></td>
                            <td><?= h($propertyComments->comments) ?></td>
                            
                            
                        </tr>
                        <?php } ?>
                    </table>
                  
                </div>
                <?php } ?>
                  <!-- back button use  -->
                   
                  <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('Back'), ['action' => 'userShow'], ['class' => 'button'])  ?></p>
                    <!-- logout button   -->
                    <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'button'])  ?></p>
</div>
</div>
