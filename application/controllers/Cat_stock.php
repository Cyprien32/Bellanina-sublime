<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cat_stock extends CI_Controller {


		public function showAllCat_Stock(){
			// $data=$this->Cat_stock->getCat_stock();
			// echo json_encode($data);
			$data['AllCatStock']=$this->Cat_stock->findAllCat_stock();

			$this->load->view('Welcome/index',$data);
			$this->load->view('Welcome/asside');
			$this->load->view('Stocks/stock_cat');
			$this->load->view('Welcome/footer');

		}

		public function creationTableCat_stock(){

			if (isset($_POST['libelle'])) {
				
				if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
				// Testons si le fichier n'est pas trop gros
					if ($_FILES['image']['size'] <= 100000000){
						// Testons si l'extension est autorisée
						$infosfichier =pathinfo($_FILES['image']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('gif','png','jpg','jpeg','bmp');

						// verification de lexistance de la table
						if ($this->Tablegenerated->testTable($_POST['libelle'])==FALSE) {
							if (in_array(strtolower($extension_upload),$extensions_autorisees)){
								// On peut valider le fichier et le stocker définitivement
								$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i');
								$ma_variable = str_replace('.', '_', $config);
								$ma_variable = str_replace(' ', '_', $config);
								$config = $ma_variable.'.'.$extension_upload;
								move_uploaded_file($_FILES['image']['tmp_name'],'assets/images/CatImage/'.$config);
								
								$data['libelle']=$_POST['libelle'];
								$data['description']=$_POST['description'];
								$data['image']=$config;
								$data['dateCreation']=date('Y-m-d H:i:s');
								$this->Cat_stock->hydrate($data);
								$this->Cat_stock->addCat_stock();

								// creation de la table de communication entre ces deux users
								
								$this->Tablegenerated->newTable($_POST['libelle']);
								$_SESSION['message_save']="Categorie enregistré avec succes !!";
					 			$_SESSION['success']='ok';

							}else{
								$_SESSION['message']="L'extension du fichier choisie  est  incorrect veuillez le remplacer svp !!";
								$_SESSION['success']='non';
							}

						}else{
							$_SESSION['message']="Désolé cette Categorie Existe Déja";
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

				$data['AllCatStock']=$this->Cat_stock->findAllCat_stock();

				$this->load->view('Welcome/index',$data);
				$this->load->view('Welcome/asside');
				$this->load->view('Stocks/stock_cat');
				$this->load->view('Welcome/footer');
			}
		}

	}
