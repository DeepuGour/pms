<?php
// template set 
$myTemplates = [
    'inputContainer' => '<div class="input-group input-group-outline mb-3">{{content}}</div>',
];
$this->Form->setTemplates($myTemplates);

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
                  <p class="mb-0">Property Add</p>
                </div>
                <div class="card-body">
                    <!-- //form create  -->
                  <?php 
                        echo $this->Form->create($category,['enctype'=>'multipart/form-data']);
                        echo $this->Form->control('user_id',['type'=>'hidden','value'=>$user->id]);
                        echo $this->Form->control('category_name',['class'=>'form-control','label'=>['class'=>'form-label'],'required'=>false]);
                        echo $this->Form->control('status',['type'=>'hidden','value'=> 1]);
                   ?>
                   
    
                   
                    <div class="text-center">
                        <!-- submit button  -->
                        <?php echo $this->Form->button(__('Property Add'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0','id'=>'btn-submit']) ?>
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