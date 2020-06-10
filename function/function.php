<?php

require_once 'connexion.php';
global $bdd;
//Function link data base
function getdata($nameDB){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname='.$nameDB.'; charset=utf8', 'root', '');
    }
    catch (Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    return$bdd;
}
// Fonction pour la connexion
function connexion($log,$pwd){
    global $bdd;
    $user = $bdd->query('SELECT  * FROM user');
    while ($users = $user->fetch()){
    if(($users['login'] === $log) && ($users['password'] === $pwd)){
        $_SESSION['statut'] = 'logout';
        $_SESSION['nom'] = $users['nom'];
        $_SESSION['prenom'] = $users['prenom'];
        $_SESSION['login'] = $users['login'];
        if(isset($users['avatar'])){
            $_SESSION['avatar'] = $users['avatar'];
        }
        if($users['profil'] === 'admin'){
            return 'admin';
        }
        elseif ($users['profil'] === 'joueur'){
            return 'joueur';
        }
    }
    else{
        if($users['login'] !== $log && $users['password'] === $pwd ){
            return 'error_loging';
        }
        elseif ($users['login'] === $log && $users['password'] !== $pwd ){
            return 'error_pwd';
        }
    }
    }
}
// Verifier la connexion
function is_connecte(){
    if(!isset($_SESSION['statut'])){
        header('location: ./index.php');
    }
}
// Deconnexion
function deconnexion(){
    unset($_SESSION['statut']);
    unset($_SESSION['login']);
    unset($_SESSION['nom']);
    unset($_SESSION['prenom']);
    unset($_SESSION['photo']);
    unset($_SESSION['avatar']);
    // session_destroy();
}

//Creation Compte

function createCompte($prenom, $nom, $login, $password, $profil, $avatar){
    global $bdd;
    $user = $bdd->prepare('INSERT INTO user (prenom,nom,login,password,profil,avatar) 
VALUE (:prenom, :nom, :login, :password, :profil, :avatar)');
    $user->execute(array(
        'prenom'=>$prenom,
        'nom'=>$nom,
        'login'=>$login,
        'password'=>$password,
        'profil'=>$profil,
        'avatar'=>$avatar
    ));
}

//Fonction creation question

function createQuestion($question, $score){
    global $bdd;
    $questions = $bdd->prepare('INSERT INTO question(question,score)
            VALUE  (:question, :score)');
    $questions->execute(array(
        'question'=>$question,
        'score'=>$score
    ));
}
//Fonction creation reponses,
function createReponse($reponse, $juste, $id_question){
    global $bdd;
    $Reponses = $bdd->prepare('INSERT INTO reponse(reponse, juste, id_question)
        VALUE (:reponse, :juste, :id_question)');
    $Reponses->execute(array(
        'reponse'=>$reponse,
        'juste'=>$juste,
        'id_question'=>$id_question
    ));
}

// Enregistrer photo
function setPhoto($namefile, $login){
    $tailleMax = 2097152;
    $extentionsValides = array('jpeg', 'jpg', 'gif', 'png');
    if ($_FILES[$namefile]['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES[$namefile]['name'], '.'), 1));
        if (in_array($extensionUpload, $extentionsValides)) {
            $_SESSION['extensionUpload'] = $extensionUpload;
            if (isset($login)){
                $chemin = "./photo_avatar/". $login .".".$_SESSION['extensionUpload'];
                $resultat = move_uploaded_file($_FILES[$namefile]['tmp_name'], $chemin);
            }
            if ($resultat){
                $photo = $login . "." . $_SESSION['extensionUpload'];
            }
        }
    }
    if (isset($photo)) {
        return $photo;
    }
}

//Changer Avatar

function changerAvatar($photo, $login){
    global $bdd;
    $user = $bdd->prepare('UPDATE user SET avatar = :photo WHERE login = :login');
    $user->execute(array(
        'photo'=>$photo,
        'login'=>$login
    ));
}




