<?php
require_once 'Cdao.php';

class CficheFrais
{
  public $idVisiteur;
  public $mois;
  public $nbJustificatifs;
  public $montantValide;
  public $dateModif;
  public $idEtat;

  public function __construct($pidVisiteur, $pmois, $pnbJustificatifs, $pmontantValide, $pdateModif, $pidEtat)
  {
    $this->idVisiteur =$pVisiteur;
    $this->mois =$pmois;
    $this->nbJustificatifs =$pnbJustificatifs;
    $this->montantValide =$pmontantValide;
    $this->dateModif =$pdateModif;
    $this->idEtat =$pidEtat;
  }
}

class CficheFraiss
{
    public $ocollFicheFrais;

    public function __construct()
    {
        $odao = new Cdao();

        $query = 'SELECT * FROM fichefrais';

        $oTabFicheFrais = $odao->getTabDataFromSql($query);

        $this->ocollFicheFrais = array();

        foreach($oTabFicheFrais as $tabficheFrais)
        {
          $oficheFrais = new CficheFrais($tabficheFrais['idVisiteur'], $tabficheFrais['mois'], $tabficheFrais['$nbJustificatifs'], $tabficheFrais['montantValide'], $tabficheFrais['dateModif'], $tabficheFrais['idEtat']);

          $this->ocollFicheFrais[] = $oficheFrais;
        }
        unset($odao);
    }

    public function verifFicheFrais($sidVisiteur)
    {
        $oFicheFraisByIdVisiteur = null;
        foreach($this->ocollFicheFrais as $oficheFrais)
        {
            if($oficheFrais->idVisiteur == $sidVisiteur && $oficheFrais->mois == getAnneeMois())
            {
                $oFicheFraisByIdVisiteur = $oficheFrais;
            }
        }
        if($oFicheFraisByIdVisiteur == null)
        {
            $this->insertFicheFrais($sidVisiteur);
        }
    }

    public function insertFicheFrais($sidVisiteur)
    {
        $odao = new Cdao();
        $mois = getAnneeMois();
        $query = "INSERT INTO fichefrais (idVisiteur, mois, idEtat) VALUES ('" . $sidVisiteur . "', '" . $mois . "', 'CR')";

        $odao->insertion($query);
        unset($odao);
    }
}
