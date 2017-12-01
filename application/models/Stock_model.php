<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Stock_model extends CI_Model{
		
		function __construct()
		{
		
		}
		
			
			private $id_stock;
			private $nom_article;
			private $cat_stock_id;
			private $tab_cat="{total:0}";
			private $image;
			private $dateCreation;
			private $dateModification;

			protected $table= 'stock';

			
			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}


			public function addStock(){

			    $this->db->set('nom_article', $this->nom_article)
			    	->set('cat_stock_id', $this->cat_stock_id)
			    	->set('tab_cat', $this->tab_cat)
			    	->set('image', $this->image)
			    	->set('dateCreation', $this->dateCreation)
			    	->insert($this->table);
			}
			
			
			public function updateStock($data){
				if ($data['nom_article'] != '') {
					$this->db->set('nom_article',$data['nom_article'] );
				}
				
				if ($data['cat_stock_id'] != '') {
			    	$this->db->set('cat_stock_id',$data['cat_stock_id']);
			    }

			    if ($data['tab_cat'] != '') {
			    	$this->db->set('tab_cat',$data['tab_cat']);
			    } 

			    if (isset($data['image']) && $data['image']!=''){
		    		$this->db->set('image', $data['image']);
		    	}

			   	if ($data['dateModification'] != '') {
			    	$this->db->set('dateModification',$data['dateModification']);
			    }

		  	    	$this->db->where('id_stock',(int)$data['id_stock'])
	    			 ->update($this->table);
			}

			public function deleteStock($id_stock){

			    $this->db->where('id_stock',(int)$id_stock)
			    	->delete($this->table);	
			}


			public function findAllStockName($id_cat){
				$data =$this->db->select('id_stock,nom_article')
								->from($this->table)
								->where('cat_stock_id', $id_cat)
								->get()
								->result();
					$i=0;
				foreach ($data as $row){
			       	$donnees[$i]['id_stock'] = $row->id_stock;
			       	$donnees[$i]['nom_article'] = $row->nom_article;
			       $i++;
				}
 					$donnees['total']=$i;
				return $donnees;
			}
			

			public function findNom_article($id_stock){
				$data =$this->db->select('nom_article')
								->from($this->table)
								->where('id_stock', $id_stock)
								->limit(1)
								->get()
								->result();

								
				foreach ($data as $row){
			       	$donnees['nom_article']=$row->nom_article;
				}

				return $donnees['nom_article'];
			}


			public function findCat_stock_id($id_stock){
				$data =$this->db->select('cat_stock_id')
								->from($this->table)
								->where('id_stock', $id_stock)
								->limit(1)
								->get()
								->result();

											
				foreach ($data as $row){
			       	$donnees['cat_stock_id']=$row->cat_stock_id;
				}

				return $donnees['cat_stock_id'];
			}

			
					// setteurs


			public function setId_stock($id_stock){
				$this->id_stock=$id_stock;
			}


			public function setNom_article($nom_article){
				$this->nom_article=$nom_article;
			}

			public function setCat_stock_id($cat_stock_id){
				$this->cat_stock_id=$cat_stock_id;
			}

			public function setImage($image){
				$this->image=$image;
			}

			public function setTab_cat($tab_cat){
				$this->tab_cat=$tab_cat;
			}

			public function setDateCreation($dateCreation){
				$this->dateCreation=$dateCreation;
			}

			public function setDateModification($dateModification){
				$this->dateModification=$dateModification;
			}
			

			// getteurs

			public function getId_stock(){
				return $this->id_stock;
			
			}

			
			public function getNom_article(){
				return $this->nom_article;
			
			}
			
			public function getDateCreation(){
				return $this->dateCreation;
			
			}
			
			public function getDateModification(){
				return $this->dateModification;
			
			}
			
			public function getTab_cat(){
				return $this->tab_cat;
			
			}

			public function getImage(){
				return $this->image;
			
			}

			public function getCat_stock_id(){
				return $this->cat_stock_id;
			
			}
				
	
}


?>
