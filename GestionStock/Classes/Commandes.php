<?php
require_once 'AccesBase.php';
require_once 'Produits.php';
require_once 'Utilisateur.php';

class c_Commande
{
  public $oUtilisateur;
  public $oProduit;
  public $Date;
  public $Prix;
  public $ID;
  public $Quantite;
  public function __construct($p_Mailutilisateur, $p_IDproduit, $p_Date, $p_Prix, $p_ID, $p_Quantite)
  {
    $this->Outilisateur=$p_Mailutilisateur;
    $this->oProduit=$p_IDproduit;
    $this->Date=$p_Date;
    $this->Prix=$p_Prix;
    $this->ID=$p_ID;
    $this->Quantite=$p_Quantite;
  }
}
class c_oCommandes
{
  public $collCommandes;
  public function __construct()
{
              try {
                $AccesBase = new c_AccesBase();
                $oProduit = new c_oProduits();
                $oUtilisateur = new c_oUtilisateur();
                $query = 'SELECT * from commandes';

                $lesCommandes =  $AccesBase->getTabDataFromSql($query);

                foreach ($lesCommandes as $uneCommande) {

                   $oCommande = new c_Commande( $oUtilisateur->collUtilisateur[$uneCommande['Mailutilisateur']], $oProduit->collProduits[$uneCommande['IDproduit']], $uneCommande['Date'], $uneCommande['Prix'], $uneCommande['ID'], $uneCommande['Quantite']);
                   $this->collCommandes[$uneCommande['ID']] = $oCommande;
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
