

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
			            	<div class="col-md-4 col-sm-4 form-group2 group-mail">
				              <label class="control-label">Quantité</label>
				              <input class="form-control" value="<?php echo $infoModif['quantite'] ?>" min="0" name="quantite" required="" type="number">
				            </div>
				            <div class="col-md-4 col-sm-4 form-group2 group-mail form-last">
				              <label class="control-label">Prix Min</label>
				              <input class="form-control" value="<?php echo $infoModif['prix_min'] ?>" min="0" required="" type="number" name="prix_min">
				            </div>
				            <div class="col-md-4 col-sm-4 form-group2 group-mail form-last">
				              <label class="control-label">Prix Max</label>
				              <input class="form-control" value="<?php echo $infoModif['prix_max'] ?>" min="0" required="" type="number" name="prix_max">
				            </div>
				           
				           	
			            </div>
				        <div class="clearfix"> </div>
		            </div>
					
					<h3> modifierles Tailles</h3>
		            <div class="vali-form">
		            	<div class="col-md-2 form-group1">
			              <label class="control-label">Taille 44</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT44']; ?>" class="form-control" min="0" name="qteT44" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 45</label>
			              <input value='<?php echo $tail['donnee_taille']['qteT45']; ?>' class="form-control" min="0" name="qteT45" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 46</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT46']; ?>" class="form-control" min="0" name="qteT46" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 47</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT47']; ?>" class="form-control" min="0" name="qteT47" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 48</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT48']; ?>" class="form-control" min="0" name="qteT48" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 49</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT49']; ?>" class="form-control" min="0" name="qteT49" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 50</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT50']; ?>" class="form-control" min="0" name="qteT50" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 51</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT51']; ?>" class="form-control" min="0" name="qteT51" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 52</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT52']; ?>" class="form-control" min="0" name="qteT52" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 53</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT53']; ?>" class="form-control" min="0" name="qteT53" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 54</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT54']; ?>" class="form-control" min="0" name="qteT54" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 55</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT55']; ?>" class="form-control" min="0" name="qteT55" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 56</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT56']; ?>" class="form-control" min="0" name="qteT56" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 57</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT57']; ?>" class="form-control" min="0" name="qteT57" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 58</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT58']; ?>" class="form-control" min="0" name="qteT58" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 59</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT59']; ?>" class="form-control" min="0" name="qteT59" type="number">
			            </div>
			            <div class="col-md-2 form-group1">
			              <label class="control-label">Taille 60</label>
			              <input value="<?php echo $tail['donnee_taille']['qteT60']; ?>" class="form-control" min="0" name="qteT60" type="number">
			            </div> 
			            <div class="clearfix"> </div>
			        </div>
					
					
		             <div class="clearfix"> </div>
					
					<div class="col-md-22 form-group">
						<input type="hidden" name="id" value="<?php echo $infoModif['id']; ?>">
						<input type="hidden" name="stock_id" value="<?php echo $infoModif['stock_id']; ?>">
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


				  