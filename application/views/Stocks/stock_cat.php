
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Welcome','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Listes Categories</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
      	<div class="callout callout-info">
			<h4>
				Listes des Catégories 
				<button id="show_form" class="btn btn-primary pull pull-right"> <i class="glyphicon glyphicon-plus"></i> Nouvelle catégorie</button>
			</h4>
		</div>
	</div>

	<?php if ($_SESSION['success']=='ok') { ?>
		<div class="alert alert-success" style=" text-align: center;"><i class="ion ion-android-checkmark-circle"></i>
			<button type="button" class="close" data-dismiss="alert">x</button>	
			<p><?php echo $_SESSION['message_save']; ?></p>
		</div>
	<?php }elseif ($_SESSION['success']=='non') { ?>
		<div class="alert alert-warning" style=" text-align: center;"><i class="ion ion-android-checkmark-circle"></i>	
			<button type="button" class="close" data-dismiss="alert">x</button>	
			<p><?php echo $_SESSION['message']; ?></p>
		</div>
	<?php }else{

		}?>
	<div class="row"  >
		<?php for ($i=0; $i <$AllCatStock['total'] ; $i++) { ?>
			<div class="col-md-4">
				<div class="box box-widget widget-user">
					<div class="widget-user-header bg-aqua-active">
						<h3 class="widget-user-username"><?php echo $AllCatStock[$i]['libelle']; ?></h3>
						<h5 class="widget-user-desc"><?php echo $AllCatStock[$i]['description']; ?></h5>
					</div>
					<div class="widget-user-image">
						<img class="img-circle" src="<?php echo img_url('CatImage/'.$AllCatStock[$i]['image']) ?>">
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">3,200</h5>
									<span class="description-text">Total</span>
								</div>
							</div>
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">155</h5>
									<span class="description-text">Vendu</span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="description-block">
									<h5 class="description-header">15</h5>
									<span class="description-text">Nouveau
									 </span>
						         </div>
					        </div>
				     	</div>
				    </div>
		  		</div>
			</div>
		<?php } ?>
	</div>


	<div class="modal modal-info" id="new_cat">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h4 class="modal-title">Ajouter une catégorie</h4>
				</div>
				<form id="myshowForm" method="post" class="form-horizontal" action="<?php echo site_url(array('Cat_stock','creationTableCat_stock')) ?> " enctype="multipart/form-data">
					
					<div class="modal-body">
						<input type="hidden" name="id" value="0">
						<div class="form-group">
							<div class="col-md-3">
								<label for="libelle" class="label-control" >Nom catégorie</label>
							</div>
							<div class="col-md-9"><input class="form-control " type="text" name="libelle" placeholder="Entrez le nom de la Nouvelle catégorie" required=""></div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="description" class="label-control" >Description</label>
							</div>
							<div class="col-md-9"><textarea class="form-control has-error" type="text" name="description" placeholder="Entrez une description" required=""></textarea></div>
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
						<input type="submit" value="Ajouter" class="btn btn-success"></button>
					</div>
				</form>
			</div>
		</div>
	</div>

    </section>
    <!-- /.content -->
    
  </div>




