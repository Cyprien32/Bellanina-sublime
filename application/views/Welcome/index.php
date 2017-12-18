<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bella | Nina</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <!-- Bootstrap 3.3.6 -->
  <?php echo admin_bt_css("css/bootstrap.min"); ?>
  <!-- Theme style -->
  <?php echo admin_dist_css("css/AdminLTE.min"); ?>
  <?php echo admin_dist_css("css/skins/_all-skins.min"); ?>
  <!-- iCheck -->
  <?php echo admin_plugins_css("iCheck/flat/blue"); ?>
  <!-- Morris chart -->
  <?php echo admin_plugins_css("morris/morris"); ?>
  <!-- jvectormap -->
  <?php echo admin_plugins_css("jvectormap/jquery-jvectormap-1.2.2"); ?>
  <!-- Date Picker -->
  <?php echo admin_plugins_css("datepicker/datepicker3"); ?>
  <!-- Daterange picker -->
  <?php echo admin_plugins_css("daterangepicker/daterangepicker"); ?>
  <!-- bootstrap wysihtml5 - text editor -->
  <?php echo admin_plugins_css("bootstrap-wysihtml5/bootstrap3-wysihtml5.min"); ?>
  
  <?php 
    echo css('app/admin_style'); 
    echo css('font-awesome');
    echo css('ionicons.min'); 
    echo css('bootstrap.min');
    echo css('icon-font.min');
    echo css('bella_style');
    echo css('table-style');
    echo css('dataTables.bootstrap.min');
    echo css('jquery.dataTables.min');
  ?>
  
  
   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BELLA</b>NINA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Zapper Navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if (isset($_SESSION['ADMIN'])) {?>
                <img src="<?php echo img_url('images_admin/images/'.$_SESSION['ADMIN']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              <?php if (isset($_SESSION['CAISSIER'])) {?>
                <img src="<?php echo img_url('images_caissier/images/'.$_SESSION['CAISSIER']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              <?php if (isset($_SESSION['ADMIN'])) {?>
                <span class="hidden-xs"><?php echo $_SESSION['ADMIN']['info_personne']['nom'].' '.$_SESSION['ADMIN']['info_personne']['prenom'] ?></span>
              <?php } ?>

               <?php if (isset($_SESSION['CAISSIER'])) {?>
                <span class="hidden-xs"><?php echo $_SESSION['CAISSIER']['info_personne']['nom'].' '.$_SESSION['CAISSIER']['info_personne']['prenom'] ?></span>
              <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <?php if (isset($_SESSION['ADMIN'])) {?>
                <img src="<?php echo img_url('images_admin/images/'.$_SESSION['ADMIN']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              <?php if (isset($_SESSION['CAISSIER'])) {?>
                <img src="<?php echo img_url('images_caissier/images/'.$_SESSION['CAISSIER']['info_personne']['image']) ?>" class="user-image" alt="User Image">
              <?php } ?>

              
              <?php if (isset($_SESSION['ADMIN'])) {?>                  
                  <p>
                    <?php echo $_SESSION['ADMIN']['info_personne']['nom'].' '.$_SESSION['ADMIN']['info_personne']['prenom'] ?>
                    <small><?php  echo $_SESSION['ADMIN']['info_personne']['telephone']['liste'][0].' '.$_SESSION['ADMIN']['info_personne']['telephone']['liste'][1] ?></small>
                  </p>
              <?php } ?>


              <?php if (isset($_SESSION['CAISSIER'])) {?>                  
                  <p>
                    <?php echo $_SESSION['CAISSIER']['info_personne']['nom'].' '.$_SESSION['CAISSIER']['info_personne']['prenom'] ?>
                    <small><?php  echo $_SESSION['CAISSIER']['info_personne']['telephone']['liste'][0].' '.$_SESSION['CAISSIER']['info_personne']['telephone']['liste'][1] ?></small>
                  </p>
              <?php } ?>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if (isset($_SESSION['ADMIN'])) {?>
                    <a href="<?php echo site_url(array('Administration','index')) ?>" class="btn btn-default btn-flat">Profile</a>
                  <?php } ?>

                  <?php if (isset($_SESSION['CAISSIER'])) {?>
                    <a href="<?php echo site_url(array('Caissier','index')) ?>" class="btn btn-default btn-flat">Profile</a>
                  <?php } ?>
                </div>
                <div class="pull-right">
                   <?php if (isset($_SESSION['ADMIN'])) {?>
                       <a href="<?php echo site_url(array('Administration','deconnexion')) ?>" class="btn btn-default btn-flat">Deconnexion</a>
                   <?php } ?>

                    <?php if (isset($_SESSION['CAISSIER'])) {?>
                       <a href="<?php echo site_url(array('Caissier','deconnexion')) ?>" class="btn btn-default btn-flat">Deconnexion</a>
                   <?php } ?>
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>



