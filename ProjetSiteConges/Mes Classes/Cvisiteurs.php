<?php
require_once 'Cemploye.php';
class Cvisiteur extends Cemploye
{
  public $admin;
    public function __construct($sid, $slogin, $smdp, $snom, $sprenom, $sadmin)
    {
	     parent::__construct($sid, $slogin, $smdp, $snom, $sprenom);
       $this->admin = $sadmin;
    }
}

class Cvisiteurs
{
    public $ocollVisiteurById;
    public $ocollVisiteurByLogin;

    public function __construct()
    {
                  try {
                             $dao = new Cdao();

                             $query = 'SELECT id,login,mdp,nom,prenom,admin from visiteur';

                             $lesVisiteurs =  $dao->getTabDataFromSql($query);

                             $this->ocollVisiteurByLogin = array();

                             foreach ($lesVisiteurs as $unVisiteur) {

                                $ovisiteur = new Cvisiteur($unVisiteur['id'],$unVisiteur['login'],$unVisiteur['mdp'],$unVisiteur['nom'],$unVisiteur['prenom'], $unVisiteur['admin']);
                                $this->ocollVisiteurByLogin[$unVisiteur['login']] = $ovisiteur;
                                $this->ocollVisiteurById[$unVisiteur['id']] = $ovisiteur;

                            }

                            unset($dao);

                      }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }


    }
    //test
    /* Penser à un héritage si l'on gère plusieurs professionnels Comptable etc... */
    public function verifierInfosConnexion($unLogin, $unMdp) {  //Vérifier le login d'un visiteur est de la responsabilité de la classe de contrôle Cvisiteurs

        $ovisiteur = @$this->ocollVisiteurByLogin["$unLogin"];
        if($ovisiteur == NULL)
        {
            return null;
        }
        if($ovisiteur->mdp == $unMdp){
            return $ovisiteur;
        }
        return null;

    }

    public function getVisiteurById($id)
    {

        return $this->ocollVisiteurById[$id];
    }

    public function getVisiteurByLogin($login)
    {

        return $this->ocollVisiteurByLogin[$login];
    }

    public function getCollVisiteurByLogin()
    {

        return $this->ocollVisiteurByLogin;
    }

}
