
<button id="show_form" class="btn btn-primary pull pull-right"> <i class="glyphicon glyphicon-plus"></i> Nouvelle catégorie</button>
			
		<div class="modal" id="new_cat">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">x</button>
						<h4 class="modal-title">Ajouter une catégorie</h4>
					</div>

					<div class="modal-body">
						<form id="myshowForm" method="post" class="form-horizontal">
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

						</form>
					</div>

					<div class="modal-footer">
						<button class="btn btn-warning" data-dismiss="modal">annuler</button>
						<input type="submit" name="ajouter" class="btn btn-success" id="saveblog"></button>
					</div>
				</div>
			</div>
		</div>

		<div class="inner-block">
			<select class="row" id="showdata" class="form-control" >
					
			</select>
		</div>
	 </div>