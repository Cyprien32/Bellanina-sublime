

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
        <li class="active"><a href="#"><?php echo $title; ?></a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
	      	<div class="callout callout-info">
				<h4>
					Gérer Les <?php echo $title; ?> 
					<button id="show_form_marque" class="btn btn-primary pull pull-right"> <i class="glyphicon glyphicon-plus"></i> Ajouter marque</button>
					<button id="form_add" class="btn btn-success pull pull-right"> <i class="glyphicon glyphicon-plus"></i> Ajouter <?php echo $title; ?> </button>
				</h4>
			</div>
		</div>
		<?php if ($_SESSION['success']=='ok') { ?>
			<div class="alert alert-success" style=" text-align: center;"><i class="ion ion-android-checkmark-circle"></i>
				<button type="button" class="close" data-dismiss="alert">x</button>	
				<h4><?php echo $_SESSION['message_save']; ?></h4>
			</div>
		<?php }elseif ($_SESSION['success']=='non') { ?>
			<div class="alert alert-Danger" style=" text-align: center;"><i class="ion ion-android-checkmark-circle"></i>	
				<button type="button" class="close" data-dismiss="alert">x</button>	
				<h4><?php echo $_SESSION['message']; ?></h4>
			</div>
		<?php }elseif($_SESSION['success']=='exist'){ ?>
			<div class="alert alert-warning" style=" text-align: center;"><i class="ion ion-android-checkmark-circle"></i>	
				<button type="button" class="close" data-dismiss="alert">x</button>	
				<h4><?php echo $_SESSION['message_save']; ?></h4>
			</div>
		<?php }else{ }?>

      <div class="row">
      	<div class="panel panel-info" id="form_add_article">
      		<button type="button" class="close" data-dismiss="panel">x</button>
      		<div class="validation-system">
      			<div class="validation-form">
		 	<!---->
		  	    
		        <form method="post" action="<?php echo site_url(array('Stock','postArticle')); ?>">
		         	<div class="vali-form">
		         		<div class="col-md-3 form-group2 group-mail">
				            <label class="control-label">Marque</label>
				            <select name="id_stock">
				            	<?php for ($i=0; $i <$StockName['total'] ; $i++) { ?>
				            		<option value="<?php echo $StockName[$i]['id_stock']; ?>" ><?php echo $StockName[$i]['nom_article']; ?></option>
				    			<?php } ?>
				            </select>
				        </div>
			            <div class="col-md-3 form-group1">
			              <label class="control-label">Code ou reférence</label>
			              <input placeholder="Code ou reférence" required="" type="text" name="code">
			            </div>
			            <div class="col-md-3 form-group1 form-last">
			              <label class="control-label">Modèle</label>
			              <input placeholder="Modèle" type="text" name="modele">
			            </div>
			            <div class="col-md-3 form-group1 form-last">
			              <label class="control-label">Couleur</label>
			              <input placeholder="EX: noir foncé" required="" type="text" name="couleur">
			            </div>
			            <div class="clearfix"> </div>
		            </div>
		           
		            <div class="vali-form">
			            <div class="row">
			            	<!-- <div class="col-md-3 col-sm-3 form-group2 group-mail">
				              <label class="control-label">Quantité</label>
				              <input class="form-control" placeholder="Quantité" min="0" name="quantite" required="" type="number">
				            </div> -->
				            <div class="col-md-2"></div>
				            <div class="col-md-3 col-sm-3 form-group2 group-mail">
				              <label class="control-label">Prix Min</label>
				              <input class="form-control" placeholder="Ex: 30000" min="0" required="" type="number" name="prix_min">
				            </div>
				            <div class="col-md-3 col-sm-3 form-group1 form-last">
				              <label class="control-label">Prix Max</label>
				              <input class="form-control" placeholder="Ex: 100000" min="0" required="" type="number" name="prix_max">
				            </div>
				            <div class="col-md-3 col-sm-3 form-group2 group-mail">
				              <label class="control-label">Genre</label>
				               <select name="type" >
				            		<option value="homme" id="homme" >Hommes</option>
				            		<option value="femme" id="femme" >Femmes</option>
				            		<option value="enfant" id="enfant" >Enfants</option>
				    			</select>
				            </div>
				           	
			            </div>
				        <div class="clearfix"> </div>
		            </div>

		            <h3>Choix des Tailles</h3>
		            <div class="vali-form">
		            	<div class="col-md-2 form-group1">
			              <label class="control-label">Taille S</label>
			              <input  class="form-control" min="0" name="S" type="number" required="">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille M</label>
			              <input class="form-control" min="0" name="M" type="number" required="">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille L</label>
			              <input value="00" class="form-control" min="0" name="L" type="number" required="">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille XL</label>
			              <input value="00" class="form-control" min="0" name="XL" type="number" required="">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille XXL</label>
			              <input value="00" class="form-control" min="0" name="XXL" type="number" required="">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 3XL</label>
			              <input value="00" class="form-control" min="0" name="3XL" type="number" required="">
			            </div>
			            <div class="clearfix"> </div>
			        </div>
		             
					
					<div class="col-md-22 form-group">
						<input type="hidden" name="nom_table" value="<?php echo $title; ?>">
		              	<button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
		              	<button type="reset" class="btn btn-default">Annuler</button>
		            </div>
		          <div class="clearfix"> </div>
		        </form>
		    
		 	<!---->
		 </div>
      		</div>
      	</div>

      	<table id="table-two-axis" class="two-axis">
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
			<tbody>
			 	<?php for ($i=0; $i <$alldonneeArticle['total'] ; $i++) { ?>
			 		<tr>
						<td data-th="Id"><span class="bt-content"><?php echo $i+1; ?></span></td>
						<td data-th="Code"><span class="bt-content"><?php echo $alldonneeArticle[$i]['code'] ?></span></td>
						<td data-th="Marque"><span class="bt-content"><?php echo $alldonneeArticle[$i]['marque'] ?></span></td>
						<td data-th="Modele"><span class="bt-content"><?php echo $alldonneeArticle[$i]['modele'] ?></span></td>
						<td data-th="Couleur"><span class="bt-content"><?php echo $alldonneeArticle[$i]['couleur'] ?></span></td>
						<td data-th="Sexe"><span class="bt-content"><?php echo $alldonneeArticle[$i]['type'] ?></span></td>
						<td data-th="Quantité"><span class="bt-content"><?php echo $alldonneeArticle[$i]['quantite'] ?></span></td>
						<td data-th="Action">
							<span class="bt-content">
								<div class="row">
									<form method="post" action="<?php echo site_url(array('Stock','showUpdateArticle')); ?>">
										<div class="col-md-3">
											<input type="hidden" name="stock_id" value="<?php echo $alldonneeArticle[$i]['stock_id'] ?>">
											<input type="hidden" name="id" value="<?php echo $alldonneeArticle[$i]['id'] ?>">
											<input type="hidden" name="type" value="<?php echo $alldonneeArticle[$i]['type']; ?>">
											<input type="hidden" name="nom_table" value="<?php echo $title; ?>">
											<button class="btn btn-info" id="edit"><i class="ion-edit" id="edit">editer</i></button>
										</div>
									</form>
									<div class="col-md-2"></div>
									<form method="post" action="<?php echo site_url(array('Stock','deleteArticle')); ?>">
										
										<div class="col-md-3">
											<input type="hidden" name="stock_id" value="<?php echo $alldonneeArticle[$i]['stock_id'] ?>">
											<input type="hidden" name="id" value="<?php echo $alldonneeArticle[$i]['id'] ?>">
											<input type="hidden" name="nom_table" value="<?php echo $title; ?>">
		              			            <button class="btn btn-danger" id="delete"><i class="ion-android-delete" id="delete">delete</i></button>
										</div>
									</form>
									
								</div>
							</span>
						</td>
					 </tr>
			 	<?php } ?>
			</tbody>
      	</table>	
      </div>
    </section>	

</div>





<div class="modal modal-info" id="new_stock">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h4 class="modal-title">Ajouter une marque</h4>
			</div>
			<form  method="post" action="<?php echo site_url(array('Stock','addMarque')); ?>" class="form-horizontal" enctype="multipart/form-data">
				
				<div class="modal-body">
					<input type="hidden" name="cat_stock_id" value="<?php echo $id_cat; ?>">
					<div class="form-group">
						<div class="col-md-3">
							<label for="nom_article" class="label-control" >Nom marque</label>
						</div>
						<div class="col-md-9"><input class="form-control " type="text" name="nom_article" placeholder="Entrez le nom de la marque" required=""></div>
					</div>
					<div class="form-group">
						<div class="col-md-3">
							<label for="image" class="label-control" >Image</label>
						</div>
						<div class="col-md-9"><input type="file" name="image" class="form-control " required></div>
					</div>
				</div>

				<div class="modal-footer">
					<button class="btn btn-warning pull pull-left" data-dismiss="modal">Annuler</button>
					<input type="submit" value="Ajouter" class="btn btn-success" id="savemarque" ></button>
				</div>
			</form>
		</div>
	</div>
</div>

				  