<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<style>
    div.error-message {
    color: red;
}
</style>
<div class="row">
   
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property,['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit Property') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['type'=>'hidden','options' => $users]);
                    echo $this->Form->control('category_name',['required'=>false]);
                    echo $this->Form->control('property_title',['required'=>false]);
                    echo $this->Form->control('property_description',['required'=>false]);
                    echo $this->Form->control('property_category',['required'=>false]);
                    echo $this->Form->control('property_tags',['required'=>false]);
                    echo $this->Form->control('image_file',['type'=>'file','accept'=>'image/*','required'=>false]);
                    echo $this->Form->control('status',['type'=>'hidden']);
                 
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>