<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">My Home</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><?php echo $this->Html->link(__('Home'), ['action' => 'home'], ['class' => 'nav-link'])?></li>
	          <li class="nav-item"><?php echo $this->Html->link(__('Register'), ['action' => 'userAdd'], ['class' => 'nav-link'])?></li>
			  <li class="nav-item"><?php echo $this->Html->link(__('login'), ['action' => 'login'], ['class' => 'nav-link'])?></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center">
          <div class="col-lg-7 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text">
	            <h1 class="mb-4">Find Perfect <br>House From Your Area.</h1>
	            <p style="font-size: 18px;">From as low as $20 A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
	            <p>
					
					<?php echo $this->Html->link(__('View all properties'), ['action' => 'homeProperties'], ['class' => 'btn btn-primary py-3 px-4'])?>
				</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt search-bg">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate p-4">
						<h1>Home</h1>
						<h1>Flate</h1>
						<h1>Area</h1>
		        </div>
					</div>
	    	</div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-primary">
      <div class="container">
        <div class="row d-flex no-gutters">
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services services-bg d-block text-center px-4 py-5">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
              <div class="media-body py-md-4">
                <h3>Trusted by Thousands</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services services-bg services-darken d-block text-center px-4 py-5">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-home"></span></div>
              <div class="media-body py-md-4">
                <h3>Wide Range of Properties</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services services-bg services-lighten d-block text-center px-4 py-5">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-stats"></span></div>
              <div class="media-body py-md-4">
                <h3>Financing Made Easy</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-items-stretch ftco-animate">
            <div class="media block-6 services services-bg d-block text-center px-4 py-5">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-quarantine"></span></div>
              <div class="media-body py-md-4">
                <h3>Locked in Pricing</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

   
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


 