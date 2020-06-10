<?php
require_once 'function/connexion.php';
global $bdd;
?>
<div class="liste-joueur">
    <div class="d-inline-flex mt-lg-3 mt-1  titre-creation-compte">
        <h1>Liste des administrateurs</h1>
        <i class="fas fa-user-tie ml-lg-3"></i>
    </div>
    <div class="">
        <div class="">
            <div class="row">
                <div class="col-12 col">
                    <div id="scrollZone" class="col">
                        <table class="table table-striped" id="emp_table">
                            <thead>
                            <tr class="text-center">
                                <th>id</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Login</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            <tr class="text-center">
                                <td>id</td>
                                <td>18H50</td>
                                <td>771544313</td>
                                <td>100000</td>
                                <td>500K</td>
                            </tr>
                            </tbody>
                        </table></div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div id="div_pagination">
                    <input type="hidden" id="txt_rowid" value="0">
                    <input type="hidden" id="txt_allcount" value="0">
                    <div class="btn btn-primary  mr-2" id="but_prev">Precedent</div>
                    <div class="btn btn-primary" id="but_next">Suivant</div>
                </div>
            </div>
        </div>
        </div>
</div>
