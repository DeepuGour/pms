<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'button float->right'])?></p>
            <?php echo $this->Html->link(__('Profile'), ['controller'=>'Users','action' => 'adminPanel'], ['class' => 'button']) ?>
            <?php echo $this->Html->link(__('Show User Profile'), ['controller'=>'Users','action' => 'userProfile'], ['class' => 'button']) ?>
            <?php echo $this->Html->link(__('Properties'), ['controller'=>'Users','action' => 'showProperty'], ['class' => 'button']) ?>
        </div>
    </aside>
<h1>Admin Panel</h1>


<!-- property details  -->
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Property> $properties
 */
?>
<div class="properties index content">
    <h3><?= __('Properties') ?></h3>
    <?php echo $this->Html->link(__('Add Property'), ['controller'=>'Users','action' => 'propertyAdd'], ['class' => 'button']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_description') ?></th>
                    <th><?= $this->Paginator->sort('property_category') ?></th>
                    <th><?= $this->Paginator->sort('property_tags') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;
                 foreach ($properties as $property): ?>
                <tr>
                    <td><?= $this->Number->format($count) ?></td>
                    <td><?= h($property->user_id) ?></td>
                    <td><?= h($property->category_name) ?></td>
                    <td><?= h($property->property_title) ?></td>
                    <td><?= h($property->property_description) ?></td>
                    <td><?= h($property->property_category) ?></td>
                    <td><?= h($property->property_tags) ?></td>
                    
                    <td><?php echo $this->Html->image('/property/'.$property->image,['style'=>'width:120px;']); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'propertyView', $property->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'propertyEdit', $property->id]) ?>
                        <?php if($property->status == 1){
                           echo  $this->Html->link(__('Inactive'), ['action' => 'propertyInactive', $property->id]);
                        }else{
                           echo $this->Html->link(__('Active'), ['action' => 'propertyActive', $property->id]);
                        } ?>
                       
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'propertyDelete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
                    </td>
                </tr>
                <?php
                   $count++;
                endforeach; ?>
            </tbody>
        </table>  
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
