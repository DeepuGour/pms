<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    Material Dashboard 2 by Creative Tim
    </title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
     <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <?php echo $this->Html->css(['nucleo-icons','nucleo-svg','material-dashboard']) ?>
<?php echo $this->fetch('css') ?>
<style>
  .message.error.hidden {
    color: red;
}
.error-message,.error{
  color: red;
}
</style>
   
</head>
<body>
   
   
            
            <?= $this->fetch('content') ?>
  
  <?php echo $this->Html->script([
    'material-dashboard',
    'core/popper.min',
    'core/bootstrap.min',
    'plugins/perfect-scrollbar.min',
    'plugins/smooth-scrollbar.min'])
     ?>
  <?php echo $this->fetch('script') ?>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script> -->
   
</body>
</html>