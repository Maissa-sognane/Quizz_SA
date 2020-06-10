<?php
require_once 'function/connexion.php';
global $bdd;
$admin = $bdd->query('SELECT COUNT(login) FROM user WHERE profil = "admin"');
$joueur = $bdd->query('SELECT COUNT(login) FROM user WHERE profil = "joueur"');

$admin = $admin->fetch();
$joueur = $joueur->fetch();





?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 ">
            <h1 class="titre-dashboard">Dashbord</h1>
        </div>
    </div>
    <div class="row">
        <div class="col border  border mt-2 w-75 ml-lg-5">
           <div class="row h-100">
               <div class="col-4 icone-dashbord  icone-dashord-admin ">
                   <div class="row">
                       <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                           <i class="fas fa-user-tie"></i>
                       </div>
                   </div>
               </div>
               <div class="col-8 h-100">
                   <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                   <div class="row">
                       <div class="col">
                           <h6 class="titre-element-dashboard">Administrateurs</h6>
                       </div>
                   </div>
                  <div class="border-bottom"></div>
                   <div class="row">
                       <div class="col">
                           <h6 class="pt-1 titre-element-dashboard"><?php  echo $admin[0];?></h6>
                       </div>
                   </div>
                   </div>
               </div>
           </div>
        </div>
        <!--A ne pas supprimer-->
        <div class="col-md-auto">
        </div>

        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-4 icone-dashbord icone-dashord-joueur ">
                    <div class="row">
                        <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 h-100">
                    <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                        <div class="row">
                            <div class="col">
                                <h6 class="titre-element-dashboard">Joueurs</h6>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="pt-1 titre-element-dashboard"><?php  echo $joueur[0];?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-4 icone-dashbord  icone-dashord-question ">
                    <div class="row">
                        <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                            <i class="fas fa-question-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 h-100">
                    <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                        <div class="row">
                            <div class="col">
                                <h6 class="titre-element-dashboard">Questions</h6>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="pt-1 titre-element-dashboard">Nombre</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--A ne pas supprimer-->
        <div class="col-md-auto">
        </div>

        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-4 icone-dashbord icone-dashord-meilleur-joueur ">
                    <div class="row">
                        <div class="col-5 offset-3  pt-xl-5 pb-xl-4 pt-lg-4 pb-lg-5 pl-lg-1 p-1 position-relative">
                            <i class="fas fa-gamepad"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 h-100">
                    <div class="p-3 pt-xl-5 pb-xl-5 pt-lg-4 pb-lg-4">
                        <div class="row">
                            <div class="col">
                                <h6 class="titre-element-dashboard">Meilleur Score</h6>
                            </div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col">
                                <h6 class="pt-1 titre-element-dashboard">Nombre</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-12 icone-dashbord">
                    <div class="row">
                        <div class="col-12 p-3  titre-graphe-1">
                            <h4>5 Meilleurs Joueurs</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 style="color: black">Graphe</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
        <!--A ne pas supprimer-->
        <div class="col-md-auto">
        </div>
        <div class="col border  border mt-2 w-75 ml-lg-5">
            <div class="row h-100">
                <div class="col-12 icone-dashbord">
                    <div class="row">
                        <div class="col-12 p-3  titre-graphe-1">
                            <h4>Utilisateurs</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 style="color: black">Graphe</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>


    </div>


</div>
