
<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
         
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:400px;">
          <h3>User Profile</h3>
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
            <?php echo $this->Html->image('/uploade/'.$post->image,['class'=>'img-fluid img-thumbnail mt-4 mb-2','alt'=>'$post->image','style'=>'width: 150px; z-index: 1'])?>
            
             </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h6><?php echo "Name: ".$post->user_profile->first_name.' '.$post->user_profile->last_name; ?></h6>
              <p><?php echo "Email: ".$post->email;?></p>
              <p><?php echo "Contact: ".$post->user_profile->contact;?></p>
              <p><?php echo "Address: ".$post->user_profile->address;?></p>
             
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <!--logout button--> <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'button float-right'])  ?></p>
               <!--Edit button--> <?php echo $this->Html->link(__('Edit Profile'), ['action' => 'edit', $post->id])  ?>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p>Hii <?php echo $post->user_profile->first_name.' '.$post->user_profile->last_name; ?></p>
                <p>Welcome to My Home Page</p>
                <p>I hope this enjoy your page</p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Properties</p>
             
            </div>
            <div class="row g-2">
              <!-- propertys get  -->
              <?php  
              foreach($properties as $property){
                if($property->status == 1){?> 
              <div class="col mb-2">
                <h5>Property</h5>
              <?php 
              echo $this->Html->image('/property/'. $property->image,['class'=>'img-fluid img-thumbnail mt-4 mb-2','alt'=>'$post->image','style'=>'width: 150px; z-index: 1']);
              ?>
              <h6><?php echo "Category Name:-".$property->category_name;?></h6>
              <p><?php echo "Property Title:-".$property->property_title;?></p>
             
              <?= $this->Html->link(__('Property Details'), ['controller'=>'Properties','action' => 'propertyShow', $property->id]) ?>
              

              </div>
              <?php } }?>
            </div>
           
          </div>
          <div class="row">
          <ul class="pagination">
            <?= $this->Paginator->first('< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
          <p class = "pagination float-left"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
</section>