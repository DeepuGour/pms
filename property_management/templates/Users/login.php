
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
<div class="col-lg-8 col-xl-6 mt-5">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Page</h3>

            <?php echo $this->Form->create() ?>

              <div class="form-outline mb-4">
                 <?php echo $this->Form->input('email',['type'=>'text','class'=>'form-control','id'=>'email','required'=>false]); ?>
                        <label class="form-label">Username</label>
              </div>
              <span class="span_error" id="error_email"></span>
              <div class="form-outline mb-4">
                 <?php echo $this->Form->input('password',['type'=>'password','class'=>'form-control','id'=>'password','required'=>false]); ?>
                        <label class="form-label">password</label>
              </div>
              <span class="span_error" id="error_password"></span>

              
              <?php echo $this->Form->submit(__('Login'),['id'=>'btn-submit']); ?>

              <?php echo $this->Form->end() ?><label>If your Account not Exists</label>
              <?php echo $this->Html->link("Register", ['action' => 'userAdd']) ?>
              <?php echo $this->Flash->render() ?>
          </div>
        </div>
      </div>

     <!-- jquery cdn  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?= $this->Html->script(['LoginValid']) ?>
<?= $this->fetch('script') ?>