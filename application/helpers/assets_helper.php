<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




if ( ! function_exists('css_url')){
	function css_url($nom){
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}





if ( ! function_exists('css')){
	function css($nom){
		return '<link rel="stylesheet" type="text/css" media="all" href="' . css_url($nom) . '" />';
	}
}



if ( ! function_exists('page')){
	function page($nom){
		return base_url() . $nom;
	}
}




if ( ! function_exists('icomoon_url')){
	function icomoon_url($nom){
		return base_url() . 'assets/icomoon/' . $nom . '.css';
	}
}


if ( ! function_exists('icomoon')){
	function icomoon($nom){
		return '<link rel="stylesheet" type="text/css" href="' . icomoon_url($nom) . '" />';
	}
}




if ( ! function_exists('bootstrapcss_url')){
	function bootstrapcss_url($nom){
		return base_url() . 'assets/bootstrap/css/' . $nom . '.css';
	}
}



if ( ! function_exists('bootstrapcss')){
	function bootstrapcss($nom){
		return '<link rel="stylesheet" type="text/css" href="' . bootstrapcss_url($nom) . '" />';
	}
}





if ( ! function_exists('js_url')){
	function js_url($nom){
		return base_url() . 'assets/javascript/' . $nom . '.js';
	}
}



if ( ! function_exists('js')){
	function js($nom){
		return '<script type="text/javascript" src="' .js_url($nom) .'" > </script>';
	}
}

if ( ! function_exists('link_js_url')){
		function link_js_url($nom){
			return '<script type="text/javascript" src="'.js_url($nom).'"></script>';
		}
	}




if ( ! function_exists('bootstrapjs_url')){
	function bootstrapjs_url($nom){
		return base_url() . 'assets/bootstrap/js/' . $nom . '.js';
	}
}



if ( ! function_exists('bootstrapjs')){
	function bootstrapjs($nom){
		return '<script type="text/javascript" src="' .bootstrapjs_url($nom) .'" > </script>';
	}
}






if ( ! function_exists('img_url')){
	function img_url($nom){
		return base_url() . 'assets/images/' . $nom;
	}
}



if ( ! function_exists('img')){
	function img($nom, $alt = '',$class=''){
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" class="'.$class.'" />';
	}
}


if ( ! function_exists('video_url')){
	function video_url($nom){
		return base_url() . 'assets/video/' . $nom;
	}
}



if ( ! function_exists('video')){
	function video($nom, $alt = '',$class=''){
		return '<video  alt="' . $alt . '" class="'.$class.'" controls><source src="' . video_url($nom) . '"></video>';
	}
}


if ( ! function_exists('videos_url')){
	function videos_url($nom){
		return base_url() . 'assets/images/discus/Statut/video/' . $nom;
	}
}



if ( ! function_exists('videos')){
	function videos($nom, $alt = '',$class=''){
		return '<video src="' . videos_url($nom) . '" alt="' . $alt . '" class="'.$class.'" controls></video>';
	}
}


if ( ! function_exists('convertir_heure')){
	function convertir_heure($time){
		$seconde=$time%60;
		$min=($time-$seconde)%3600;
		$minute=$min/60;
		$heure=($time-$seconde-$min)/3600;

		$jour = $heure/24;
		$mois = $jour/30;
		$annee = $mois/12;
		
		$data['annee']=floor($annee);
		$data['mois']=floor($mois);
		$data['jour']=floor($jour);
		$data['heure']=floor($heure);
		$data['minute']=floor($minute);
		$data['seconde']=floor($seconde);

		$heure = '';
		if ($data['annee'] > 0) {
			$heure.=$data['annee'].'annee ';
		}

		if ($data['mois'] > 0) {
			$heure.=$data['mois'].'mois ';
		}

		if ($data['jour'] > 0) {
			$heure.=$data['jour'].'j ';
			$data['heure'] = $data['heure']%24;
		}

		if ($data['heure'] > 0) {
			$heure.=$data['heure'].'h ';
		}

		if ($data['minute'] > 0) {
			$heure.=$data['minute'].'min ';
		}
		return $heure;
	}
}















if ( ! function_exists('json_decodeur')){
	function json_decodeur($str){
		$tab_retour = array();
	 	$chaine = '';
	 	// purification de la sous chaine sans accolades
	 	if ($str[0] == "{") {
	 		for ($i=1; $i < strlen($str)-1; $i++) { 
	 			$chaine.=$str[$i];
	 		}
	 	}else{
	 		$chaine = $str;
	 	}
	 	// parcour et decoupage de la chaine
	 	$tmp = '';
	 	$tab_tmp = array();
	 	for ($i=0; $i < strlen($chaine); $i++) {
	 		if($chaine[$i] == ','){
	 			$bool = 0;
	 			$bool2 = 0;
	 			
	 			for ($j=0; $j < strlen($tmp); $j++) { 
	 				if ($tmp[$j] == '{') {
	 					$bool++;
	 				}elseif ($tmp[$j] == '}') {
	 					$bool--;
	 				}
	 			}

	 			$pos_point = -1;
	 			$pos_virgul = -1;
	 			for ($k=$i+1; $k < strlen($chaine); $k++) { 
	 				if ($chaine[$k] == ',') {
	 					if ($pos_point == -1) {
	 						$pos_point++;
	 						$bool2 = 1;
	 						break;
	 					}
	 				}elseif ($chaine[$k] == ':') {
	 					if ($pos_virgul == -1) {
	 						$pos_virgul++;
	 						$bool2 = 0;
	 						break;
	 					}
	 				}
	 			}
	 			if ($pos_point == -1 && $pos_virgul == -1) {
	 				$bool2 = 1;
	 			}

	 			if ($bool == 0 && $bool2 == 0) {
	 				$tab_tmp_2 = json_decodeur($tmp);
			 		foreach ($tab_tmp_2 as $key => $value) {
			 			$tab_tmp[$key] = $value;
			 		}
	 				$tmp ='';
	 			}else{
	 				$tmp.= $chaine[$i];
	 			}
	 		}else{
	 			$tmp.=$chaine[$i];
	 		}
	 	}

	 	//recuperation de la derniere chaine
	 	if (strlen($tmp) == strlen($chaine)) {
	 		$bool = 0;
 			for ($j=0; $j < strlen($tmp); $j++) { 
 				if ($tmp[$j] == '{') {
 					if($tmp[($j-1)] == ':'){
 						$bool++;
 						break;
 					}
 				}
 			}
 			if ($bool == 0) {
 				$new_tab = explode(':', $tmp);
	 			$tab_tmp[$new_tab[0]] = $new_tab[1];
 			}else{
 				$nom_tmp = '';
 				for ($k=0; $k < strlen($tmp); $k++) { 
 					if ($tmp[$k] == ':') {
 						break;
 					}else{
 						$nom_tmp.=$tmp[$k];
 					}
 				}
 				$newtmpab = array();
 				$chaine_tmp = '';
 				for ($k=strlen($nom_tmp)+1; $k < strlen($tmp); $k++) { 
 					$chaine_tmp.= $tmp[$k];
 				}
 				$tab_tmp[$nom_tmp] = json_decodeur($chaine_tmp);
 			}
	 	}else{
	 		$tab_tmp_2 = json_decodeur($tmp);
	 		foreach ($tab_tmp_2 as $key => $value) {
	 			$tab_tmp[$key] = $value;
	 		}
	 	}
	 	$tab_retour = $tab_tmp;	
		return $tab_retour;
	}
}




if ( ! function_exists('json_encodeur')){
	function json_encodeur($array){
	 	$chaine_retour = '{';
	 	foreach ($array as $key => $value) {
	 		if (is_string($value) || is_int($value) ){
	 			$chaine_retour .= $key.':'.$value.',';
	 		}else{
	 			$chaine_retour .= $key.':'.json_encodeur($value).',';
	 		}
	 	}
	 	$chaine_retour[strlen($chaine_retour)-1] = '}';
		return $chaine_retour;
	 }
}




?>


