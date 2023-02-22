<?php
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
select#Select {
    border: 1px solid gray;
    padding-left: 16px;
}
</style>
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
                        echo $this->Form->create($property,['enctype'=>'multipart/form-data','id'=>'formData','data-id'=>$property->id]);
                        echo $this->Form->control('user_id',['type'=>'hidden','value'=>$user->id]);
                        echo $this->Form->control('property_title',['class'=>'','label'=>['class'=>'form-label'],'required'=>false]);
                        echo $this->Form->control('property_description',['type'=>'textarea','class'=>'','placeholder'=>'Property Description','required'=>false]);
                        //  echo $this->Form->control('property_category',['type'=>'select','class'=>'form-control','label'=>['class'=>'form-label'],'required'=>false]);
                        // echo $form->input('category_name',['type'=>'select', 'options'=>$categories, 'label'=>false, 'empty'=>'Category']); ?>

                    
                        <label for="cars">Choose Property</label>
                        <select id="Select" name="category_name" class="mb-4">
                        <option value = "">Choose Property Category</option>
                         <?php foreach($categories as  $category){ 
                          ?>
                          <option value="<?php echo $category->category_name?>"><?php echo $category->category_name?></option>
                         <?php }?> 
                       </select> 
                         <?php
                        
                        echo $this->Form->control('property_tags',['class'=>'','required'=>false]);
                        echo $this->Form->control('image',['type'=>'file','class'=>'','required'=>false]);
                        echo $this->Form->control('status',['type'=>'hidden','value'=> 1]);
                        ?>
                   
                   
                   
                   <div class="text-center">
                   <!-- submit button  -->
                        <?php echo $this->Form->button(__('Property Edit'),['class'=>'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0 editProperty','id'=>'btn-submit','data-id'=>$property->id]) ?>
                    </div>
                    <?php echo  $this->Form->end();?>
                    <?php echo $this->Flash->render() ?>
                </div>
            </div>
          </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
          var csrfToken = $('meta[name="csrfToken"]').attr('content');
        </script>
      <script>
        $('#formData').submit(function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            var formData = new FormData(this);
          $.ajax({
            headers: {
                    'X-CSRF-TOKEN': csrfToken
                  },
          url: "/properties/propertyEdit/"+id,
          type: "json",
          cache: false,
          processData: false,
          contentType: false,
          method: "POST",
          data:formData,
        success:function(response){
         if(response == 1){
          $('#exampleModal').modal('hide');
         }
       }
     });
    });
  </script>