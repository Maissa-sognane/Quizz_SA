<?php
session_start();
require_once ('../function/function.php');
require_once('../function/connexion.php');
global $bdd;

if(empty($_POST['prenomPara']) || empty($_POST['nomPara']) ||
        empty($_POST['loginPara']) || empty($_POST['passwordPara'])){
        echo '<div class="alert alert-danger">Veuillez remplir tous les champs</div>';
    }
    else{
        $sql = "UPDATE user SET prenom = :prenom, nom = :nom, login = :login, password = :password WHERE id =".$_POST['idUser'];
        $userUpdate = $bdd->prepare($sql);
        $users = $userUpdate->execute(array(
            'prenom'=>$_POST['prenomPara'],
            'nom'=>$_POST['nomPara'],
            'login'=>$_POST['loginPara'],
            'password'=>$_POST['passwordPara']
        ));
        echo '<div class="alert alert-success">Modification réussi</div>';
    }



