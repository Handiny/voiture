<?php

require_once ("Model.php"); 
class ModelVoiture extends Model {
  private $immatriculation;
  private $marque;
  private $modele;
  private $annee;
  private $date_validation_tech;
  private $boitevitesse;
  private $kilometrage;
  private $puissance_fiscale;
  private $carburant;
  private $image_voiture;
  private $description;
  private $prix_loc;
  private $utilisateur_id;

  protected static $table = 'voiture';
  protected static $primary = 'immatriculation';
  


  
  public function getImmatriculation() {
       return $this->immatriculation;  
  }

  public function getMarque() {
    return $this->marque;
  }
  
  
  public function getModele() {
  return $this->modele;  
  }

  public function getAnnee() {
    return $this->annee;  
  }
  public function getDate_validation_tech() {
    return $this->date_validation_tech;  
  }
  public function getBoitevitesse() {
    return $this->boitevitesse;  
  }
  public function getKilometrage() {
    return $this->kilometrage;  
  }
  public function getPuissance_fiscale() {
    return $this->puissance_fiscale;  
  }
  public function getCarburant() {
    return $this->carburant;  
  }
  public function getImage_voiture() {
    return $this->image_voiture;  
  
  }public function getDescription() {
    return $this->description;  
  }
  public function getPrix_loc() {
    return $this->prix_loc;  
  }

  public function getUtilisateur_id() {
       return $this->utilisateur_id;  
  }
  
  
  /*public function __construct($immatriculation, $marque, $modele, $annee,$date_validation_tech , $boitevitesse, $kilometrage, $puissance_fiscale, $carburant,$image_voiture $description,$prix_loc,1) {
    if (!is_null($m) && !is_null($c) && !is_null($i)) {
      $this->marque = $m;
      $this->modele = $c;
      $this->immatriculation = $i;
	    $this->proprietaire_ncin=$p;
    }
  }*/    
}
?>
