<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0  shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon" href="Images/logo-QuizzSA.png">
    <noscript>
        <p>
            Please enable JavaScript to use file uploader.</p>
        <!-- or put a simple form for upload here -->
    </noscript>
</head>
<body style=" background-image: url('Images/image.jpg');">
<header>
    <nav class="navbar">
        <img class="" src="Images/logo-QuizzSA.png" alt="">
        <div class="mx-auto">
            <h1 style="color: white">LE PLAISIR DE JOUER</h1>
        </div>
        <div class="">
            <?php
            if(isset($_SESSION['statut']) && !isset($_GET['statut'])) {
               echo '<a href="?statut=logout"><button class="button-logout  btn  ">Déconnexion</button></a>';
            }

            ?>
        </div>
    </nav>
</header>
<div class="">
<?php
require_once 'function/function.php';

if(isset($_GET['lien'])){
    $lien = $_GET['lien'];
    switch ($lien){
        case 'admin':
            require_once 'pages/home_admin.php';
            break;
        case 'joueur':
            require_once 'pages/home_joueur.php';
            break;
        case 'inscription':
            require_once 'pages/inscription.php';
            break;
    }
}
else{
    if(isset($_GET['statut']) && $_GET['statut'] === 'logout'){
        deconnexion();
    }
    require_once 'pages/login.php';
}

?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.0.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
<script src="https://kit.fontawesome.com/8435a2a226.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="js/requete-ajax.js"></script>
<script src="js/script.js"></script>
</body>
</html>