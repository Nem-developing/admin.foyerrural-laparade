<?php
session_start();

if(!isset($_SESSION['utilisateur'])) {
  header('Location: ./connexion.php');
  exit();
}
?> 
<!DOCTYPE html>
<!--
Projet réalisé par Nem-developing, tout droits réservés.
-->