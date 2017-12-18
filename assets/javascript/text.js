	

	var CONFIG = {
		'server' : 'http://localhost/bella_nina/',
		'author' : 'Cyprien Dontsa'
	};


	// affichage des donnees par defaut

	function showDefaultData(){
		$.ajax({
			type:'ajax',
			url:CONFIG.server+'Vente/showDefault',
			async:true,
			dataType:'json',
			success:function(data){
				var showDefault='';
				for(var i=0; i<data.total; i++){
					showDefault+='<tr>'+
								'<td data-th="Id"><span class="bt-content">'+i+'</span></td>'+
								'<td data-th="Code"><span class="bt-content">'+data[i].code+'</span></td>'+
								'<td data-th="Marque"><span class="bt-content">'+data[i].marque+'</span></td>'+
								'<td data-th="Modele"><span class="bt-content">'+data[i].modele+'</span></td>'+
								'<td data-th="Couleur"><span class="bt-content">'+data[i].couleur+'</span></td>'+
								'<td data-th="Sexe"><span class="bt-content">'+data[i].type+'</span></td>'+
								'<td data-th="Quantité"><span class="bt-content">'+data[i].quantite+'</span></td>'+
								// '<td><a class="btn btn-info choix_produit" data1="'+data[i].stock_id+'" data="'+data[i].id+'" >Choisir</a></td>'+
								'<td>'+
									'<form class="choix_produit" method="post" action="">'+
										'<a class="btn btn-info choix_detail">'+
											'<input type="hidden" name="stock_id" value="'+data[i].stock_id+'">'+
											'<input type="hidden" name="id" value="'+data[i].id+'">'+
											'Choisir'+
										'</a>'+
									'</form>'+
								'</td>'+
								
							'</tr>';
				}
				$('.showTables').html(showDefault);
			},
			error:function(){
				alert('je ne suis pas ok');
			}
		});

	}


	// Gestions des ventes 

	// formulaire de ventes

	function VenteForm(){
		console.log('je suis a lexterieur');
		$('.showTables').on('click','.choix_detail',function(){
			$('.choix_produit').attr('action',CONFIG.server+'Vente/loadDataVenteByID');
			$('.choix_produit').attr('method', 'post');
			$(this).parent().submit();
		});
	}

	//traitement des donnees de ventes


			// console.log(quantite);
			// console.log(prix_u);
			// console.log(valdataP);
			// console.log(valdataP-quantite);
			// var message_test="";
			// if(quantite<=valdataP){
			// 	if(valdataP==0){
			// 		message_test="Desole il n\'y a plus de chaussure pour cette pointure";
			// 	}else{
			// 		var prix_total=quantite*prix_u;
			// 		var quantiterestante=valdataP-quantite;
			// 		message_test="Les donnees sont Ok!!!";
			// 	}
			// }else{
			// 	message_test="Desole la Quantité entree est superieur au stock qui est de "+valdataP;
			// }

			// $('.alert_message').html(message_test).fadeIn().delay(2000).fadeOut('slow');
			// $('.prix_total').html(prix_total);
			// console.log(prix_total);
			// console.log(message_test);

	function VerifQuantite(){
		
		$('.form_vente').on('click','#dataP',function(){
			
		});
			
		$('.form_vente').on('click','#save_vente',function(){
			$('.form_vente').attr('action',CONFIG.server+'Vente/saveVente');
			$('.form_vente').attr('method', 'post');
			$(this).parent().submit();
		});

		
	} 



	// filtre de recherche sur les categories

	function showCatArticle(){
		$.ajax({
			type:'ajax',
			url:CONFIG.server+'Vente/findCategorie',
			async:true,
			dataType:'json',
			success:function(data){
				var showpage='';
				showpage+='<select>';
				showpage+='<option>Choisir Un article</option>';
				for (var i=0; i <data.total; i++) {
					showpage+='<option class="item_article" data="'+data[i].libelle+'" value="'+data[i].id_cat+'">'+data[i].libelle+'</option>';
				}
				showpage+='</select>';
				var showform='inserer les element du tableau';
				$('#showlibelle').html(showpage);
				$('#showform').html(showform);
			},
			error:function(data){
			}
		});
	}


	// filtre sur une categorie

	function filterCategorie(){
		$('#showlibelle').on('click','.item_article',function(){
			var id_cat=$(this).attr('value');
			var libelle=$(this).attr('data');
			$.ajax({
				type:'ajax',
				method:'post',
				url:CONFIG.server+'Vente/filterTable',
				data:{id_cat:id_cat},
				async:false,
				dataType:'json',
				success:function(data){
					var showpage='';
					showpage+='<select>';
					showpage+='<option>Choisir la marque</option>';
					for (var i=0; i <data.total; i++) {
						showpage+='<option class="detail_article" value1="'+data[i].id_stock+'">'+data[i].nom_article+'</option>';
					}
					showpage+='</select>';
					$('#showMarque').html(showpage);

					$('#showMarque').on('click','.detail_article',function(){
						var stock_id=$(this).attr('value1');
						
						$.ajax({
							type:'ajax',
							method:'post',
							url:CONFIG.server+'Vente/filterchoixTable',
							data:{
								stock_id:stock_id,
								libelle:libelle,
								id:696
							},
							async:false,
							dataType:'json',
							success:function(data){
								var showdata='';
								for(var i=0; i<data.total; i++){
									showdata+='<tr>'+
												'<td data-th="Id"><span class="bt-content">'+i+'</span></td>'+
												'<td data-th="Code"><span class="bt-content">'+data[i].code+'</span></td>'+
												'<td data-th="Marque"><span class="bt-content">'+data[i].marque+'</span></td>'+
												'<td data-th="Modele"><span class="bt-content">'+data[i].modele+'</span></td>'+
												'<td data-th="Couleur"><span class="bt-content">'+data[i].couleur+'</span></td>'+
												'<td data-th="Sexe"><span class="bt-content">'+data[i].type+'</span></td>'+
												'<td data-th="Quantité"><span class="bt-content">'+data[i].quantite+'</span></td>'+
												'<td>'+
													'<form class="choix_produit" method="post" action="">'+
														'<a class="btn btn-info choix_detail">'+
															'<input type="hidden" name="stock_id" value="'+data[i].stock_id+'">'+
															'<input type="hidden" name="id" value="'+data[i].id+'">'+
															'Choisir'+
														'</a>'+
													'</form>'+
												'</td>'+
											'</tr>';
								}

								$('#showTable').html(showdata);
							},
							error:function(){
								alert("oupsss error!!!!!");
							}

						});
					});

					
					},

				error:function(){
				}

			});
		});
	}


	function dataTables(){
		$('#myDataTable').dataTable();
	}


	$(document).ready(function(){
		showDefaultData();
		showCatArticle();
		filterCategorie();
		VenteForm();
		VerifQuantite();
		// dataTables();
		

	});