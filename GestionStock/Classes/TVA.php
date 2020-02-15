<?php
require_once 'AccesBase.php';

class c_TVA
{
public $ID;
public $Taux;
public function __construct($p_ID, $p_Taux)
{
  $this->ID=$p_ID;
  $this->Taux=$p_Taux;
}

}
class c_oTVA
{
  public $collTauxTVA;
  public function __construct()
{
              try {
                $AccesBase = new c_AccesBase();

                $query = 'SELECT ID, Taux from tva';

                $lesTauxTVA =  $AccesBase->getTabDataFromSql($query);

                foreach ($lesTauxTVA as $unTauxTVA) {

                   $oTVA = new c_TVA($unTauxTVA['ID'], $unTauxTVA['Taux']);
                   $this->collTauxTVA[$unTauxTVA['ID']] = $oTVA;
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
