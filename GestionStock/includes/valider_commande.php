<?php
session_start();
require_once '../Classes/Produits.php';
require_once '../Classes/Commandes.php';
require_once '../Classes/Marques.php';
require_once '../Classes/AccesBase.php';
require_once '../Classes/Utilisateur.php';
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);

$oProduit = new c_oProduits();
$erreur = false;
foreach($_POST as $key => $value)
{
  foreach ($oProduit->collProduits as $unProduit)
  {
    if ($key == $unProduit->Reference && $value > $unProduit->Quantite )
    {
      $erreur = true;
    }
  }
}
if ($erreur == true)
{
  $_SESSION['erreur']='Une quantité selectionner est supérieur a la quantité disponible';
  header('location:../GestionCommande.php');
}
else
{
  $oAccesBase = new c_AccesBase();
  $collIDcommande;
  foreach($_POST as $key => $value)
  {
    foreach ($oProduit->collProduits as $unProduit)
    {
      if ($key == $unProduit->Reference  && $value != '')
      {
        $prix = 0;
        $prix = $prix + $unProduit->Prix * $value;
        $newquantite = $unProduit->Quantite - $value;
        $query = 'UPDATE produits SET Quantite ="'.$newquantite.'" WHERE Reference = "'.$key.'"';
        $oAccesBase->update($query);
        $query = "SELECT `AUTO_INCREMENT`FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'gestionstock' AND   TABLE_NAME   = 'commandes';";//recupere la valeur de l'auto increment soit l'ID de la commande qui va etre creer
        $ValAutoIncr = $oAccesBase->getTabDataFromSql($query);
        $query = 'INSERT INTO commandes VALUES ("'.$oUtilisateur->mail.'","'.$key.'","'.date("Y-m-d").'","'.$prix.'",DEFAULT,"'.$value.'")';
        $oAccesBase->insertion($query);
        foreach ($ValAutoIncr as $val)
        {
          $collIDcommande[$val['AUTO_INCREMENT']] = $val['AUTO_INCREMENT'];//creer une collection contenant les ID des commandes passé
        }
      }
    }
  }
  $_SESSION['collIDcommande'] = serialize($collIDcommande);//creer une variable de session contenant la collection des ID commandes afin de transmettre les données a Facture.php
  header('location:../Facture.php');
}


 ?>
