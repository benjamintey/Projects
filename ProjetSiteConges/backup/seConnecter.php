<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <?php 
    require_once 'includes/head.php';
    require_once 'navBar.php';    
    require_once 'Mes Classes/Cvisiteurs.php';
    require_once 'includes/functions.php';
    ?>
    
    <body>
        
    <?php 
        $formAction = "seConnecter.php";
        require_once 'includes/form_login.php'; 
        require_once 'includes/gestion-erreur.php';

    ?>
    </body>
</html>
        
        
       

