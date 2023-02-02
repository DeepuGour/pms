<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */

?>
<style>
    div.error-message {
    color: red;
}
.span_error{
    color: red;
}
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('back'), ['action' => 'showProperty'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property,['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add Property') ?></legend>
                <?php
                    echo $this->Form->control('user_id',['type'=>'hidden','value'=>$user->id]);
                    echo $this->Form->control('category_name',['required'=>false,'class'=>'form-control']);
                    ?><span class = "span_error" id = 'error_category_name'></span><?php
                    echo $this->Form->control('property_title',['required'=>false,'class'=>'form-control']);
                    ?><span class = "span_error" id = 'error_property_title'></span><?php
                    echo $this->Form->control('property_description',['required'=>false,'class'=>'form-control']);
                    ?><span class = "span_error" id = 'error_property_description'></span><?php
                    echo $this->Form->control('property_category',['required'=>false,'class'=>'form-control']);
                    ?><span class = "span_error" id = 'error_property_category'></span><?php
                    echo $this->Form->control('property_tags',['required'=>false,'class'=>'form-control']);
                    ?><span class = "span_error" id = 'error_property_tags'></span><?php
                    echo $this->Form->control('image_file',['type'=>'file','accept'=>'image/*','required'=>'false','class'=>'form-control']);
                    ?><span class = "span_error" id = 'error_image_file'></span><?php
                    echo $this->Form->control('status',['type'=>'hidden','value'=>1]);
                 ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['id'=>'btn-submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!-- Section: Design Block -->
<!-- jquery cdn  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?= $this->Html->script(['PropertyValidation']) ?>
<?= $this->fetch('script') ?>
