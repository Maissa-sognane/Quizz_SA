<?php
require_once '../function/connexion.php';
global $bdd;
$id = $_POST['id'];

$sql = 'DELETE  FROM user WHERE profil = "admin" AND id = '.$id;
$req = $bdd->query($sql);
$resultat = $req->fetch();
echo $resultat;