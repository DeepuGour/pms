<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <?php  $page = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1);
        echo $page;?>
      <ul class="navbar-nav">
        <li class="nav-item">
        <?php echo $this->Html->link('<i class="material-icons opacity-10">dashboard</i>'.__('Dashboard'), ['controller'=>'users','action' => 'dashBord'], ['escape'=>false,'class' => 'nav-link text-white active bg-gradient-primary']) ?>
        </li>
        <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa-regular fa-user"></i>'.__('Users Profiles'), ['controller'=>'users','action' => 'userProfiles'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
        </li>
        <li class="nav-item">
        <?php echo $this->Html->link('<i class="fa-regular fa-building"></i>'.__('Properties'), ['controller'=>'properties','action' => 'propertiesShow'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <?php echo $this->Html->link('<i class="material-icons opacity-10">person</i>'.__('Profile'), ['controller'=>'users','action' => 'adminProfile'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <?php echo $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'], ['class' => 'btn bg-gradient-primary mt-4 w-100']) ?>
      </div>
    </div>
  </aside>