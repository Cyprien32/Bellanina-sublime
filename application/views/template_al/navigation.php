  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <?php if (isset($_SESSION['ADMIN'])) {?>
               <img src="<?php echo img_url('images_admin/images/'.$_SESSION['ADMIN']['info_personne']['image'])?>" class="img-circle" alt="User Image">
            <?php } ?>

             <?php if (isset($_SESSION['CAISSIER'])) {?>
               <img src="<?php echo img_url('images_caissier/images/'.$_SESSION['CAISSIER']['info_personne']['image'])?>" class="img-circle" alt="User Image">
            <?php } ?>
        </div>
        <div class="pull-left info">
          <?php if (isset($_SESSION['ADMIN'])) {?>
            <span class="hidden-xs"><?php echo $_SESSION['ADMIN']['info_personne']['nom'].' '.$_SESSION['ADMIN']['info_personne']['prenom'] ?></span>
          <?php } ?>

          <?php if (isset($_SESSION['CAISSIER'])) {?>
            <span class="hidden-xs"><?php echo $_SESSION['CAISSIER']['info_personne']['nom'].' '.$_SESSION['CAISSIER']['info_personne']['prenom'] ?></span>
          <?php } ?>


          <br><br>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo site_url(array('Welcome','index')); ?>"><i class="fa fa-circle-o text-red"></i> <span> Home</span></a></li>
        
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa  fa-users"></i> <span>Gestion Utilisateurs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (isset($_SESSION['ADMIN'])) {?>
              <li><a href="<?php echo site_url(array('Administration','loadAdmins')) ?>"><i class="fa fa-circle-o"></i>Gestion Admins</a></li>
              <li><a href="<?php echo site_url(array('Administration','loadCaissiers')) ?>"><i class="fa fa-circle-o"></i> Gestion Caissiers</a></li>
            <?php } ?>
            <li><a href="<?php echo site_url(array('Administration','loadClients')) ?>"><i class="fa fa-circle-o"></i> Gestion Clients</a></li>
          </ul>
        </li>
        <li class="treeview active  menu-open">
          <a href="#">
            <i class="ion-filing"></i>
            <span>Gestion des Stocks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(array('Cat_stock','showAllCat_Stock')); ?>"><i class="ion-android-add-circle"></i> Ajouter une catégorie</a></li>
            <li><a href="<?php echo site_url(array('Stock','index')); ?>"><i class="ion-eye"></i> Consulter les Stocks</a></li>
          </ul>
        </li>
        <li class="treeview active  menu-open">
          <a href="#">
            <i class="ion-cash"></i>
            <span>Gestion des Ventes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(array('Vente','index')); ?>"><i class="ion-android-cart"></i> Opération de ventes</a></li>
            <li><a href="<?php echo site_url(array('','')); ?>"><i class="fa fa-circle-o"></i> Liste des Articles</a></li>
           </ul>
        </li>
        
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Gestion des Commandes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(array('Administration','newCommande')) ?>"><i class="fa fa-circle-o"></i> Nouvelle Commande</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Liste des Commandes</a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Gestion promotions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(array('Promotion','nouvelle')) ?>"><i class="fa fa-circle-o"></i> Nouvelle Promotion</a></li>
            <li><a href="<?php echo site_url(array('Promotion','liste_promotion')) ?>"><i class="fa fa-circle-o"></i> Liste  promotions</a></li>
          </ul>
        </li>
        <li class="treeview active menu-open">
          <a href="mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url(array('Message','nouveau')) ?>"> <i class="fa fa-circle-o"></i> Nouveau
                 
              </a>
            </li>
            <li><a href="<?php echo site_url(array('Message','index')) ?>"> <i class="fa fa-circle-o"></i> Gestion messages
                 
              </a></li>
 
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
