<?php
//$controller = "voiture";
require_once ("{$ROOT}{$DS}model{$DS}ModelVoiture.php"); // chargement du modèle

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des voitures";
        $view = "readAll";
       	$tab_u = ModelVoiture::getAll();//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "read":	
		if(isset($_REQUEST['immatriculation'])){
			$immatriculation = $_REQUEST['immatriculation'];
			$u = ModelVoiture::select($immatriculation);
				if($u!=null){
					$pagetitle = "Details de la voiture";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		
	case "delete":
		if(isset($_REQUEST['immatriculation'])){
			$ncin = $_REQUEST['immatriculation'];
			$del = ModelVoiture::select($immatriculation);
			if($del!=null){
			$del->delete($immatriculation);
			header('Location: index.php?controller=voiture&action=readAll');
			}
		}
	    break;
		
	case "create":
		$pagetitle = "Enregistrer une voiture";
	
		
		if (!isset($_SESSION["email"])) { 
			header("Location: index.php?controller=utilisateur&action=auth");
			
			 
			
		
			//$controller="utilisateur";
			//require_once ("{$ROOT}{$DS}model{$DS}ModelUtilisateur.php");
			//$view = "connexion";
			
		}
		else {
		$view = "create";}
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		
	case "created":
		if(isset($_REQUEST['immatriculation']) && isset($_REQUEST['marque']) && isset($_REQUEST['modele']) && isset($_REQUEST['annee'])&& isset($_REQUEST['prix_loc']) && isset($_REQUEST['date_validation_tech']) && isset($_REQUEST['boitevitesse']) && isset($_REQUEST['kilometrage'])  && isset($_REQUEST['puissance_fiscale']) && isset($_REQUEST['carburant']) && isset($_FILES['my_image']) && isset($_REQUEST['description'])){
			$immatriculation = $_REQUEST["immatriculation"];
			$marque = $_REQUEST["marque"];
			$modele = $_REQUEST["modele"];
			$annee = $_REQUEST["annee"];
			$date_validation_tech = $_REQUEST["date_validation_tech"]; 
			$boitevitesse = $_REQUEST["boitevitesse"];
			$kilometrage = $_REQUEST["kilometrage"];
			$prix_loc= $_REQUEST["prix_loc"];
			$puissance_fiscale = $_REQUEST["puissance_fiscale"];
			$carburant = $_REQUEST["carburant"];
			$description = $_REQUEST["description"];
			//Pour l'image : 
			$img_name = $_FILES['my_image']['name'];
			$img_size = $_FILES['my_image']['size'];
			$tmp_name = $_FILES['my_image']['tmp_name'];
			$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1250000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}
		else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				//nom de la variable contenant l'image est $image_voiture
				$image_voiture = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'assets/Images/'.$image_voiture;
				move_uploaded_file($tmp_name, $img_upload_path);
			}
		}
	}
            //$prop = $_REQUEST["prop"];
			
			$recherche = ModelVoiture::select($immatriculation);
			if($recherche==null){
				$u = new ModelVoiture($immatriculation, $marque, $modele, $annee,$date_validation_tech , NULL, $kilometrage, $puissance_fiscale, $carburant,$image_voiture, $description,$prix_loc,$_SESSION["id_utilisateur"]);	
				$tab = array(
				"immatriculation" => $immatriculation,
				"marque" => $marque,
				"modele" => $modele,
				"annee" => $annee,
				"date_validation_tech" => $date_validation_tech,
				"boitevitesse" => NULL,
				"kilometrage" => $kilometrage,
				"puissance_fiscale" => $puissance_fiscale,
				"carburant" => $carburant,
				"image_voiture"=>$image_voiture,
				"description" => $description,
				"prix_loc"=>$prix_loc,
				"utilisateur_id"=>$_SESSION["id_utilisateur"]
                //"proprietaire_ncin" => 
				);				
				$u->insert($tab);
				$pagetitle = "Voiture Enregistrée";
				$view = "created";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}	
		}
		break;
	
	case "update":
		if(isset($_REQUEST['immatriculation'])){
			$immatriculation = $_REQUEST['immatriculation'];
			$up = ModelVoiture::select($immatriculation);
			if($up!=null){
				$pagetitle = "Modifier la voiture ";
				$view = "update";
				require ("{$ROOT}{$DS}view{$DS}view.php");			
			}
			
		}
		break;
		
	case "updated":
		if(isset($_REQUEST['immatriculation']) && isset($_REQUEST['marque']) && isset($_REQUEST['modele']) && isset($_REQUEST['annee']) && isset($_REQUEST['boitevitesse']) && isset($_REQUEST['kilometrage'])  && isset($_REQUEST['puissance_fiscale']) && isset($_REQUEST['carburant']) && isset($_REQUEST['description'])){
			$oldnimm = $_REQUEST['immatriculation'];
			$tab = array(
				"immatriculation" => $immatriculation,
				"marque" => $marque,
				"modele" => $modele,
				"annee" => $annee,
				"boitevitesse" => $boitevitesse,
				"kilometrage" => $kilometrage,
				"puissance_fiscale" => $puissance_fiscale,
				"carburant" => $carburant,
				"description" => $description
                //"proprietaire_ncin" => 
				);
			$o = ModelVoiture::select($oldnimm);
			if($o!=null){
				$u = $o->update($tab, $oldnimm);		
				$pagetitle = "Voiture modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
}

?>
