<?php
is_connecte();
require_once './function/function.php';
require_once('./function/connexion.php');
global $bdd;
if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
    $photoName = $_FILES['avatar']['name'];
    $photoSize = $_FILES['avatar']['size'];
    $cheminInstant = $_FILES['avatar']['tmp_name'];
    $tailleMax = 2097152;
    $extentionsValides = array('jpeg', 'jpg', 'gif', 'png');
    if ($photoSize <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($photoName, '.'), 1));
        if (in_array($extensionUpload, $extentionsValides)) {
            $_SESSION['extensionUpload'] = $extensionUpload;
            if (isset($_SESSION['login'])) {
                $chemin = "photo_avatar/".$_SESSION['login']. "." . $_SESSION['extensionUpload'];
                $resultat = move_uploaded_file($cheminInstant, $chemin);
            }
            if ($resultat) {
                $photo = $_SESSION['login']. "." . $_SESSION['extensionUpload'];
                $user = $bdd->prepare('UPDATE user SET avatar = :photo WHERE login = :login');
                $user->execute(array(
                    'photo'=>$photo,
                    'login'=>$_SESSION['login']
                ));
            }
        }
    }

}
?>
<div class="container-fluid   h-auto" style="background-color: white; width: 95%">
    <div class="row mt-3">
        <div class="col-4">
            <div class="row mx-md-n3">
                <div class="col-6 px-md-5 photo-avatar">
                    <?php
                     if ($_SESSION['login']){
                         if(isset($_SESSION['avatar'])){
                             echo '<img id="output" class="mt-3" src="./photo_avatar/'.$_SESSION['avatar'].'">';
                         }
                         else{
                             echo '<img id="output" class="mt-3" src="../photo_avatar/A.jpg">';
                         }
                     }
                    ?>
                    <div class="icone-photo   position-relative">
                        <form  method="POST" enctype="multipart/form-data" name="myForm" id="myForm">
                            <div id="yourBtn" onclick="getFile()"><a><i class="fas fa-camera ml-3 mt-3"></i></a></div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'><button onchange="sub(this)"><input name="avatar" id="upfile" type="file" value="upload" accept="image/*"  onchange="loadFile(event)" /></button></div>
                        </form>
                    </div>
                </div>
                <div class="col-6 px-md-3">
                    <?php
                   // echo '<a href="?statut=logout"><button class="button-logout mt-3 btn  btn-lg">Déconnexion</button></a>';
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-4 user-nom">
                    <div class=" w-100 mt-1">
                        <?php echo  $_SESSION['prenom'] .' '. $_SESSION['nom'];?>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2 ml-lg-5" id="dashbord" >
                <a href="?lien=admin&menu=dashboard" class="">
                    <p class="m-2">
                        Dahsboard
                        <i class="fas fa-align-justify float-right"></i>
                    </p>
                </a>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2  ml-lg-5" id="liste-question">
                <a href="?lien=admin&menu=liste-question" class="">
                    <p class="m-2">
                        Liste question
                        <i class="fas fa-question-circle float-right"></i>
                    </p>
                </a>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2  ml-lg-5">
                <a href="?lien=admin&menu=creation-compte" class="">
                    <p class="m-2">
                        Creation Admin
                        <i class="fas fa-user-tie float-right"></i>
                    </p>
                </a>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2  ml-lg-5">
                <a href="?lien=admin&menu=creation-question" class="">
                    <p class="m-2">
                        Création questions
                        <i class="fas fa-plus-circle float-right"></i>
                    </p>
                </a>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2  ml-lg-5">
                <a href="?lien=admin&menu=liste-joueur" class="">
                    <p class="m-2">
                        Liste joueurs
                        <i class="fas fa-users float-right"></i>
                    </p>
                </a>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2  ml-lg-5">
                <a href="?lien=admin&menu=liste-admin" class="">
                    <p class="m-2">
                        Liste admin
                        <i class="fas fa-user-tie float-right"></i>
                    </p>
                </a>
            </div>
            <div class="d-flex flex-column menu pt-2 border mt-2  ml-lg-5">
                <a href="?lien=admin&menu=parametre" class="">
                    <p class="m-2">
                        Paramétres
                        <i class="fas fa-users-cog float-right"></i>
                    </p>
                </a>
            </div>


        </div>
        <div class="col-8" style="background-color: #F2F2F2">
            <?php
            if(empty($_GET['menu'])){
                require_once 'pages/dashboard.php';
            }
            if(!empty($_GET['menu'])){
                $page = $_GET['menu'];
                switch ($page){
                    case 'dashboard':
                        require_once 'pages/dashboard.php';
                        break;
                    case 'liste-question':
                        require_once 'pages/liste_question.php';
                        break;
                    case 'liste-admin':
                        require_once 'pages/liste_admin.php';
                        break;
                    case 'liste-joueur';
                        require_once 'pages/liste_joueur.php';
                        break;
                    case 'creation-compte';
                        require_once 'pages/creation_compte.php';
                        break;
                    case 'creation-question';
                        require_once 'pages/creation-question.php';
                        break;
                    case 'parametre':
                        require_once 'pages/parametre.php';
                }
            }


            ?>
        </div>
    </div>
</div>


