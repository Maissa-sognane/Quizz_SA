<?php
$msg = '';
if (isset($_POST['submitLOgin'])){
    if(empty($_POST['login'])){
        $msg = 'Champ login vide';
    }
    elseif (empty($_POST['password'])){
        $msg = 'Champ password vide';
    }
    else{
        if(isset($_POST['login']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $resultat = connexion($login, $password);
            if ($resultat === 'admin' || $resultat === 'joueur'){
                header("Location:./?lien=" .$resultat);
            }
            elseif($resultat === 'error_loging'){
                $msg ='Login invalid';
            }
            elseif ($resultat === 'error_pwd'){
                $msg ='password ou login invalid ';
            }
        }
    }
}
?>
<body style=" background-image: url('./Images/image.jpg');background-repeat: no-repeat;background-size: cover">
<div class="container-fluid">
    <div class="row">
        <div class="col titre_login h-auto">
            <div class="d-flex align-content-end flex-wrap" style="height: 400px;">
                <h1>Bienvenue</h1>
                <h1 class="top w-100 m-3">Top c'est parti</h1>
            </div>

        </div>
        <div class="col">
            <div class="d-flex justify-content-center align-items-center" style="height: 610px">
                <div class="login">
                    <div class="title-login">
                        <span class="d-block p-3">Login</span>
                    </div>
                    <div class="connexion">
                        <?php
                        if (isset($msg) && !empty($msg)){
                            echo '<div class="alert alert-danger w-75 mx-auto" role="alert">';
                            echo $msg;
                            echo '</div>';
                        }
                        ?>
                        <form method="post" id="form-login">
                            <div class="form-row">
                                <div class="col-2"></div>
                                <div class="col-8 input_login p-3">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="d-flex flex-row-reverse">
                                                <i class="fa fa-user mt-2 p-1  position-absolute" aria-hidden="true"></i>
                                            </div>
                                            <input type="text" name="login" class="form-control" id="login" placeholder="login">
                                            <small>Validation Error</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="d-flex flex-row-reverse">
                                                <i class="fa fa-unlock-alt mt-2 p-1  position-absolute" aria-hidden="true"></i>
                                            </div>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                            <small>Validation Error</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn" id="submit" type="submit" name="submitLOgin">connexion</button>
                                        <a href="?lien=inscription">S'inscrire</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
