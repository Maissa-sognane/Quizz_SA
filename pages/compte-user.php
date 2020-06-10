<?php
if(isset($_POST['submit'])){
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['login']) ||
        empty($_POST['password']) || empty($_POST['password2'])){
        $msg = 'Tous les champs sont obligatoire';
    }else{
        $existe = '';
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $photo = '';
        $bdd = getdata('quizz');
        $user = $bdd->query('SELECT login FROM user');
        while ($users = $user->fetch()){
            if($login === $users['login']){
                $existe = true;
                break;
            }
        }
        if($existe === true){
            $msg = 'Login existe';
        }
        else{
            if($password != $password2){
                $msg = 'Les deux mots de pass ne sont pas identiques';
            }
            else{
                if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])){
                    $photo =  setPhoto('avatar', $login);
                }
                createCompte($prenom, $nom, $login, $password, $profil, $photo);
                $msg_sucess = $login.' ajouté avec succés';
            }
        }
    }
}
?>
<div class="container">
    <div class="d-inline-flex mt-lg-3 border-bottom  titre-creation-compte">
        <h1>Creation de compte</h1>
        <i class="fas fa-user ml-lg-3"></i>
    </div>
    <form method="post" enctype="multipart/form-data" id="form-creation-compte-joueur">
        <div class="row mt-3">
            <div class="col-8">
                <?php
                if(isset($msg) && !empty($msg)){
                    echo '<div class="alert alert-danger">';
                    echo $msg;
                    echo '</div>';
                }
                if(isset($msg_sucess) && !empty($msg_sucess)){
                    echo '<div class="alert alert-success">';
                    echo $msg_sucess;
                    echo '</div>';
                }
                ?>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom" value="<?php
                    if(isset($_POST['prenom'])){
                        echo $_POST['prenom'];
                    }
                    ?>">
                    <small>Validation error</small>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="nom" value="<?php
                    if(isset($_POST['nom'])){
                        echo $_POST['nom'];
                    }
                    ?>">
                    <small>Validation error</small>
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="login" value="<?php
                    if(isset($_POST['login'])){
                        echo $_POST['login'];
                    }
                    ?>">
                    <small>Validation error</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?php
                    if(isset($_POST['password'])){
                        echo $_POST['password2'];
                    }
                    ?>">
                    <small>Validation error</small>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="confirm password" value="<?php
                    if(isset($_POST['password2'])){
                        echo $_POST['password2'];
                    }
                    ?>">
                    <small>Validation error</small>
                </div>
                <button type="submit" name="submit" class="btn mb-2" onchange="sub(this)" style="background-color: #25CCF7">Enregistrer</button>
            </div>
            <div class="col-4 align-self-center">
                <div class="row">
                    <div class="col-12 photo-avatar">
                        <img class="" id="output">
                    </div>
                    <div class="col-12">
                        <div id="yourBtn"   onclick="getFile2()" class="btn ml-lg-5 mt-1" style="background-color: #25CCF7">Avatar
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input type="file" name="avatars" id="upfile2"   value="upload"  accept="image/*" onchange="loadFile2(event);"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
