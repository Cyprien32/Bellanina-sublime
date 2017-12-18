
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Welcome','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo site_url(array('Vente','index')) ?>">Listes Produits</a></li>
        <li class="active"><a href="#">Details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class=" col-md-9 col-sm-6 col-xs-12 callout callout-info">
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
    <div class="row alert_message"></div>
    <div class="row">
      <form class="form-group form_vente">
        <div class="col-md-12 col-sm-12 col-xs-12 validation-form">
          <div class="col-md-4 form-group2 group-mail" id="liste_client">
            <select name="id_client">
              <?php for ($i=0; $i<1; $i++) { ?>
                <option value="2" >Cyprien</option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-4">
            <button class="btn btn-block bg-olive btn-flat" id="news_client"><i class="ion ion-plus"></i><span>Nouveau Client</span></button>
          </div>
          <div class="col-md-4" style="text-align: center;">
            <span>M. DONTSA Cyprien</span>
          </div>
        </div>  
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="col-md-12 form-group1">
              <input value="<?php echo $info['code']; ?>" required="" type="text" name="code" disabled="">
            </div>
            <div class="col-md-12 form-group1">
              <input value="<?php echo $info['marque']; ?>" required="" type="text" name="marque" disabled="">
            </div>

            <div class="col-md-12 form-group2 group-mail">
              <?php if($verif=="point"){ ?>
                <select name="nom_qte">
                  <?php for ($i=0; $i <$point['donnee_pointure']['total']; $i++) { ?>
                    <option value="<?php echo $point['donnee_pointure'][$i]['nom']; ?>" ><?php echo $point['donnee_pointure'][$i]['nom']; ?></option>
                  <?php } ?>
                </select>
              <?php } ?>
              <?php if($verif=="tail"){ ?>
                <select name="nom_qte">
                  <?php for ($i=0; $i <$tail['donnee_taille']['total']; $i++) { ?>
                    <option value="<?php echo $tail['donnee_taille'][$i]['nom']; ?>" ><?php  echo $tail['donnee_taille'][$i]['nom']; ?></option>
                  <?php } ?>
                </select>
             <?php } ?>
             <?php if($verif==""){ ?>
               
             <?php } ?>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="col-md-12 form-group1 " style="margin-bottom:5px; ">
              <input class="form-control" min="1" placeholder="Quantite" required="" type="number" name="quantite">
            </div>
            <div class="col-md-12 form-group1 " style="margin-bottom:5px; ">
              <input class="form-control" min="1" placeholder="prix unitaire" required="" type="number" name="prix_u">
            </div>
            <div class="col-md-12 form-group1 prix_total " style="margin-bottom:5px; ">
              
            </div>
          </div>
         </div>
         <div class="row">
           <div class="col-md-4">
             <button class="btn btn-block bg-maroon btn-flat" style="font-size: 20px;"><i class="ion-android-cancel"></i> Annuler</button>
           </div>
           <div class="col-md-4">
             <button class="btn btn-block bg-olive btn-flat" style="font-size: 20px;"><i class="ion-plus"></i> Ajouter</button>
           </div>
           <div class="col-md-4">
             <button class="btn btn-block bg-blue btn-flat" id="save_vente" style="font-size: 20px;"><i class="ion-archive"></i> Enregistrer</button>
           </div>
         </div>
       </div>

        <div class="col-md-4 col-sm-8 col-xs-12 ">
          <img class="img" style="height: 250px; width: 350px;" src="<?php echo img_url('StockImage/'.$image) ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="stock_id" value="<?php echo $stock_id ?>">
      </form>
    </div>

    </section>
    <!-- /.content -->
    
  </div>




