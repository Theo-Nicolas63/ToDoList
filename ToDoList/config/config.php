<?php

$rep = __DIR__.'/../';
$erreur = '';

//Base de données

$dsn = 'mysql:host=localhost;dbname=dtache';
$username = 'maalbiero';
$password = 'maalbiero';

//Vues

$vues['erreur']='vue/erreur.php';
$vues['public']='vue/public.php';
$vues['connexion']='vue/Connexion.php';
$vues['prive']='vue/prive.php';
$vues['tache']='vue/Tache.php';