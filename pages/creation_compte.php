<div class="container">
    <div class="d-inline-flex mt-lg-3 border-bottom  titre-creation-compte">
        <h1>Creation de compte</h1>
        <i class="fas fa-user ml-lg-3"></i>
    </div>
    <form method="post" enctype="multipart/form-data" id="form-creation-compte">
        <div class="row mt-3">
            <div class="col-8">
                <div class="error-return"></div>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom" value="<?php
                    if(isset($_POST['prenom'])){
                        echo $_POST['prenom'];
                    }
                    ?>">

                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="nom" value="<?php
                    if(isset($_POST['nom'])){
                        echo $_POST['nom'];
                    }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="login" value="<?php
                    if(isset($_POST['login'])){
                        echo $_POST['login'];
                    }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?php
                    if(isset($_POST['password'])){
                        echo $_POST['password2'];
                    }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="confirm password" value="<?php
                    if(isset($_POST['password2'])){
                        echo $_POST['password2'];
                    }
                    ?>">
                </div>
                <input type="hidden" name="profil" value="admin">

            </div>
            <div class="col-4 align-self-center">
                <div class="row">
                    <div class="col-12 photo-avatar">
                        <img class="" id="output2">
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
            <button type="submit" name="submit" id="submitCreateUser" class="btn mb-2"  style="background-color: #25CCF7">Enregistrer</button>
        </div>
    </form>
</div>



