<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Vente extends CI_Controller {


		public function index(){

			$_SESSION['success']='';
			$data['AllCatStock']=$this->Cat_stock->findAllCat_stock();
			$data['valTotal']=array();
			for ($i=0; $i<$data['AllCatStock']['total']; $i++) { 
				$data['valTotal'][$i]=$this->Tablegenerated->countAllArticle($data['AllCatStock'][$i]['libelle']);
			}
			
			$this->load->view('Welcome/index',$data);
			$this->load->view('template_al/navigation');
			$this->load->view('Ventes/vente_home');
			$this->load->view('Welcome/footer');
		}

		public function showDefault(){
			$data['AllCatStock']=$this->Cat_stock->findAllCat_stock();
			
			for ($i=0; $i <$data['AllCatStock']['total'] ; $i++) { 
				if ($data['AllCatStock'][$i]['libelle']=='chaussure') {
					echo json_encode($this->Tablegenerated->findAllDonneeTable($data['AllCatStock'][$i]['libelle']));
					break;
				}
			}
		}


		function loadDataVenteByID(){
			if(isset($_POST['id']) && isset($_POST['stock_id'])){
				$data['id']=$_POST['id'];
				$data['stock_id']=$_POST['stock_id'];
				$data['nom_table']=$this->Cat_stock->findLibelle($this->Stock->findCat_stock_id($_POST['stock_id']));
				$data['info']=$this->Tablegenerated->findInfoModif($data['nom_table'],$_POST['id']);
				$data['image']=$this->Stock->findImage($_POST['stock_id']);
				if($data['nom_table']=='chaussure'){
					$data['infoPointure']=$this->Tablegenerated->findInfoPointure($data['nom_table'],$_POST['id']);
					$pointure=$data['infoPointure']['pointure'];
					$data['point']=array();
					$data['point']=json_decodeur($pointure);
					$data['verif']="point";
				}elseif ($data['nom_table']=='chemise' || $data['nom_table']=='costume') {
					$data['infoTaille']=$this->Tablegenerated->findInfoTaille($data['nom_table'],$_POST['id']);
					$taille=$data['infoTaille']['taille'];
					$data['tail']=array();
					$data['tail']=json_decodeur($taille);
					$data['verif']="tail";
				}else{
					$data['verif']="";
				}

				$this->load->view('Welcome/index',$data);
				$this->load->view('template_al/navigation');
				$this->load->view('Ventes/vente_detail');
				$this->load->view('Welcome/footer');
			}else{
				redirect(site_url(array('Welcome','index')));
			}
		}


		public function saveVente(){
			print_r($_POST);
			$_SESSION['message_save_vente']="";
			if(isset($_POST['id']) && isset($_POST['stock_id'])){
				$data['nom_table']=$this->Cat_stock->findLibelle($this->Stock->findCat_stock_id($_POST['stock_id']));
				$data['infoTable']=$this->Tablegenerated->findInfoModif($data['nom_table'],$_POST['id']);
				print_r($data['infoTable']);
				if($data['nom_table']=='chaussure'){
					$data['infoPointure']=$this->Tablegenerated->findInfoPointure($data['nom_table'],$_POST['id']);
					$pointure=$data['infoPointure']['pointure'];
					$data['point']=array();
					$data['point']=json_decodeur($pointure);
					print_r($data['point']);
					for ($i=0; $i <$data['point']['donnee_pointure']['total'] ; $i++) { 
						if($data['point']['donnee_pointure'][$i]['nom']==$_POST['nom_qte']){
							$valStockQte=$data['point']['donnee_pointure'][$i]['val'];
							$j=$i;
							break;
						}
					}
					$textArticle=1;
				}elseif ($data['nom_table']=='chemise' || $data['nom_table']=='costume') {
					$data['infoTaille']=$this->Tablegenerated->findInfoTaille($data['nom_table'],$_POST['id']);
					$taille=$data['infoTaille']['taille'];
					$data['tail']=array();
					$data['tail']=json_decodeur($taille);
					print_r($data['tail']);
					for ($i=0; $i <$data['tail']['donnee_taille']['total'] ; $i++) { 
						if($data['tail']['donnee_taille'][$i]['nom']==$_POST['nom_qte']){
							$valStockQte=$data['tail']['donnee_taille'][$i]['val'];
							$j=$i;
							break;
						}
					}
					$textArticle=2;
				}else{
					$valStockQte=$data['infoTable']['quantite'];
					$textArticle=0;
				}

				if($valStockQte==0){
					$_SESSION['message_save_vente']="Stock epuisé pour cette Article";
				}elseif($_POST['quantite']<=$valStockQte){
					$data['prix_total']=$_POST['quantite']*$_POST['prix_u'];
					$data['qteRestante']=$valStockQte-$_POST['quantite'];
					$data['id_client']=$_POST['id_client'];
					$data['id_stock']=$_POST['stock_id'];
					
					$data['detail_vente']=array();
					$data['detail_vente']['marque']=$data['infoTable']['marque'];
					$data['detail_vente']['code']=$data['infoTable']['code'];
					$data['detail_vente']['couleur']=$data['infoTable']['couleur'];
					$data['detail_vente']['prix_u']=$_POST['prix_u'];
					$data['detail_vente']['quantite']=$_POST['quantite'];
					$data['detail_vente']['prix_total']=$data['prix_total'];
					$data['detail_vente']=json_encodeur($data['detail_vente']);
					$data['dateCreation']=$data['infoTable']['dateCreation'];
					$data['dateVente']=date('Y-m-d H:i:s');
					$data['dateModification']=date('Y-m-d H:i:s');
					if($textArticle==0){
						$data['quantite']=$data['qteRestante'];
					}elseif ($textArticle==1) {
						$data['point']['donnee_pointure'][$j]['val']=$data['qteRestante'];
						$data['point']['donnee_pointure']['quantite']=$data['point']['donnee_pointure']['quantite']-$_POST['quantite'];
						$data['quantite']=$data['point']['donnee_pointure']['quantite'];
						$data['pointure']=json_encodeur($data['point']);
					}elseif ($textArticle==2) {
						$data['tail']['donnee_taille'][$j]['val']=$data['qteRestante'];
						$data['tail']['donnee_taille']['quantite']=$data['tail']['donnee_taille']['quantite']-$_POST['quantite'];
						$data['quantite']=$data['tail']['donnee_taille']['quantite'];
						$data['taille']=json_encodeur($data['tail']);
					}else{

					}

					$this->Vente->hydrate($data);
					$this->Vente->addVente($data);
					$this->Tablegenerated->updatePointureTaille($data, $data['nom_table'],$_POST['id']);

					$_SESSION['message_save_vente']='Vente effectue avec success!!!!!';
				}else{
					$_SESSION['message_save_vente']='Oupss Error Data';
				}
			}

			print_r($_SESSION['message_save_vente']);
		}



		public function findCategorie(){
			$allCat=json_encode($this->Cat_stock->findAllCat_stock());
			echo $allCat;
		}

		public function filterTable(){
			if(isset($_POST['id_cat'])){
				$allMarque=$this->Stock->findAllStockName($_POST['id_cat']);
				echo json_encode($allMarque);
			}else{
				redirect(site_url(array('Welcome','index')));
			}
		}

		public function filterchoixTable(){
			if(isset($_POST['stock_id'])){
				echo json_encode($this->Tablegenerated->findAllDonneeTableBy_id($_POST['libelle'],$_POST['stock_id']));
			}
		}



	}
