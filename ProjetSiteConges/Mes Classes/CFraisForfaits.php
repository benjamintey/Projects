<?php

require_once 'Cdao.php';

class CFraisForfait
{
    public $id;
    public $libelle;
    public $montant;
}
class cFraisForfaits
{
    public $ocollFraisForfaitById;
    public function __construct()
{
try
    {

         $dao = new Cdao();

         $query = 'SELECT * from fraisforfait';

         $lesObjetsFraisForfait =  $dao->getTabObjetFromSql($query,'CFraisForfait'); //le deuxieme parametre est le type d'objet qui sera créé

         $this->ocollFraisForfaitById = array();

         foreach ($lesObjetsFraisForfait as $ofraisforfait)
            {
                $this->ocollFraisForfaitById[$ofraisforfait->id] = $ofraisforfait;
            }

        unset($dao);

}
catch(PDOException $e)
    {
     $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
     die($msg);
    }


}
}
