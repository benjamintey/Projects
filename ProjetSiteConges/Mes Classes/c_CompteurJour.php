<?php
require_once 'c_EtatJour.php';
class c_CompteurJour
{
  public $c_oVisiteur;
  public $c_oTypeconges;
  public $c_acquis;
  public $c_acquisutiliser;
  public $c_ECA;
  public $c_ECAutiliser;

  public function __construct($pOvisiteur, $poTypeConges, $pAcquis, $pAcquisUtiliser, $pECA, $pECAUtiliser)
  {
    $this->c_oVisiteur = $pOvisiteur;
    $this->c_oTypeconges = $poTypeConges;
    $this->c_acquis = $pAcquis;
    $this->c_ECA = $pECA;
    $this->c_acquisutiliser = $pAcquisUtiliser;
    $this->c_ECAutiliser = $pECAUtiliser;
  }
}
class c_CompteurJours
{
public $collCompteurJourVisiteur;

public function __construct($poVisiteur)
  {
    $dao = new Cdao();
    $query = 'SELECT * from compteurjour WHERE idVisiteur = "'.$poVisiteur->id.'";';
    $oTypeConges = new c_EtatJours();
    $CompteurJourVisiteur = $dao->getTabDataFromSql($query);
    foreach ($CompteurJourVisiteur as $CompteurUnTypeConges)
    {
      $oCompteurJour = new c_CompteurJour($poVisiteur, $oTypeConges->collEtatJours[$CompteurUnTypeConges['typeconges']], $CompteurUnTypeConges['acquis'], $CompteurUnTypeConges['acquisutiliser'], $CompteurUnTypeConges['ECA'],  $CompteurUnTypeConges['ECAutiliser']);
      $this->collCompteurJourVisiteur[$CompteurUnTypeConges['typeconges']] = $oCompteurJour;
    }
  }
}
?>
