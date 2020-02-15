<?php
session_start();
require_once '../Classes/AccesBase.php';
require_once '../Classes/Produits.php';
require_once '../Classes/Marques.php';
$oAccesBase = new c_AccesBase();
$oProduit = new c_oProduits();
$oCollProduit = $oProduit->collProduits;
foreach ($oCollProduit as $unProduit)
{
    if ($unProduit->Reference == $_POST['supprimer'])
    {
      if ($unProduit->Quantite == 0)
      {
        $query = 'DELETE FROM `produits` WHERE reference ='.$_POST['supprimer'].' ';
        $oAccesBase->delete($query);
      }
      else
      {
        $_SESSION['error'] = "Vous ne pouvez pas supprimer un produit si sa quantité n'est pas de 0";
      }
    }
}
header('location:../GererProduits.php');
?>
