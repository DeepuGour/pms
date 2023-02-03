<div class="row">
    <div class="column-responsive column-80">
        <div class="properties view content">
            <h3><?= h($property->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Property Image') ?></th>
                   <?php echo $this->Html->image('/property/'. $property->image,['class'=>'img-fluid img-thumbnail mt-4 mb-2','alt'=>'$post->image','style'=>'width: 150px; z-index: 1']);?>
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
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($property->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modify Date') ?></th>
                    <td><?= h($property->modify_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Property Comments') ?></h4>
                <?php if (!empty($property->property_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Name') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Modifie Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($property->property_comments as $propertyComments) : ?>
                        <tr>
                            <td><?= h($propertyComments->id) ?></td>
                            <td><?= h($propertyComments->property_id) ?></td>
                            <td><?= h($propertyComments->user_id) ?></td>
                            <td><?= h($propertyComments->user_name) ?></td>
                            <td><?= h($propertyComments->comments) ?></td>
                            <td><?= h($propertyComments->create_date) ?></td>
                            <td><?= h($propertyComments->modifie_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PropertyComments', 'action' => 'view', $propertyComments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PropertyComments', 'action' => 'edit', $propertyComments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertyComments', 'action' => 'delete', $propertyComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyComments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
             <!-- back button use  -->
                   
             <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('Back'), ['controller' => 'Users','action' => 'showProperty'], ['class' => 'button'])  ?></p>

                  
        </div>
    </div>
</div>