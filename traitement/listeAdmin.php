<?php
require_once '../function/connexion.php';
global $bdd;
/*
$limit = $_POST['limit'];
$offset = $_POST['offset'];
$sql = 'SELECT * FROM user
        WHERE profil = "admin"
        ORDER  BY id ASC
        LIMIT '.$offset.' , '.$limit.' ';
$req = $bdd->query($sql);
$resultat = $req->fetchAll(2);
echo json_encode($resultat);*/



$rowid = $_POST['rowid'];
$rowperpage = $_POST['rowperpage'];

/* Count total number of rows */
$query = 'SELECT count(*) as allcount FROM user WHERE profil = "admin" ';
$result = $bdd->query($query) ;
$fetchresult = $result->fetch();
$allcount = $fetchresult['allcount'];

/* Selecting rows */
$query = 'SELECT * FROM user WHERE profil = "admin" ORDER BY id ASC LIMIT '.$rowid.','.$rowperpage;

$result = $bdd->query($query);

$employee_arr = array();
$employee_arr[] = array("allcount" => $allcount);

while($row = $result->fetch()){
    $id = $row['id'];
    $prenom = $row['prenom'];
    $nom = $row['nom'];
    $login = $row['login'];

    $employee_arr[] = array("id" => $id,"prenom" => $prenom,"nom" => $nom, "login"=>$login);
}

/* encoding array to JSON format */
echo json_encode($employee_arr);


        
