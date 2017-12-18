<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Vente_model extends CI_Model{
		
		function __construct()
		{
		
		}
		
			
			private $id_stock;
			private $id_vente;
			private $id_client;
			private $detail_vente="{total:0}";
			private $dateCreation;
			private $dateVente;

			protected $table= 'ventes';

			
			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}


			public function addVente(){

			    $this->db->set('id_vente', $this->id_vente)
			    	->set('id_client', $this->id_client)
			    	->set('id_stock', $this->id_stock)
			    	->set('detail_vente', $this->detail_vente)
			    	->set('dateCreation', $this->dateCreation)
			    	->set('dateVente', $this->dateVente)
			    	->insert($this->table);
			}
			
			
			public function updateVente($data){
				if ($data['id_stock'] != '') {
					$this->db->set('id_stock',$data['id_stock'] );
				}
				
				if ($data['id_client'] != '') {
			    	$this->db->set('id_client',$data['id_client']);
			    }

			    if ($data['detail_vente'] != '') {
			    	$this->db->set('detail_vente',$data['detail_vente']);
			    } 

			   	if ($data['dateVente'] != '') {
			    	$this->db->set('dateVente',$data['dateVente']);
			    }

		  	    	$this->db->where('id_vente',(int)$data['id_vente'])
	    			 ->update($this->table);
			}

			public function deleteVente($id_vente){

			    $this->db->where('id_vente',(int)$id_vente)
			    	->delete($this->table);	
			}


			public function findAllVente($id_stock){
				$data =$this->db->select('id_stock,id_vente')
								->from($this->table)
								->where('id_client', $id_stock)
								->get()
								->result();
					$i=0;
				foreach ($data as $row){
			       	$donnees[$i]['id_stock'] = $row->id_stock;
			       	$donnees[$i]['id_vente'] = $row->id_vente;
			       $i++;
				}
 					$donnees['total']=$i;
				return $donnees;
			}
			

			public function findId_vente($id_stock){
				$data =$this->db->select('id_vente')
								->from($this->table)
								->where('id_stock', $id_stock)
								->limit(1)
								->get()
								->result();

								
				foreach ($data as $row){
			       	$donnees['id_vente']=$row->id_vente;
				}

				return $donnees['id_vente'];
			}


			public function findid_client($id_stock){
				$data =$this->db->select('id_client')
								->from($this->table)
								->where('id_stock', $id_stock)
								->limit(1)
								->get()
								->result();

											
				foreach ($data as $row){
			       	$donnees['id_client']=$row->id_client;
				}

				return $donnees['id_client'];
			}

			
					// setteurs


			public function setId_stock($id_stock){
				$this->id_stock=$id_stock;
			}


			public function setId_vente($id_vente){
				$this->id_vente=$id_vente;
			}

			public function setId_client($id_client){
				$this->id_client=$id_client;
			}

			public function setDetail_vente($detail_vente){
				$this->detail_vente=$detail_vente;
			}

			public function setDateCreation($dateCreation){
				$this->dateCreation=$dateCreation;
			}

			public function setDateVente($dateVente){
				$this->dateVente=$dateVente;
			}
			

			// getteurs

			public function getId_stock(){
				return $this->id_stock;
			
			}

			
			public function getId_vente(){
				return $this->id_vente;
			
			}
			
			public function getDateCreation(){
				return $this->dateCreation;
			
			}
			
			public function getDateVente(){
				return $this->dateVente;
			
			}
			
			public function getDetail_vente(){
				return $this->detail_vente;
			
			}

			public function getId_client(){
				return $this->id_client;
			
			}
				
	
}


?>
