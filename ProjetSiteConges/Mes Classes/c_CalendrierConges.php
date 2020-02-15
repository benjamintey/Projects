<?php
require_once 'Cvisiteurs.php';
require_once 'c_EtatJour.php';
class c_CalendrierConges
{
public $c_date;
public $c_ovisiteur;
public $c_oetat;
  public function __construct($pDate, $pOvisiteur, $pEtat)
  {
    $this->c_date = $pDate;
    $this->c_ovisiteur = $pOvisiteur;
    $this->c_oetat = $pEtat;
  }
}
class c_CalendrierCongess
{
  public $collEtatJourVisiteur;
  public function __construct($poVisiteur)
  {
    try
    {
      $dao = new Cdao();
      $query = 'SELECT * from calendrierconges WHERE idVisiteur = "'.$poVisiteur->id.'";';
      $oc_EtatJour = new c_EtatJours();
      $LesEtatsJours = $dao->getTabDataFromSql($query);
      foreach ($LesEtatsJours as $unEtatJour)
        {
          $oEtatJour = new c_CalendrierConges($unEtatJour['jour'], $poVisiteur, $oc_EtatJour->collEtatJours[$unEtatJour['etatjour']]);
          $this->collEtatJourVisiteur[$unEtatJour['jour']] = $oEtatJour;
        }
    }
    catch(PDOException $e)
    {
      $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
      die($msg);
    }


    unset($dao);
  }



}

 ?>
