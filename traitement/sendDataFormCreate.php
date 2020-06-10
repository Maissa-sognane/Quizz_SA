<?php
session_start();
require_once ('../function/function.php');
require_once('../function/connexion.php');

$msg = '';
$msg_sucess = '';
$existe = '';
$photo = '';
$profil = $_POST['profil'];
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['login']) ||
        empty($_POST['password']) || empty($_POST['password2'])){
        echo '<div class="alert alert-danger">Tous les champs sont obligatoire</div>';
    }else{
        $existe = '';
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $photo = '';
        $user = $bdd->query('SELECT login FROM user');
        while ($users = $user->fetch()){
            if($login === $users['login']){
                $existe = true;
                break;
            }
        }
        if($existe === true){
            echo '<div class="alert alert-danger">Login existe</div>';
        }
        else{
            if($password != $password2){
                echo '<div class="alert alert-danger">Les deux mots de pass ne sont pas identiques</div>';
            }
            else{
                if (isset($_FILES['avatars']) && !empty($_FILES['avatars']['name'])) {

                    $photoName = $_FILES['avatars']['name'];
                    $photoSize = $_FILES['avatars']['size'];
                    $cheminInstant = $_FILES['avatars']['tmp_name'];

                    $tailleMax = 2097152;
                    $extentionsValides = array('jpeg', 'jpg', 'gif', 'png');
                    if ($photoSize <= $tailleMax) {
                        $extensionUpload = strtolower(substr(strrchr($photoName, '.'), 1));
                        if (in_array($extensionUpload, $extentionsValides)) {
                            $_SESSION['extensionUpload'] = $extensionUpload;
                            if (isset($login)) {
                                $chemin = "../photo_avatar/" . $login . "." . $_SESSION['extensionUpload'];
                                $resultat = move_uploaded_file($cheminInstant, $chemin);
                            }
                            if ($resultat) {
                                $photo = $login . "." . $_SESSION['extensionUpload'];
                            }
                        }
                    }
                }

                createCompte($prenom, $nom, $login, $password, $profil, $photo);
                echo '<div class="alert alert-success">';
                echo  $login;
                echo ' ajouté avec succés</div>';
            }
        }
}
?>
