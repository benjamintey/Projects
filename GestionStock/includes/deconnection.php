<!DOCTYPE html>
<?php
session_start();
if (!empty($_SESSION['oUtilisateur']))
{
  unset($_SESSION['oUtilisateur']);
}
header('location:../Authentification.php');
?>
