<?php
session_start();
require_once ('../function/function.php');
require_once('../function/connexion.php');
global $bdd;

$sql = 'SELECT * FROM user WHERE profil = "admin"';
$userAdmin = $bdd->query($sql);
$admin_array = [];
while ($admin = $userAdmin->fetch()){
    if($admin['login'] === $_SESSION['login']){
        $admin_array[] = array(
            'id'=>$admin['id'],
            'prenom'=>$admin['prenom'],
            'nom'=>$admin['nom'],
            'login'=>$admin['login'],
            'password'=>$admin['password']
        );
    }
}
echo json_encode($admin_array);






