<?php
require_once 'AccesBase.php';

class c_Marque
{
  public $ID;
  public $Libelle;
  public function __construct($p_ID, $p_Libelle)
  {
    $this->ID=$p_ID;
    $this->Libelle=$p_Libelle;
  }
}
class c_oMarques
{
  public $collMarques;
  public function __construct()
{
              try {
                $AccesBase = new c_AccesBase();

                $query = 'SELECT ID, Libelle from marques';

                $lesMarques =  $AccesBase->getTabDataFromSql($query);

                foreach ($lesMarques as $uneMarque) {

                   $oMarque = new c_Marque($uneMarque['ID'], $uneMarque['Libelle']);
                   $this->collMarques[$uneMarque['ID']] = $oMarque;
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
