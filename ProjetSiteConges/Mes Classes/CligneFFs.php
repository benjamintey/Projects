<?php
require_once 'Cvisiteurs.php';
class CligneFF
{
    public $oVisiteur;
    public $mois;
    public $idFraisForfait;
    public $quantite;
    public function __construct($poVisiteur, $pmois, $pidFraisForfait, $pquantite)
    {
      $this->oVisiteur =$poVisiteur;
      $this->mois =$pmois;
      $this->idFraisForfait =$pidFraisForfait;
      $this->quantite =$pquantite;
    }
}
class CligneFFs
{
    public $oCollLigneFraisForfait;

    public function __construct()
    {
        try
        {
        $odao = new Cdao();

        $query = 'SELECT * FROM lignefraisforfait';

        $tabLigneFrais= $odao->getTabDataFromSql($query);

        $this->oCollLigneFraisForfait = array();
        $oVisiteurs = new Cvisiteurs();
            foreach($tabLigneFrais as $tabLF)
            {
              $l_Visiteur = $oVisiteurs->getVisiteurById($tabLF['idVisiteur']);
              $oLigneFF = new CligneFF($l_Visiteur, $tabLF['mois'], $tabLF['idFraisForfait'], $tabLF['quantite']);

              $this->oCollLigneFraisForfait[] = $oLigneFF;
            }
            unset($odao);
        }
        catch (PDOException $e)
        {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
        }
    }

    public function verifExistLFFByIdVisiteurMois($sidVisiteur) //verifie l'existence des 4 lignes à 0
    {
        $mois = getAnneeMois();
        $lFFexist = false;
        foreach($this->oCollLigneFraisForfait as $oLigneFF)
        {
            if($oLigneFF->oVisiteur->id == $sidVisiteur && $oLigneFF->mois == $mois)
            {
                 $lFFexist = true; //Si une est rencontrée alors les autres le sont aussi donc break
                 break;
            }
        }
        if(!$lFFexist)
        {
            $this->insertLigneFF();
        }
    }

    public function getLFFByIdVisiteurMois($sidVisiteur)
    {
        $ocollLFFbyIdVisiteurMois = array();
        $mois = getAnneeMois();
        foreach($this->oCollLigneFraisForfait as $oLigneFF)
        {
            if($oLigneFF->oVisiteur->id == $sidVisiteur && $oLigneFF->mois == $mois)
            {
                $ocollLFFbyIdVisiteurMois[] = $oLigneFF;
            }
        }

        return $ocollLFFbyIdVisiteurMois;
    }



    public function insertLigneFF() //insertion première fois => après par UpDate
    {
        $odao = new Cdao();
        $oVisiteur = unserialize($_SESSION['ovisiteur']);
        $query = "INSERT INTO lignefraisforfait values('" . $oVisiteur->id . "', '" . date('Ym') . "', 'ETP', '0')";
        $odao->insertion($query);
         $query = "INSERT INTO lignefraisforfait values('" . $oVisiteur->id . "', '" . date('Ym') . "', 'KM', '0')";
        $odao->insertion($query);
         $query = "INSERT INTO lignefraisforfait values('" . $oVisiteur->id . "', '" . date('Ym') . "', 'NUI', '0')";
        $odao->insertion($query);
         $query = "INSERT INTO lignefraisforfait values('" . $oVisiteur->id . "', '" . date('Ym') . "', 'REP', '0')";
        $odao->insertion($query);
        unset($odao);
    }

    public function updateLigneFF($squantite,$sidFF)
    {
        $odao = new Cdao();
        $oVisiteur = unserialize($_SESSION['ovisiteur']);
        $mois = getAnneeMois();

         $query = "update lignefraisforfait set quantite=".$squantite." where mois='".$mois."'"." and idVisiteur='".$oVisiteur->id."'"." and idFraisForfait='".$sidFF."'";
         $odao->update($query);
         unset($odao);
    }
}
