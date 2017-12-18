
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Welcome','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Listes Stocks</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
      	<div class="callout callout-info">
			<h4>
				Listes des Stocks 
			</h4>
		</div>
	</div>
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
									<h5 class="description-header"><?php echo $valTotal[$i]; ?></h5>
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
				     	<form  class="small-box bg-green" method="post" action="<?php echo site_url(array('Stock','AfficheStock')) ?>">
				  			<input type="hidden" name="id_cat" value="<?php echo $AllCatStock[$i]['id_cat']; ?>">
				  			<button type="submit"  class="btn btn-block small-box-footer">Gérer</button>
				  		</form>
				  		
				    </div>
		  		</div>
			</div>
		<?php } ?>
	</div>

    </section>
    <!-- /.content -->
    
  </div>




