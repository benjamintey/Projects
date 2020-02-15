<?php
class c_EtatJour
{
  public $c_ID;
  public $c_nom;
  public $c_duree;
  public function __construct($pID, $pNom, $pDuree)
  {
    $this->c_ID = $pID;
    $this->c_nom = $pNom;
    $this->c_duree = $pDuree;
  }
}
class c_EtatJours
{
  public $collEtatJours;
  public function __construct()
  {
    try
    {
      $dao = new Cdao();
      $query = 'SELECT * from etatjour';
      $EtatsJours = $dao->getTabDataFromSql($query);
      foreach ($EtatsJours as $EtatJour)
        {
          $oEtatJour = new c_EtatJour($EtatJour['ID'], $EtatJour['nom'], $EtatJour['duree']);
          $this->collEtatJours[$EtatJour['ID']] = $oEtatJour;
        }
    }
    catch(PDOException $e)
    {
      $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
      die($msg);
    }


    unset($dao);
  }

  public function getEtatJourbyID($pIDEtatJour)
  {
    return $this->collEtatJours[$pIDEtatJour];
  }
}


 ?>
