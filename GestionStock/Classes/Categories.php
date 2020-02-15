<?php
require_once 'AccesBase.php';

class c_Categories
{
  public $ID;
  public $Libelle;
  public function __construct($p_ID, $p_Libelle)
  {
    $this->ID=$p_ID;
    $this->Libelle=$p_Libelle;
  }
}
class c_oCategories
{
  public $collCategories;
  public function __construct()
{
              try {
                $AccesBase = new c_AccesBase();

                $query = 'SELECT ID, Libelle from categories';

                $lesCategories =  $AccesBase->getTabDataFromSql($query);

                foreach ($lesCategories as $uneCategorie) {

                   $oCategorie = new c_Categories($uneCategorie['ID'], $uneCategorie['Libelle']);
                   $this->collCategories[$uneCategorie['ID']] = $oCategorie;
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
