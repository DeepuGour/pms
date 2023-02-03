<style>
    a.button {
    margin-top: 22px;
}
</style>
<div class="row">
   
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
          
            </table>
            <h1>Comments</h1>
            <div class="table-responsive">
                    <?php if (!empty($property->property_comments)){ ?>
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
                    <?php } ?>
                            <!-- property comment -->
                            <?php 
                                echo $this->Form->create(null,['Controller'=>'PropertyComments','action'=>'/PropertyComments/propertyComment/'.$property->id]);
                                echo $this->Form->control('comment',['type'=>'textarea','class'=>'form-control']);
                                echo $this->Form->submit(__('Post'),['class'=>'btn btn-success pull-right mt-5','id'=>'btn_submit']);
                                echo $this->Form->end();
                             ?>
                </div>
               
                  <!-- back button use  -->
                   
                  <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('Back'), ['controller'=>'Users','action' => 'userShow'], ['class' => 'button'])  ?></p>
                   
                   
</div>
</div>
