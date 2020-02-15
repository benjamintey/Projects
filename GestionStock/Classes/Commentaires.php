<?php
require_once 'AccesBase.php';
require_once 'Utilisateur.php';

class c_Commentaire
{
  public $ID;
  public $commentaire;
  public $oUtilisateur;
  public $reponse;
  public function __construct($p_ID, $p_commentaire, $p_IDutilisateur, $p_reponse)
  {
    $this->ID=$p_ID;
    $this->commentaire=$p_commentaire;
    $this->oUtilisateur=$p_IDutilisateur;
    $this->reponse=$p_reponse;
  }
}
class c_oCommentaires
{
  public $collCommentaires;
  public function __construct()
{
              try {
                $AccesBase = new c_AccesBase();
                $oUtilisateur = new c_oUtilisateur();

                $query = 'SELECT * from commentaire';

                $lesCommentaires =  $AccesBase->getTabDataFromSql($query);

                foreach ($lesCommentaires as $unCommentaire) {

                   $oCommentaire = new c_Commentaire($unCommentaire['ID'], $unCommentaire['commentaire'], $oUtilisateur->collUtilisateurByID[$unCommentaire['IDutilisateur']], $unCommentaire['reponse']);
                   $this->collCommentaires[$unCommentaire['ID']] = $oCommentaire;
               }

               unset($AccesBase);

         }
     catch(PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
           }
              }
}
?>
