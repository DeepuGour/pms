<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
<?= $this->Flash->render()?>
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
    .span_error{
      color:red;
    }
    

   
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
        <li class="nav-item active"><?php echo $this->Html->link(__('My Home'), ['action' => 'home'], ['class' => 'navbar-brand'])?></li>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><?php echo $this->Html->link(__('Home'), ['action' => 'home'], ['class' => 'nav-link'])?></li>
	          <li class="nav-item"><?php echo $this->Html->link(__('Register'), ['action' => 'userAdd'], ['class' => 'nav-link'])?></li>
			  <li class="nav-item"><?php echo $this->Html->link(__('login'), ['action' => 'login'], ['class' => 'nav-link'])?></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best offer <br />
          <span class="span_error" style="color: hsl(218, 81%, 75%)">for your House</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <?php echo $this->Form->create($user,['enctype'=>'multipart/form-data']) ?>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                    <!-- first_name  -->
                  <div class="form-outline">
                 <?php echo $this->Form->control('user_profile.first_name',['class'=>'form-control mt-2','required'=>'false']);?>
                 <span class="span_error" id="error_first_name"></span>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                    <!-- last name  -->
                  <div class="form-outline">
                   <?php echo $this->Form->control('user_profile.last_name',['class'=>'form-control mt-2','required'=>'false']); ?>
                   <span class="span_error" id="error_last_name"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4">
                    <!-- contact  -->
                  <div class="form-outline">
                 <?php echo $this->Form->control('user_profile.contact',['class'=>'form-control mt-2','required'=>'false']);?>
                 <span class="span_error" id="error_contact"></span>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                    <!-- address  -->
                  <div class="form-outline">
                   <?php echo $this->Form->control('user_profile.address',['class'=>'form-control mt-2','required'=>'false']); ?>
                   <span class="span_error" id="error_address"></span>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <?php echo $this->Form->control('email',['class'=>'form-control mt-2','required'=>'false']) ?>
                <span class="span_error" id="error_email"></span>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <?php echo $this->Form->control('password',['type'=>'password','class'=>'form-control mt-2','required'=>'false']); 
                        echo $this->Form->control('user_type',['type'=>'hidden','value'=>'user']);
                        echo $this->Form->control('status',['type'=>'hidden','value'=> 1]);?>
                        <span class="span_error" id="error_password"></span>
              </div>
              <div class="form-outline mb-4">
                <?php echo $this->Form->control('confirm_password',['type'=>'password','class'=>'form-control mt-2','required'=>'false']) ?>
                <span class="span_error" id="error_confirm_password"></span>
              </div>
                <!-- image set  -->
              <div class="form-outline mb-4">
                <?php  echo $this->Form->control('image_file',['type'=>'file','class'=>'form-control mt-2','accept'=>'image/*','required'=>'false']); ?>
                <span class="span_error" id="error_image_file"></span>
              </div>
             <!-- button  -->
              <?php echo $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-block mb-4','id'=>'btn-submit']) ?>
            
           <?php echo  $this->Form->end() ?>
           <label>Account Already Exists click login</label>
           <?php echo $this->Html->link(__('login'), ['controller'=>'Users','action' => 'login'], ['class' => 'button float-right']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<!-- jquery cdn  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?= $this->Html->script(['register']) ?>
<?= $this->fetch('script') ?>