<?php
require_once 'AccesBase.php';
require_once 'TVA.php';
require_once 'Categories.php';

class c_Produit
{
  public $Reference;
  public $Libelle;
  public $oCategorie;
  public $Marque;
  public $Quantite;
  public $Prix;
  public $oTVA;
  public $Description;
  public function __construct($p_Reference, $p_Libelle, $p_oCategorie, $p_oMarque, $p_Quantite, $p_Prix, $p_oTVA, $p_Description)
  {
    $this->Reference=$p_Reference;
    $this->Libelle=$p_Libelle;
    $this->oCategorie=$p_oCategorie;
    $this->oMarque=$p_oMarque;
    $this->Quantite=$p_Quantite;
    $this->Prix=$p_Prix;
    $this->oTVA=$p_oTVA;
    $this->Description=$p_Description;
  }
}

class c_oProduits
{
  public $collProduits;
  public function __construct()
{
              try {
                $AccesBase = new c_AccesBase();
                $oTVA = new c_oTVA();
                $oCategorie = new c_oCategories();
                $oMarques = new c_oMarques();
                $query = 'SELECT Reference, Libelle, Categorie, Marque, Quantite, Prix, TVA, Description from produits';

                $lesProduits =  $AccesBase->getTabDataFromSql($query);

                foreach ($lesProduits as $unProduits) {

                   $oProduit = new c_Produit($unProduits['Reference'], $unProduits['Libelle'], $oCategorie->collCategories[$unProduits['Categorie']], $oMarques->collMarques[$unProduits['Marque']], $unProduits['Quantite'], $unProduits['Prix'], $oTVA->collTauxTVA[$unProduits['TVA']], $unProduits['Description']);
                   $this->collProduits[$unProduits['Reference']] = $oProduit;
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
