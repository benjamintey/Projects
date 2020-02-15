<?php
require_once 'AccesBase.php';

class c_Utilisateur
{
public $nom;
public $prenom;
public $mail;
public $telephone;
public $adresse;
public $mdp;
public $sexe;
public $situation;
public $datenaissance;
public $ID;
public $Manager;
    public function __construct($p_nom, $p_prenom, $p_mail, $p_telephone, $p_adresse, $p_mdp, $p_sexe, $p_situation, $p_datenaissance, $p_ID, $p_Manager)
{
     $this->nom = $p_nom;
     $this->prenom = $p_prenom;
     $this->mail = $p_mail;
     $this->telephone = $p_telephone;
     $this->adresse = $p_adresse;
     $this->mdp = $p_mdp;
     $this->sexe = $p_sexe;
     $this->situation = $p_situation;
     $this->datenaissance = $p_datenaissance;
     $this->ID = $p_ID;
     $this->Manager = $p_Manager;
}
}
class c_oUtilisateur
{
  public $collUtilisateur;
  public $collUtilisateurByID;
  public function __construct()
{
              try {
                         $oAccesBase = new c_AccesBase();

                         $query = 'SELECT Nom,Prenom,Mail,Telephone,Adresse,Mdp,Sexe,Situation,DateNaissance,ID,Manager from utilisateurs';

                         $lesUtilisateurs =  $oAccesBase->getTabDataFromSql($query);

                         foreach ($lesUtilisateurs as $unUtilisateur) {

                            $oUtilisateur = new c_Utilisateur($unUtilisateur['Nom'], $unUtilisateur['Prenom'], $unUtilisateur['Mail'], $unUtilisateur['Telephone'],
                            $unUtilisateur['Adresse'], $unUtilisateur['Mdp'], $unUtilisateur['Sexe'], $unUtilisateur['Situation'], $unUtilisateur['DateNaissance'], $unUtilisateur['ID'], $unUtilisateur['Manager']);
                            $this->collUtilisateur[$unUtilisateur['Mail']] = $oUtilisateur;
                            $this->collUtilisateurByID[$unUtilisateur['ID']] = $oUtilisateur;
                        }

                        unset($oAccesBase);

                  }
              catch(PDOException $e) {
                     $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                     die($msg);
                    }


}

public function verifierInfosConnexion($pMail, $pMdp) {

    $oUtilisateur = @$this->collUtilisateur["$pMail"];
    if($oUtilisateur == NULL)
    {
        return null;
    }
    if($oUtilisateur->mdp == $pMdp){
        return $oUtilisateur;
    }
    return null;

}
}
?>
