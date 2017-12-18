



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left   ">
          <img src="<?php echo img_url('Admin/cy.jpg') ?>" class="taille_image41 img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Cyprien</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo site_url(array('Welcome','index')); ?>"><i class="fa fa-circle-o text-red"></i> <span> Home</span></a></li>
        <li class="treeview">
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
         <li class="treeview">
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
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
