<!DOCTYPE html>
<?php
session_start();
$_SESSION['page'] = "SaisieFicheFrais";
require_once 'includes/head.php';
require_once 'Mes Classes/CficheFrais.php';
require_once 'Mes Classes/Cvisiteurs.php';
require_once 'Mes Classes/CligneFHFs.php';
require_once 'Mes Classes/CligneFFs.php';
require_once 'Mes Classes/cFraisForfaits.php';
require_once 'includes/functions.php';
require_once 'includes/navBar.php';

    $ovisiteur = unserialize($_SESSION['ovisiteur']);
    if($ovisiteur == NULL)
        {
            header('location:seConnecter.php');
        }
    $formAction = $_SERVER['PHP_SELF'];
    require_once 'includes/form_FF.php';
    require_once 'includes/form_FHF.php';
    require_once 'includes/afficheFHF.php';

?>

<html>

</html>
