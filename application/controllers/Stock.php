<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function index()
	{
		$_SESSION['success']='';
		$data['AllCatStock']=$this->Cat_stock->findAllCat_stock();

		$this->load->view('Welcome/index',$data);
		$this->load->view('Welcome/asside');
		$this->load->view('Stocks/stock_home');
		$this->load->view('Welcome/footer');
	}

	public function AfficheStock(){
		$_SESSION['success']='';
		
		if (isset($_POST['id_cat'])) {
			$data['id_cat']=$_POST['id_cat'];
			$data['title']=$this->Cat_stock->findLibelle($_POST['id_cat']);
			$data['StockName']=$this->Stock->findAllStockName($_POST['id_cat']);
			$data['alldonneeArticle']=$this->Tablegenerated->findAllDonneeTable($data['title']);
			$this->load->view('Welcome/index',$data);
			$this->load->view('Welcome/asside');
			if ($data['title']=='chaussure') {
				if ($data['title']=='chaussure') {
				$this->load->view('Stocks/stock_detail_chaussure');
			}elseif ($data['title']=='sacs') {
				$this->load->view('Stocks/stock_detail_sacs');
			}elseif ($data['title']=='chemise') {
				$this->load->view('Stocks/stock_detail_chemise');
			}elseif ($data['title']=='costume') {
				$this->load->view('Stocks/stock_detail_costume');
			}else{
				$this->load->view('Stocks/stock_detail');
			}
			}elseif ($data['title']=='sacs') {
				$this->load->view('Stocks/stock_detail_sacs');
			}elseif ($data['title']=='chemise') {
				$this->load->view('Stocks/stock_detail_chemise');
			}elseif ($data['title']=='costume') {
				$this->load->view('Stocks/stock_detail_costume');
			}else{
				$this->load->view('Stocks/stock_detail');
			}
			$this->load->view('Welcome/footer');
		}
	}


	public function addMarque(){
		$_SESSION['success']='';
		
		if (isset($_POST['cat_stock_id'])) {
			$data['allArticle']=$this->Stock->findAllStockName($_POST['cat_stock_id']);
			
			if ($data['allArticle']['total']==0) {
				$val_sorti='non';
			}else{
				for ($i=0; $i <$data['allArticle']['total'] ; $i++) { 
					if ($data['allArticle'][$i]['nom_article']==$_POST['nom_article']) {
						$val_sorti='exist';
						break;
					}else{
						$val_sorti='non';
					}
				}
			}
			for ($i=0; $i <$data['allArticle']['total'] ; $i++) { 
				if ($data['allArticle'][$i]['nom_article']==$_POST['nom_article']) {
					$val_sorti='exist';
					break;
				}else{
					$val_sorti='non';
				}
			}	
			
			if ($val_sorti=='non') {
				if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
				// Testons si le fichier n'est pas trop gros
					if ($_FILES['image']['size'] <= 100000000){
						// Testons si l'extension est autorisée
						$infosfichier =pathinfo($_FILES['image']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('gif','png','jpg','jpeg','bmp');

						// verification de lexistance de la table
						if (in_array(strtolower($extension_upload),$extensions_autorisees)){
							// On peut valider le fichier et le stocker définitivement
							$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i');
							$ma_variable = str_replace('.', '_', $config);
							$ma_variable = str_replace(' ', '_', $config);
							$config = $ma_variable.'.'.$extension_upload;
							move_uploaded_file($_FILES['image']['tmp_name'],'assets/images/StockImage/'.$config);
							
							$data['cat_stock_id']=$_POST['cat_stock_id'];
							$data['nom_article']=$_POST['nom_article'];
							$data['image']=$config;
							$data['dateCreation']=date('Y-m-d H:i:s');
							$this->Stock->hydrate($data);
							$this->Stock->addStock();

							$_SESSION['message_save']="Marque enregistré avec succes !!";
				 			$_SESSION['success']='ok';

						}else{
							$_SESSION['message']="L'extension du fichier choisie  est  incorrect veuillez le remplacer svp !!";
							$_SESSION['success']='non';
						}

					}else{
						$_SESSION['message']="La taille du fichier choisie  est très grande veuillez le remplacer svp !!";
						$_SESSION['success']='non';
					}
				}else{
					$_SESSION['message']="L'image choisie  est endommagée  veuillez le remplacer svp !!";
					$_SESSION['success']='non';
				}
			}else{
				$_SESSION['message_save']="Désole cette Marque existe déja. Bien vouloir enregistré une aute!!";
				$_SESSION['success']='exist';
			}

			$data['id_cat']=$_POST['cat_stock_id'];
			$data['title']=$this->Cat_stock->findLibelle($_POST['cat_stock_id']);
			$data['StockName']=$this->Stock->findAllStockName($_POST['cat_stock_id']);
			$data['alldonneeArticle']=$this->Tablegenerated->findAllDonneeTable($data['title']);
			$this->load->view('Welcome/index',$data);
			$this->load->view('Welcome/asside');
			if ($data['title']=='chaussure') {
				$this->load->view('Stocks/stock_detail_chaussure');
			}elseif ($data['title']=='sacs') {
				$this->load->view('Stocks/stock_detail_sacs');
			}elseif ($data['title']=='chemise') {
				$this->load->view('Stocks/stock_detail_chemise');
			}elseif ($data['title']=='costume') {
				$this->load->view('Stocks/stock_detail_costume');
			}else{
				$this->load->view('Stocks/stock_detail');
			}
			$this->load->view('Welcome/footer');
		}
	}

	public function postArticle(){
		$_SESSION['success']='';
		if (isset($_POST['id_stock'])) {
			$data['nom_table']=$_POST['nom_table'];
			$data['verifCode']=$this->Tablegenerated->findCode($_POST['nom_table'],$_POST['id_stock']);
			if ($data['verifCode']['total']==0) {
				$_SESSION['success']="ok";
				$_SESSION['message_save']="Article enregistre avec success!!!";
				$verif=true;
			}else{
				for ($i=0; $i <$data['verifCode']['total'] ; $i++) { 
					if ($data['verifCode'][$i]['code']==$_POST['code']) {
						$_SESSION['success']="ok";
						$_SESSION['message_save']="désolé ce code existe déjà!!!";
						$verif=false;
						break;
					}else{
						$_SESSION['success']="ok";
						$_SESSION['message_save']="Article enregistré avec success!!!";
						$verif=true;
					}
				}
			}
			
			if ($verif==true) {
				$data['modele']=$_POST['modele'];
				$data['couleur']=$_POST['couleur'];
				$data['prix_min']=$_POST['prix_min'];
				$data['prix_max']=$_POST['prix_max'];
				$data['type']=$_POST['type'];
				$data['stock_id']=$_POST['id_stock'];
				$data['marque']=$this->Stock->findNom_article($_POST['id_stock']);
				$data['code']=$_POST['code'];
				if ($_POST['nom_table']=='chaussure') {
					if ($_POST['type']=='homme') {
						$data1['donnee_pointure']=array();
						$data1['donnee_pointure']['qtept35']=$_POST['qtept35'];
						$data1['donnee_pointure']['qtept36']=$_POST['qtept36'];
						$data1['donnee_pointure']['qtept37']=$_POST['qtept37'];
						$data1['donnee_pointure']['qtept38']=$_POST['qtept38'];
						$data1['donnee_pointure']['qtept39']=$_POST['qtept39'];
						$data1['donnee_pointure']['qtept40']=$_POST['qtept40'];
						$data1['donnee_pointure']['qtept41']=$_POST['qtept41'];
						$data1['donnee_pointure']['qtept42']=$_POST['qtept42'];
						$data1['donnee_pointure']['qtept43']=$_POST['qtept43'];
						$data1['donnee_pointure']['qtept44']=$_POST['qtept44'];
						$data1['donnee_pointure']['qtept45']=$_POST['qtept45'];
						$data1['donnee_pointure']['qtept46']=$_POST['qtept46'];
						$data1['donnee_pointure']['total']= $_POST['qtept35']+ $_POST['qtept36']+ $_POST['qtept37']+ $_POST['qtept38']+ $_POST['qtept39']+ $_POST['qtept40']+ $_POST['qtept41']+ $_POST['qtept42']+$_POST['qtept43']+$_POST['qtept44']+$_POST['qtept45']+$_POST['qtept46'];
					
					}elseif ($_POST['type']=='femme') {
						$data1['donnee_pointure']=array();
						$data1['donnee_pointure']['qtept35']=$_POST['qtept35'];
						$data1['donnee_pointure']['qtept36']=$_POST['qtept36'];
						$data1['donnee_pointure']['qtept37']=$_POST['qtept37'];
						$data1['donnee_pointure']['qtept38']=$_POST['qtept38'];
						$data1['donnee_pointure']['qtept39']=$_POST['qtept39'];
						$data1['donnee_pointure']['qtept40']=$_POST['qtept40'];
						$data1['donnee_pointure']['qtept41']=$_POST['qtept41'];
						$data1['donnee_pointure']['qtept42']=$_POST['qtept42'];
						$data1['donnee_pointure']['qtept43']=$_POST['qtept43'];
						$data1['donnee_pointure']['qtept44']=$_POST['qtept44'];
						$data1['donnee_pointure']['total']= $_POST['qtept35']+ $_POST['qtept36']+ $_POST['qtept37']+ $_POST['qtept38']+ $_POST['qtept39']+ $_POST['qtept40']+ $_POST['qtept41']+ $_POST['qtept42']+$_POST['qtept43']+$_POST['qtept44'];
					
					}elseif($_POST['type']=='enfant') {
						$data1['donnee_pointure']=array();
						$data1['donnee_pointure']['qtept18']=$_POST['qtept18'];
						$data1['donnee_pointure']['qtept19']=$_POST['qtept19'];
						$data1['donnee_pointure']['qtept20']=$_POST['qtept20'];
						$data1['donnee_pointure']['qtept21']=$_POST['qtept21'];
						$data1['donnee_pointure']['qtept22']=$_POST['qtept22'];
						$data1['donnee_pointure']['qtept23']=$_POST['qtept23'];
						$data1['donnee_pointure']['qtept24']=$_POST['qtept24'];
						$data1['donnee_pointure']['qtept25']=$_POST['qtept25'];
						$data1['donnee_pointure']['qtept26']=$_POST['qtept26'];
						$data1['donnee_pointure']['qtept27']=$_POST['qtept27'];
						$data1['donnee_pointure']['qtept28']=$_POST['qtept28'];
						$data1['donnee_pointure']['qtept29']=$_POST['qtept29'];
						$data1['donnee_pointure']['qtept30']=$_POST['qtept30'];
						$data1['donnee_pointure']['qtept31']=$_POST['qtept31'];
						$data1['donnee_pointure']['qtept32']=$_POST['qtept32'];
						$data1['donnee_pointure']['qtept33']=$_POST['qtept33'];
						$data1['donnee_pointure']['qtept34']=$_POST['qtept34'];
						$data1['donnee_pointure']['qtept35']=$_POST['qtept35'];
						$data1['donnee_pointure']['qtept36']=$_POST['qtept36'];
						$data1['donnee_pointure']['total']= $_POST['qtept18']+ $_POST['qtept19']+ $_POST['qtept20']+ $_POST['qtept21']+ $_POST['qtept22']+ $_POST['qtept23']+ $_POST['qtept24']+ $_POST['qtept25']+$_POST['qtept26']+$_POST['qtept27']+$_POST['qtept28']+$_POST['qtept29']+$_POST['qtept30']+$_POST['qtept31']+$_POST['qtept32']+$_POST['qtept33']+$_POST['qtept34']+$_POST['qtept35']+$_POST['qtept36'];
					
					}

					$data['quantite']=$data1['donnee_pointure']['total'];
					$data['pointure']=json_encodeur($data1);
				
				}elseif ($_POST['nom_table']=='chemise') {
					$data1['donnee_taille']=array();
					$data1['donnee_taille']['qteTS']=$_POST['qteTS'];
					$data1['donnee_taille']['qteTM']=$_POST['qteTM'];
					$data1['donnee_taille']['qteTL']=$_POST['qteTL'];
					$data1['donnee_taille']['qteTXL']=$_POST['qteTXL'];
					$data1['donnee_taille']['qteTXXL']=$_POST['qteTXXL'];
					$data1['donnee_taille']['qteT3XL']=$_POST['qteT3XL'];
					$data1['donnee_taille']['total']=$_POST['qteTS']+$_POST['qteTM']+$_POST['qteTL']+$_POST['qteTXL']+$_POST['qteTXXL']+$_POST['qteT3XL'];
					$data['quantite']=$data1['donnee_taille']['total'];
					$data['taille']=json_encodeur($data1);

				}elseif ($_POST['nom_table']=='costume') {
					$data1['donnee_taille']=array();
					$data1['donnee_taille']['qteT44']=$_POST['qteT44'];
					$data1['donnee_taille']['qteT45']=$_POST['qteT45'];
					$data1['donnee_taille']['qteT46']=$_POST['qteT46'];
					$data1['donnee_taille']['qteT47']=$_POST['qteT47'];
					$data1['donnee_taille']['qteT48']=$_POST['qteT48'];
					$data1['donnee_taille']['qteT49']=$_POST['qteT49'];
					$data1['donnee_taille']['qteT50']=$_POST['qteT50'];
					$data1['donnee_taille']['qteT51']=$_POST['qteT51'];
					$data1['donnee_taille']['qteT52']=$_POST['qteT52'];
					$data1['donnee_taille']['qteT53']=$_POST['qteT53'];
					$data1['donnee_taille']['qteT54']=$_POST['qteT54'];
					$data1['donnee_taille']['qteT55']=$_POST['qteT55'];
					$data1['donnee_taille']['qteT56']=$_POST['qteT56'];
					$data1['donnee_taille']['qteT57']=$_POST['qteT57'];
					$data1['donnee_taille']['qteT58']=$_POST['qteT58'];
					$data1['donnee_taille']['qteT59']=$_POST['qteT59'];
					$data1['donnee_taille']['qteT60']=$_POST['qteT60'];
					$data1['donnee_taille']['total']=$_POST['qteT44']+$_POST['qteT45']+$_POST['qteT46']+$_POST['qteT47']+$_POST['qteT48']+$_POST['qteT49']+$_POST['qteT50']+$_POST['qteT51']+$_POST['qteT52']+$_POST['qteT53']+$_POST['qteT54']+$_POST['qteT55']+$_POST['qteT56']+$_POST['qteT57']+$_POST['qteT58']+$_POST['qteT59']+$_POST['qteT60'];
					$data['quantite']=$data1['donnee_taille']['total'];
					$data['taille']=json_encodeur($data1);
				}elseif ($_POST['nom_table']=='sacs') {
					$data['quantite']=$_POST['quantite'];
				}else{
					
				}
				
				$data['dateCreation']=date('Y-m-d H:i:s');

				if ($this->Tablegenerated->testTable($_POST['nom_table'])==TRUE) {
					$this->Tablegenerated->hydrate($data);
					$this->Tablegenerated->addArticle($data['nom_table']);

					$data['id_cat']=$this->Stock->findCat_stock_id($_POST['id_stock']);
					$data['title']=$this->Cat_stock->findLibelle($data['id_cat']);
					$data['StockName']=$this->Stock->findAllStockName($data['id_cat']);
					$data['alldonneeArticle']=$this->Tablegenerated->findAllDonneeTable($_POST['nom_table']);
					$this->load->view('Welcome/index',$data);
					$this->load->view('Welcome/asside');
					if ($data['title']=='chaussure') {
						$this->load->view('Stocks/stock_detail_chaussure');
					}elseif ($data['title']=='sacs') {
						$this->load->view('Stocks/stock_detail_sacs');
					}elseif ($data['title']=='chemise') {
						$this->load->view('Stocks/stock_detail_chemise');
					}elseif ($data['title']=='costume') {
						$this->load->view('Stocks/stock_detail_costume');
					}else{
						$this->load->view('Stocks/stock_detail');
					}
					$this->load->view('Welcome/footer');
					
				}else{

				}

			}else{
				$data['id_cat']=$this->Stock->findCat_stock_id($_POST['id_stock']);
				$data['title']=$this->Cat_stock->findLibelle($data['id_cat']);
				$data['StockName']=$this->Stock->findAllStockName($data['id_cat']);
				$data['alldonneeArticle']=$this->Tablegenerated->findAllDonneeTable($_POST['nom_table']);
				$this->load->view('Welcome/index',$data);
				$this->load->view('Welcome/asside');
				if ($data['title']=='chaussure') {
					$this->load->view('Stocks/stock_detail_chaussure');
				}elseif ($data['title']=='sacs') {
					$this->load->view('Stocks/stock_detail_sacs');
				}elseif ($data['title']=='chemise') {
					$this->load->view('Stocks/stock_detail_chemise');
				}elseif ($data['title']=='costume') {
					$this->load->view('Stocks/stock_detail_costume');
				}else{
					$this->load->view('Stocks/stock_detail');
				}
				$this->load->view('Welcome/footer');
			}
			

		}
		
	}

	public function showUpdateArticle(){
		$_SESSION['success']='';
		if (isset($_POST['id'])) {
			$data['id']=$_POST['id'];
			$data['nom_table']=$_POST['nom_table'];
			$data['stock_id']=$_POST['stock_id'];
			$data['infoModif']=$this->Tablegenerated->findInfoModif($data['nom_table'],$data['id']);
			if ($data['nom_table']=='chaussure') {
				$data['infoModifPointure']=$this->Tablegenerated->findInfoPointure($data['nom_table'],$data['id']);
				$pointure=$data['infoModifPointure']['pointure'];
				$data['point']=array();
				$data['point']=json_decodeur($pointure);
			
			}elseif ($data['nom_table']=='sacs') {
				
			}elseif ($data['nom_table']=='chemise') {
				$data['infoModifTaille']=$this->Tablegenerated->findInfoTaille($data['nom_table'],$data['id']);
				$taille=$data['infoModifTaille']['taille'];
				$data['tail']=array();
				$data['tail']=json_decodeur($taille);
			}elseif ($data['nom_table']=='costume') {
				$data['infoModifTaille']=$this->Tablegenerated->findInfoTaille($data['nom_table'],$data['id']);
				$taille=$data['infoModifTaille']['taille'];
				$data['tail']=array();
				$data['tail']=json_decodeur($taille);
			}else{
				
			}

			$this->load->view('Welcome/index',$data);
			$this->load->view('Welcome/asside');
			if ($data['nom_table']=='chaussure') {
				if($_POST['type']=='homme'){
					$this->load->view('Stocks/stock_modif');
				}elseif ($_POST['type']=='femme') {
					$this->load->view('Stocks/stock_modif_femme');
				}elseif ($_POST['type']=='enfant') {
					$this->load->view('Stocks/stock_modif_enfant');
				}
			}elseif ($data['nom_table']=='sacs') {
				$this->load->view('Stocks/stock_modif_sacs');
			}elseif ($data['nom_table']=='chemise') {
				$this->load->view('Stocks/stock_modif_chemise');
			}elseif ($data['nom_table']=='costume') {
				$this->load->view('Stocks/stock_modif_costume');
			}else{
				
			}
			$this->load->view('Welcome/footer');
			
		}else{
			redirect(site_url(array('Welcome','index')));
		}
	}

	public function updateArticle(){
		$_SESSION['success']='';
		if (isset($_POST['id'])) {

			$data['nom_table']=$_POST['nom_table'];
			$data['modele']=$_POST['modele'];
			$data['couleur']=$_POST['couleur'];
			$data['prix_min']=$_POST['prix_min'];
			$data['prix_max']=$_POST['prix_max'];
			$data['stock_id']=$_POST['stock_id'];
			$data['code']=$_POST['code'];
			if ($_POST['nom_table']=='chaussure') {
				if ($_POST['type']=='homme') {
					$data1['donnee_pointure']=array();
					$data1['donnee_pointure']['qtept35']=$_POST['qtept35'];
					$data1['donnee_pointure']['qtept36']=$_POST['qtept36'];
					$data1['donnee_pointure']['qtept37']=$_POST['qtept37'];
					$data1['donnee_pointure']['qtept38']=$_POST['qtept38'];
					$data1['donnee_pointure']['qtept39']=$_POST['qtept39'];
					$data1['donnee_pointure']['qtept40']=$_POST['qtept40'];
					$data1['donnee_pointure']['qtept41']=$_POST['qtept41'];
					$data1['donnee_pointure']['qtept42']=$_POST['qtept42'];
					$data1['donnee_pointure']['qtept43']=$_POST['qtept43'];
					$data1['donnee_pointure']['qtept44']=$_POST['qtept44'];
					$data1['donnee_pointure']['qtept45']=$_POST['qtept45'];
					$data1['donnee_pointure']['qtept46']=$_POST['qtept46'];
					$data1['donnee_pointure']['total']= $_POST['qtept35']+ $_POST['qtept36']+ $_POST['qtept37']+ $_POST['qtept38']+ $_POST['qtept39']+ $_POST['qtept40']+ $_POST['qtept41']+ $_POST['qtept42']+$_POST['qtept43']+$_POST['qtept44']+$_POST['qtept45']+$_POST['qtept46'];
				
				}elseif ($_POST['type']=='femme') {
					$data1['donnee_pointure']=array();
					$data1['donnee_pointure']['qtept35']=$_POST['qtept35'];
					$data1['donnee_pointure']['qtept36']=$_POST['qtept36'];
					$data1['donnee_pointure']['qtept37']=$_POST['qtept37'];
					$data1['donnee_pointure']['qtept38']=$_POST['qtept38'];
					$data1['donnee_pointure']['qtept39']=$_POST['qtept39'];
					$data1['donnee_pointure']['qtept40']=$_POST['qtept40'];
					$data1['donnee_pointure']['qtept41']=$_POST['qtept41'];
					$data1['donnee_pointure']['qtept42']=$_POST['qtept42'];
					$data1['donnee_pointure']['qtept43']=$_POST['qtept43'];
					$data1['donnee_pointure']['qtept44']=$_POST['qtept44'];
					$data1['donnee_pointure']['total']= $_POST['qtept35']+ $_POST['qtept36']+ $_POST['qtept37']+ $_POST['qtept38']+ $_POST['qtept39']+ $_POST['qtept40']+ $_POST['qtept41']+ $_POST['qtept42']+$_POST['qtept43']+$_POST['qtept44'];
				
				}elseif($_POST['type']=='enfant') {
					$data1['donnee_pointure']=array();
					$data1['donnee_pointure']['qtept18']=$_POST['qtept18'];
					$data1['donnee_pointure']['qtept19']=$_POST['qtept19'];
					$data1['donnee_pointure']['qtept20']=$_POST['qtept20'];
					$data1['donnee_pointure']['qtept21']=$_POST['qtept21'];
					$data1['donnee_pointure']['qtept22']=$_POST['qtept22'];
					$data1['donnee_pointure']['qtept23']=$_POST['qtept23'];
					$data1['donnee_pointure']['qtept24']=$_POST['qtept24'];
					$data1['donnee_pointure']['qtept25']=$_POST['qtept25'];
					$data1['donnee_pointure']['qtept26']=$_POST['qtept26'];
					$data1['donnee_pointure']['qtept27']=$_POST['qtept27'];
					$data1['donnee_pointure']['qtept28']=$_POST['qtept28'];
					$data1['donnee_pointure']['qtept29']=$_POST['qtept29'];
					$data1['donnee_pointure']['qtept30']=$_POST['qtept30'];
					$data1['donnee_pointure']['qtept31']=$_POST['qtept31'];
					$data1['donnee_pointure']['qtept32']=$_POST['qtept32'];
					$data1['donnee_pointure']['qtept33']=$_POST['qtept33'];
					$data1['donnee_pointure']['qtept34']=$_POST['qtept34'];
					$data1['donnee_pointure']['qtept35']=$_POST['qtept35'];
					$data1['donnee_pointure']['qtept36']=$_POST['qtept36'];
					$data1['donnee_pointure']['total']= $_POST['qtept18']+ $_POST['qtept19']+ $_POST['qtept20']+ $_POST['qtept21']+ $_POST['qtept22']+ $_POST['qtept23']+ $_POST['qtept24']+ $_POST['qtept25']+$_POST['qtept26']+$_POST['qtept27']+$_POST['qtept28']+$_POST['qtept29']+$_POST['qtept30']+$_POST['qtept31']+$_POST['qtept32']+$_POST['qtept33']+$_POST['qtept34']+$_POST['qtept35']+$_POST['qtept36'];
				
				}
				
				$data['quantite']=$data1['donnee_pointure']['total'];
				$data['pointure']=json_encodeur($data1);
			
			}elseif ($_POST['nom_table']=='chemise') {
				$data1['donnee_taille']=array();
				$data1['donnee_taille']['qteTS']=$_POST['qteTS'];
				$data1['donnee_taille']['qteTM']=$_POST['qteTM'];
				$data1['donnee_taille']['qteTL']=$_POST['qteTL'];
				$data1['donnee_taille']['qteTXL']=$_POST['qteTXL'];
				$data1['donnee_taille']['qteTXXL']=$_POST['qteTXXL'];
				$data1['donnee_taille']['qteT3XL']=$_POST['qteT3XL'];
				$data1['donnee_taille']['total']=$_POST['qteTS']+$_POST['qteTM']+$_POST['qteTL']+$_POST['qteTXL']+$_POST['qteTXXL']+$_POST['qteT3XL'];
				$data['quantite']=$data1['donnee_taille']['total'];
				$data['taille']=json_encodeur($data1);

			}elseif ($_POST['nom_table']=='costume') {
				$data1['donnee_taille']=array();
				$data1['donnee_taille']['qteT44']=$_POST['qteT44'];
				$data1['donnee_taille']['qteT45']=$_POST['qteT45'];
				$data1['donnee_taille']['qteT46']=$_POST['qteT46'];
				$data1['donnee_taille']['qteT47']=$_POST['qteT47'];
				$data1['donnee_taille']['qteT48']=$_POST['qteT48'];
				$data1['donnee_taille']['qteT49']=$_POST['qteT49'];
				$data1['donnee_taille']['qteT50']=$_POST['qteT50'];
				$data1['donnee_taille']['qteT51']=$_POST['qteT51'];
				$data1['donnee_taille']['qteT52']=$_POST['qteT52'];
				$data1['donnee_taille']['qteT53']=$_POST['qteT53'];
				$data1['donnee_taille']['qteT54']=$_POST['qteT54'];
				$data1['donnee_taille']['qteT55']=$_POST['qteT55'];
				$data1['donnee_taille']['qteT56']=$_POST['qteT56'];
				$data1['donnee_taille']['qteT57']=$_POST['qteT57'];
				$data1['donnee_taille']['qteT58']=$_POST['qteT58'];
				$data1['donnee_taille']['qteT59']=$_POST['qteT59'];
				$data1['donnee_taille']['qteT60']=$_POST['qteT60'];
				$data1['donnee_taille']['total']=$_POST['qteT44']+$_POST['qteT45']+$_POST['qteT46']+$_POST['qteT47']+$_POST['qteT48']+$_POST['qteT49']+$_POST['qteT50']+$_POST['qteT51']+$_POST['qteT52']+$_POST['qteT53']+$_POST['qteT54']+$_POST['qteT55']+$_POST['qteT56']+$_POST['qteT57']+$_POST['qteT58']+$_POST['qteT59']+$_POST['qteT60'];
				$data['quantite']=$data1['donnee_taille']['total'];
				$data['taille']=json_encodeur($data1);
			}elseif ($_POST['nom_table']=='sacs') {
				$data['quantite']=$_POST['quantite'];
			}else{

			}
			
			$data['dateModification']=date('Y-m-d H:i:s');
			if ($this->Tablegenerated->testTable($_POST['nom_table'])==TRUE) {
				$this->Tablegenerated->hydrate($data);
				$this->Tablegenerated->updateArticle($data, $data['nom_table'],$_POST['id']);
				$data['id_cat']=$this->Stock->findCat_stock_id($_POST['stock_id']);
				$data['title']=$this->Cat_stock->findLibelle($data['id_cat']);
				$data['StockName']=$this->Stock->findAllStockName($data['id_cat']);
				$data['alldonneeArticle']=$this->Tablegenerated->findAllDonneeTable($_POST['nom_table']);
				$_SESSION['message_save']='Article modifie avec succes';
				$_SESSION['success']='ok';
				
				$this->load->view('Welcome/index',$data);
				$this->load->view('Welcome/asside');
				if ($data['title']=='chaussure') {
					$this->load->view('Stocks/stock_detail_chaussure');
				}elseif ($data['title']=='sacs') {
					$this->load->view('Stocks/stock_detail_sacs');
				}elseif ($data['title']=='chemise') {
					$this->load->view('Stocks/stock_detail_chemise');
				}elseif ($data['title']=='costume') {
					$this->load->view('Stocks/stock_detail_costume');
				}else{
					$this->load->view('Stocks/stock_detail');
				}
				$this->load->view('Welcome/footer');
				
			}else{

			}	
		
		}
	}

	public function	deleteArticle(){
		$_SESSION['success']='';
		if (isset($_POST['id'])) {

			$this->Tablegenerated->deleteArticle($_POST['nom_table'],$_POST['id']);
			$data['id_cat']=$this->Stock->findCat_stock_id($_POST['stock_id']);
			$data['title']=$this->Cat_stock->findLibelle($data['id_cat']);
			$data['StockName']=$this->Stock->findAllStockName($data['id_cat']);
			$data['alldonneeArticle']=$this->Tablegenerated->findAllDonneeTable($_POST['nom_table']);
			$_SESSION['success']='ok';
			$_SESSION['message_save']='Article supprime avec succes!!!!';
			$this->load->view('Welcome/index',$data);
			$this->load->view('Welcome/asside');
			if ($data['title']=='chaussure') {
				$this->load->view('Stocks/stock_detail_chaussure');
			}elseif ($data['title']=='sacs') {
				$this->load->view('Stocks/stock_detail_sacs');
			}elseif ($data['title']=='chemise') {
				$this->load->view('Stocks/stock_detail_chemise');
			}elseif ($data['title']=='costume') {
				$this->load->view('Stocks/stock_detail_costume');
			}else{
				$this->load->view('Stocks/stock_detail');
			}
			$this->load->view('Welcome/footer');
		}else{
			redirect(site_url(array('Welcome','index')));
		}
	}

}
