<?php
session_start();
require_once '../Classes/AccesBase.php';
$oAccesBase = new c_AccesBase();
$query = 'DELETE FROM `commentaire` WHERE ID ='.$_POST['supprimer'].' ';
$oAccesBase->delete($query);
header('location:../ConsultationCommentaires.php');
?>
