	

	var CONFIG = {
		'server' : 'http://192.168.174.1/bella_nina/',
		'author' : 'Cyprien Dontsa'
	};




	function AddMarque (){		
		consultArticle();
		$('#show_form_marque').click(function(){
			$('#new_stock').modal('show');
		});

		$('#savemarque').click(function(){
			console.log('je suis dans le fonction 3');
			var data=$('#myFormMarque').serialize();
			// validation du formuaire
			
			$.ajax({
				type:'ajax',
				method:'post',
				url:CONFIG.server+'Stock/addStock',
				data:data,
				async:false,
				dataType:'json',
				success: function(data){
				
					alert('could not add data from database');
				},
				error:function(){
					console.log('je suis dans le fonction 4');
					$('#new_stock').modal('hide');
					$('#myFormMarque')[0].reset();
					$('.alert-success').html('Catégorie Ajouté avec success!!!!').fadeIn().delay(2000).fadeOut('slow');
					consultArticle();
				}
			});	

		});

	}

		// fonction show all Categorie

		function showAllArticle(){
			$.ajax({
				type:'ajax',
				url:CONFIG.server+'Cat_stock/showAllCat_Stock',
				async:true,
				dataType:'json',
				success:function(data){
					var showarticle='';
					console.log('je suis dans le fonction 5');
					for (var i = 0; i < data.length; i++) {
						showarticle+='<div class="col-md-4">'+
										'<div class="box box-widget widget-user">'+
										
											'<div class="widget-user-header bg-aqua-active">'+
								              '<h3 class="widget-user-username">'+data[i].libelle+'</h3>'+
								              '<h5 class="widget-user-desc">'+data[i].description+'</h5>'+
								            '</div>'+
								            '<div class="widget-user-image">'+
								              '<img class="img-circle" src="../../assets/images/Admin/cy.jpg">'+
								            '</div>'+
								            '<div class="box-footer">'+
								              '<div class="row">'+
								                '<div class="col-sm-4 border-right">'+
								                  '<div class="description-block">'+
								                    '<h5 class="description-header">3,200</h5>'+
								                    '<span class="description-text">Total</span>'+
								                  '</div>'+
								                 '</div>'+
								                '<div class="col-sm-4 border-right">'+
								                  '<div class="description-block">'+
								                    '<h5 class="description-header">155</h5>'+
								                    '<span class="description-text">Vendu</span>'+
								                  '</div>'+
								                '</div>'+
								                '<div class="col-sm-4">'+
								                  '<div class="description-block">'+
								                    '<h5 class="description-header">15</h5>'+
								                    '<span class="description-text">Nouveau'+
								                    '</span>'+
								                  '</div>'+
								                '</div>'+
								              '</div>'+
								            '</div>'+
							          	'</div>'+
									'</div>';
					}
					console.log('tout est ok');
					$('#article').html(showarticle);
				},
				error:function(data){
					alert('error data not found');
				}
			});	
		}

	// fonction consult detail article

	function consultArticle(){
		console.log('je suis passe consult');
		$.ajax({
				type:'ajax',
				url:CONFIG.server+'Stock/detail_stock',
				async:true,
				dataType:'json',
				success:function(data){
					var showpage='';
					for (var i = 0; i < data.length; i++) {
						showpage+='<option>'+data[i].libelle+'</option>';
					}
					console.log('tout est ok');
					$('#showMarque').html(showpage);
				},
				error:function(data){
				}
			});
		
	}

				
		
	// fonction show all Categorie

		function showAllCatStock(){
			$.ajax({
				type:'ajax',
				url:CONFIG.server+'Cat_stock/showAllCat_Stock',
				async:true,
				dataType:'json',
				success:function(data){
					var showpage='';
					for (var i = 0; i < data.length; i++) {
						showpage+='<option>'+data[i].libelle+'</option>';
					}
					console.log('tout est ok');
					$('#showMarque').html(showpage);
				},
				error:function(data){
					alert('error data not found');
				}
			});	
		}





	// Fonction de gestion de choix des pointures

	// div des pointurs pour homme

	function showDivPointureHomme(){
		var pointure_homme='';
		pointure_homme+='<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 35</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept35" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 36</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept36" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 37</label>'+
			             ' <input class="form-control" placeholder="Qte"  min="0" name="qtept37" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 38</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept38" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 39</label>'+
			              '<input class="form-control" placeholder="Qte" min="0"  name="qtept39" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 40</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept40" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 41</label>'+
			             ' <input class="form-control" placeholder="Qte"  min="0" name="qtept41" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 42</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept42" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 43</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept43" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 44</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept44" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 45</label>'+
			             ' <input class="form-control" placeholder="Qte"  min="0" name="qtept45" type="number">'+
			            '</div> '+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 46</label>'+
			              '<input class="form-control" placeholder="Qte"  min="0" name="qtept46" type="number">'+
			           ' </div>'+
			            
			            '<div class="clearfix"> </div>';

			            $('#point_homme').html(pointure_homme);
	}


	// div des pointures des femmes

	function showDivPointureFemme(){
		var pointure_femme='';
		pointure_femme+='<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 35</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept35" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			             ' <label class="control-label">Pointure 36</label>'+
			            '  <input placeholder="Qte" class="form-control" min="0" name="qtept36" type="number">'+
			           ' </div>'+
			           ' <div class="col-md-2 form-group1">'+
			             ' <label class="control-label">Pointure 37</label>'+
			            '  <input placeholder="Qte" class="form-control" min="0" name="qtept37" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			             ' <label class="control-label">Pointure 38</label>'+
			          '    <input placeholder="Qte" class="form-control" min="0" name="qtept38" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			           '   <label class="control-label">Pointure 39</label>'+
			          '    <input placeholder="Qte" class="form-control" min="0"  name="qtept39" type="number">'+
			          '  </div>'+
			           ' <div class="col-md-2 form-group1">'+
			               '<label class="control-label">Pointure 40</label>'+
			          '    <input placeholder="Qte" class="form-control" min="0" name="qtept40" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			            	'<label class="control-label">Pointure 41</label>'+
			          '    <input placeholder="Qte" class="form-control" min="0" name="qtept41" type="number">'+
			           ' </div>'+
			           ' <div class="col-md-2 form-group1">'+
			           '     <label class="control-label">Pointure 42</label>'+
			         '     <input placeholder="Qte" class="form-control" min="0" name="qtept42" type="number">'+
			          '  </div>'+
			           ' <div class="col-md-2 form-group1">'+
			         		'<label class="control-label">Pointure 43</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept43" type="number">'+
			           ' </div>'+
			            '<div class="col-md-2 form-group1">'+
			               ' <label class="control-label">Pointure 44</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept44" type="number">'+
			            '</div>'+
			            
			           ' <div class="clearfix"> </div>';

			            $('#point_femme').html(pointure_femme);

	}



	// div des pointures pour enfant
	function showDivPointureEnfant(){
		var pointure_enfant='';
		pointure_enfant+='<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 18</label>'+
			              '<input placeholder="Qte"  class="form-control" min="0" name="qtept18" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 19</label>'+
			              '<input placeholder="Qte"  class="form-control" min="0" name="qtept19" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 20</label>'+
			              '<input placeholder="Qte"  class="form-control" min="0" name="qtept20" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 21</label>'+
			              '<input placeholder="Qte"  class="form-control" min="0" name="qtept21" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 22</label>'+
			              '<input placeholder="Qte" class="form-control" min="0"  name="qtept22" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 23</label>'+
			              '<input placeholder="Qte"  class="form-control" min="0" name="qtept23" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 24</label>'+
			              '<input placeholder="Qte"  class="form-control" min="0" name="qtept24" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 25</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept25" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 26</label>'+
			              '<input placeholder="Qte"class="form-control"  min="0" name="qtept26" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 27</label>'+
			              '<input placeholder="Qte"class="form-control"  min="0" name="qtept27" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 28</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept28" type="number">'+
			            '</div> '+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 29</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept29" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 30</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept30" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 31</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept31" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 32</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept32" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 33</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept33" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group">'+
			              '<label class="control-label">Pointure 34</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept34" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 35</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept35" type="number">'+
			            '</div>'+
			            '<div class="col-md-2 form-group1">'+
			              '<label class="control-label">Pointure 36</label>'+
			              '<input placeholder="Qte" class="form-control" min="0" name="qtept36" type="number">'+
			           ' </div>'+
			            '<div class="clearfix"> </div>'+
		            '</div>';

		            $('#point_enfant').html(pointure_enfant);
	}


	function gesChoixGenre(){
		
		// pointure pour hommes point =pointure
		showDivPointureHomme();
		$('#homme').click(function(){
			showDivPointureHomme();
			$('#point_enfant').remove();
			$('#point_femme').remove();
			
		});

		$('#femme').click(function(){
			showDivPointureFemme();
			$('#point_enfant').remove();
			$('#point_homme').remove();
			
		});

		$('#enfant').click(function(){
			showDivPointureEnfant();
			$('#point_homme').remove();
			$('#point_femme').remove();
			
		});

	}

$(document).ready(function(){
	$('#show_form').click(function(){
		$('#new_cat').modal('show');
	});

	$('#show_form_marque').click(function(){
		$('#new_stock').modal('show');
	});

	
	// edition et suppression des stocks

	$('#edit').click(function(){
		$('#edit_modal').modal('show');
	});

	$('#delete').click(function(){
		$('#delete_modal').modal('show');
	});

	$('#form_add_article').hide();
	$('#form_add').click(function(){
		$('#form_add_article').show();
	})

	gesChoixGenre();
	// AddMarque();
	// consultArticle();

});