<?php echo $this->Flash->render() ?>
<div class="col-lg-8 col-xl-6 mt-5">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Page</h3>

            <?php echo $this->Form->create() ?>

              <div class="form-outline mb-4">
                 <?php echo $this->Form->input('email',['type'=>'text','class'=>'form-control','required'=>false]); ?>
                        <label class="form-label">Username</label>
              </div>
              <div class="form-outline mb-4">
                 <?php echo $this->Form->input('password',['type'=>'password','class'=>'form-control','required'=>false]); ?>
                        <label class="form-label">password</label>
              </div>

              
              <?php echo $this->Form->submit(__('Login')); ?>

              <?php echo $this->Form->end() ?><label>If your Account not Exists</label>
              <?php echo $this->Html->link("Register", ['action' => 'userAdd']) ?>

          </div>
        </div>
      </div>

     