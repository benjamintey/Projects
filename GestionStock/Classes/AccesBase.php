<?php

class c_AccesBase
{

    private function getObjetPDO()
    {

        $strConnection = 'mysql:host=localhost;dbname=gestionstock'; // DSN
        $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // demande format utf-8
        $pdo = new PDO($strConnection, 'root', '', $arrExtraParam); // Instancie la connexion
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Demande la gestion d'exception car par défaut PDO ne la propose pas

        return $pdo;
    }

    public function getTabObjetFromSql($squery, $stype) // $stype sera le type d'objet que l'on désire
    {
       $lepdo = $this->getObjetPDO();

       //$query = 'SELECT id,login,mdp,nom,prenom from visiteur';
       $sth = $lepdo->prepare($squery); //prepare echappe entre autre proprement la requete
       $sth->execute();

       $result = $sth->fetchAll(PDO::FETCH_CLASS, $stype); // fetchall met toutes les données dans un tableau d'objets du type en paramètre
       unset($lepdo);
       return $result; //$result est un tableau d'objet du type en parametre comportant tous les objets du type (All de fetchAll)

    }

    public function getTabDataFromSql($squery)
    {
       $lepdo = $this->getObjetPDO();

       //$query = 'SELECT id,login,mdp,nom,prenom from visiteur';
       $sth = $lepdo->prepare($squery);
       $sth->execute();

       $result = $sth->fetchAll(); // fetchall met toutes les données dans un tableau de tableau associatif (type dictionnaire)
       //unset($lepdo);
       return $result; //$result est un tableau de tableaux associatifs

    }

    public function insertion($squery) //fera une insertion dans la base en fonction de la requete recue en parametre
    {
             $lepdo = $this->getObjetPDO();

             $sth = $lepdo->prepare($squery);
             $sth->execute();
             unset($lepdo);

    }

    public function update($squery) //fera une mise à jour dans la base en fonction de la requete recue en parametre
    {
             $lepdo = $this->getObjetPDO();

             $sth = $lepdo->prepare($squery);
             $sth->execute();
             unset($lepdo);

    }

    public function delete($squery)
    {
       $lepdo = $this->getObjetPDO();

       $sth = $lepdo->prepare($squery);
       $sth->execute();
       unset($lepdo);

    }


}
