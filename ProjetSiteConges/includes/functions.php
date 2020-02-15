<?php

function getDb()
{
    return new PDO("mysql:host=localhost;dbname=gsb_frais;charset=utf8", "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
}

function getAnneeMois()
{
    return date("Ym");
}

 function prepareChaineHtml($schaine)
 {
     //return trim(htmlspecialchars($schaine));
     //$text = htmlentities($chaine, ENT_NOQUOTES, "UTF-8");
     //$text = htmlspecialchars_decode($text, ENT_NOQUOTES, "UTF-8");
     $text = utf8_decode($schaine); //$schaine est en utf8 et va etre mis en iso
     return $text;
 }
 
 function moisEnFrancais($schaine)
 {
     $lesMois = array(
         
         'January'   => 'Janvier',
         'February'  => 'Février',
         'March'     => 'Mars',
         'April'     => 'Avril',
         'May'       => 'Mai',
         'June'      => 'Juin',
         'July'      => 'Juillet',
         'August'    => 'Août',
         'September' => 'Septembre',
         'October'   => 'Octobre',
         'November'  => 'Novembre',
         'December'  => 'Décembre',      
     );
     
     return $lesMois[$schaine];
 }
 
 /*
 function filtre_int_get($item)
 {
     return $reponse = filter_var($item, FILTER_VALIDATE_INT); // retourne soit false ou la valeur entière
         
 }*/
    


?>

