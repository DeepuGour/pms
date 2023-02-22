<?php
// template set 
// $myTemplates = [
//     'inputContainer' => '<div class="input-group input-group-outline mb-3">{{content}}</div>',
// ];
// $this->Form->setTemplates($myTemplates);
?>
<style>
    .card.card-plain {
    width: 608px;
    margin: auto;
    background-color: white;
}
</style>
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
                <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Properties</h4>
                  <p class="mb-0">Property edit</p>
                </div>
                <div class="card-body">
                    <!-- //form create  -->
                  <?php 
                        echo $this->Form->create($property,['enctype'=>'multipart/form-data']);
                        echo $this->Form->control('category_name',['class'=>'','label'=>['class'=>'form-label'],'required'=>false]);
                        echo $this->Form->control('property_title',['class'=>'','label'=>['class'=>'form-label'],'required'=>false]);
                        echo $this->Form->control('property_description',['type'=>'textarea','class'=>'','label'=>false,'placeholder'=>'Property Description','required'=>false]);
                        echo $this->Form->control('property_tags',['class'=>'','label'=>['class'=>'form-label'],'required'=>false]);
                        echo $this->Form->control('property_image',['type'=>'file','name'=>'image','class'=>'','label'=>false,'required'=>false]);
                        echo $this->Form->control('status',['type'=>'hidden','value'=> 1]);
                   ?>
                   
    
                   
                    <div class="text-center">
                        <!-- submit button  -->
                        <?php echo $this->Form->button(__('Property Edit'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0','id'=>'btn-submit']) ?>
                    </div>
                    <?php echo  $this->Form->end();?>
                    <?php echo $this->Flash->render() ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>