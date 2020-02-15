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
}

class CficheFraiss
{
    public $ocollFicheFrais;
    
    public function __construct() 
    {
        $odao = new Cdao();
        
        $query = 'SELECT * FROM fichefrais';
        
        $oFicheFrais = $odao->getTabObjetFromSql($query, 'CficheFrais');
        
        $this->ocollFicheFrais = array();
        
        foreach($oFicheFrais as $oficheFrais)
        {
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
