

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
       <li><a href="<?php echo site_url(array('Welcome','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo site_url(array('Stock','index')) ?>">Listes Stocks</a></li> 
        <li class="active"><a href="#">Modifier Article</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
	      	<div class="callout callout-info">
				<h4>
					Modifier L'article 
				</h4>
			</div>
		</div>

		<?php if ($_SESSION['success']=='ok') { ?>
			<div class="alert alert-success" style=" text-align: center;"><i class="ion ion-android-checkmark-circle"></i>
				<button type="button" class="close" data-dismiss="alert">x</button>	
				<h4><?php echo $_SESSION['message_save']; ?></h4>
			</div>
		<?php } ?>
		
	<div class="row">
      	<div class="panel panel-info">
      		<div class="validation-system">
      			<div class="validation-form">
		 	<!---->
		  	    
		        <form method="post" action="<?php echo site_url(array('Stock','updateArticle')); ?>">
		         	<div class="vali-form">
		         		
			            <div class="col-md-4 form-group1">
			              <label class="control-label">Code ou reférence</label>
			              <input value="<?php echo $infoModif['code'] ?>" required="" type="text" name="code">
			            </div>
			            <div class="col-md-4 form-group1 form-last">
			              <label class="control-label">Modèle</label>
			              <input value="<?php echo $infoModif['modele'] ?>" type="text" name="modele">
			            </div>
			            <div class="col-md-4 form-group1 form-last">
			              <label class="control-label">Couleur</label>
			              <input value="<?php echo $infoModif['couleur'] ?>" required="" type="text" name="couleur">
			            </div>
			            <div class="clearfix"> </div>
		            </div>
		           
		            <div class="vali-form">
			            <div class="row">
			            	<div class="col-md-3 col-sm-4 form-group2 group-mail">
				              <label class="control-label">Quantité</label>
				              <input class="form-control" value="<?php echo $infoModif['quantite'] ?>" min="0" name="quantite" required="" type="number">
				            </div>
				            <div class="col-md-3 col-sm-4 form-group2 group-mail">
				              <label class="control-label">Prix Min</label>
				              <input class="form-control" value="<?php echo $infoModif['prix_min'] ?>" min="0" required="" type="number" name="prix_min">
				            </div>
				            <div class="col-md-3 col-sm-4 form-group2 group-mail">
				              <label class="control-label">Prix Max</label>
				              <input class="form-control" value="<?php echo $infoModif['prix_max'] ?>" min="0" required="" type="number" name="prix_max">
				            </div>
				            
			            </div>
				        <div class="clearfix"> </div>
		            </div>

		            <h3>modifier pointures</h3>
		           
		            <div class="vali-form" id="point_femme">
		            	<div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 35</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept35'] ?>" class="form-control" min="0" name="qtept35" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 36</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept36'] ?>" class="form-control" min="0" name="qtept36" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 37</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept37'] ?>" class="form-control" min="0" name="qtept37" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 38</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept38'] ?>" class="form-control" min="0" name="qtept38" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 39</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept39'] ?>" class="form-control" min="0" name="qtept39" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 40</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept40'] ?>" class="form-control" min="0" name="qtept40" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 41</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept41'] ?>" class="form-control" min="0" name="qtept41" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 42</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept42'] ?>" class="form-control" min="0" name="qtept42" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 43</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept43'] ?>" class="form-control" min="0" name="qtept43" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Pointure 44</label>
			              <input value="<?php echo $point['donnee_pointure']['qtept44'] ?>" class="form-control" min="0" name="qtept44" type="number">
			            </div>
			            
			            <div class="clearfix"> </div>
		            </div>
					
					
		             <div class="clearfix"> </div>
					
					<div class="col-md-22 form-group">
						<input type="hidden" name="id" value="<?php echo $infoModif['id']; ?>">
						<input type="hidden" name="nom_table" value="<?php echo $nom_table; ?>">
		              	<button type="submit" class="btn btn-warning pull-right">Modifier</button>
		              	<button type="reset" class="btn btn-default">Annuler</button>
		            </div>
		          <div class="clearfix"> </div>
		        </form>
		    
		 	<!---->
		 </div>
      		</div>
      	</div>	
      </div>
    </section>	

</div>


				  