<?php

require_once 'Cdao.php'; //classe outils

/* ************ Classe métier Cvisiteur et Classe de contrôle Cvisiteurs **************** */

class Cvisiteur
{

    public $id;
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $connecte; // champ qui n'est pas dans la base mais uniquement au niveau objet


    // Penser à commenter le constructeur pour le cas n°3 du constructeur de Cvisiteurs
    /* function __construct($sid,$slogin,$smdp,$snom,$sprenom)
    {

        $this->id = $sid;
        $this->login = $slogin;
        $this->mdp = $smdp;
        $this->nom = $snom;
        $this->prenom = $sprenom;
        $this->connecte = false;   // le visiteur est par défaut non connecté
    } */
}


class Cvisiteurs //extends CI_Model
{
    public $ocollVisiteurById;
    public $ocollVisiteurByLogin;

    //private static $instance = null;

    public function __construct()
    {
        //parent::__construct();
                  try {
                         /* $strConnection = 'mysql:host=localhost;dbname=gsb_frais'; // DSN
                         $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // demande format utf-8
                         $pdo = new PDO($strConnection, 'root', '', $arrExtraParam); // Instancie la connexion
                         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Demande la gestion d'exception car par défaut PDO ne la propose pas */

                         /* cas n°1 avec query */

                            /*
                             $query = 'SELECT id,login,mdp,nom,prenom from visiteur';
                             $lesVisiteurs = $pdo->query($query);                       
                             $this->ocollVisiteur = array();
                             foreach ($lesVisiteurs as $unVisiteur) {

                                //$ovisiteur = new Cvisiteur('1','testlogin','testmdp','testnom', 'testprenom'); 
                                //$this->ocollVisiteur['1'] = $ovisiteur;
                                $ovisiteur = new Cvisiteur($unVisiteur['id'],$unVisiteur['login'],$unVisiteur['mdp'],$unVisiteur['nom'],$unVisiteur['prenom']);
                                $this->ocollVisiteur[$unVisiteur['id']] = $ovisiteur;
                                
                            } 
                            
                            */
                        /* fin 1ER cas */

                        /* Cas n°2 avec fetchall sans parametre */

                        /*

                             $dao = new Cdao();

                             $query = 'SELECT id,login,mdp,nom,prenom from visiteur';

                             $lesVisiteurs =  $dao->getTabDataFromSql($query);

                             $this->ocollVisiteur = array();

                             foreach ($lesVisiteurs as $unVisiteur) {
                                
                                $ovisiteur = new Cvisiteur($unVisiteur['id'],$unVisiteur['login'],$unVisiteur['mdp'],$unVisiteur['nom'],$unVisiteur['prenom']);
                                $this->ocollVisiteur[$unVisiteur['id']] = $ovisiteur;
                                
                            }

                            unset($dao);
                            */

                        /* fin cas n° 2 */

                        /*Cas n°3 avec fetchall avec parametres permettant de mettre directement dans un objet de type Cvisiteur*/

                            
                             $dao = new Cdao();

                             $query = 'SELECT id,login,mdp,nom,prenom from visiteur';

                             $lesObjetsVisiteur =  $dao->getTabObjetFromSql($query,'Cvisiteur'); //le deuxieme parametre est le type d'objet qui sera créé

                             $this->ocollVisiteurById = array();
                             $this->ocollVisiteurByLogin = array();

                             foreach ($lesObjetsVisiteur as $ovisiteur) {

                               
                                $this->ocollVisiteurById[$ovisiteur->id] = $ovisiteur;
                                $this->ocollVisiteurByLogin[$ovisiteur->login] = $ovisiteur;
                                
                            }

                            unset($dao); 

                        /* fin cas n°3 */

                      }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }
   

    }
    //test
    /* Penser à un héritage si l'on gère plusieurs professionnels Comptable etc... */
    public function verifierInfosConnexion($unLogin, $unMdp) {  //Vérifier le login d'un visiteur est de la responsabilité de la classe de contrôle Cvisiteurs
        
       /* foreach ($this->ocollVisiteurById as $ovisiteur) {
            if($ovisiteur->login == $unLogin && $ovisiteur->mdp == $unMdp)
            {
                return $ovisiteur;
            }
        }*/
     
         /*$ok = array_key_exists($unLogin,$this->ocollVisiteurByLogin);
         if($ok){
         
         $ovisiteur = $this->ocollVisiteurByLogin["$unLogin"];
         return $ovisiteur;
        }
        return NULL;*/
        //@ permet de ne pas afficher le E_NOTICE (WARNING) sur la page en cas de non existence de la clef
        //Ce qui explique aussi que ce n'est pas une exception et donc pas de possibilité de gérer par TRY..CATCH
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


    public function getVisiteurById($sid)
    {
        
        return $this->ocollVisiteurById[$sid];
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


