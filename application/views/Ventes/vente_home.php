
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Welcome','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Listes Produits</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
      	<div class=" col-md-9  col-sm-6 col-xs-12 callout callout-info">
          <h4>
            Operation de ventes
          </h4>
        </div>
        <div class=" col-md-3 col-sm-6 col-xs-12">
			     <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-android-cart" style="font-size: 72px;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Panier</span>
                <span class="info-box-number">0 Fcfa</span>
                 <div class="" >Enregistrer <i class="fa fa-arrow-circle-right"></i></div>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
	  </div>
     
    <div id="detail_vente">
      
    </div>

    <div class="row">
      <div class="validation-form">
        <div class="vali-form">
          <div class="col-md-4 form-group2 group-mail" id="showlibelle">
    
          </div>
          <div class="col-md-4 form-group2 group-mail" id="showMarque">
            
          </div>
          <div class="col-md-4 form-group2 group-mail">
            <input class="form-control" placeholder="Search..." type="text">          
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      
    </div>
  <div class="row">
    <table class="table table-striped table-bordered table-hover two-axis" id="myDataTable">
      <thead>
        <tr>
          <th>Id</th>
          <th>Code</th>
          <th>Marque</th>
          <th>Modele</th>
          <th>Couleur</th>
          <th>Sexe</th>
          <th>Quantité</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot> 

      </tfoot>
      <tbody id="showTable" class="showTables">
        
      </tbody>
    </table>
  </div>
	

    </section>
    <!-- /.content -->
    
  </div>




