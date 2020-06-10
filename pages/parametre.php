<div class="container mt-2">
        <div class="d-flex justify-content-center">
            <h1>Parametres</h1>
            <i class="fas fa-user-cog" style="color: #25CCF7"></i>
        </div>

       <div class="mx-auto w-75  bg-white rounded shadow" >
           <div class="row">
               <div class="mx-auto photo-avatar">
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
               </div>
           </div>
           <div class="mx-auto w-75   p-lg-3 p-3">

               <form method="post" id="formParametre">
                   <div class="parametre"></div>
                   <div class="form-group row">
                       <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                       <div class="col-sm-10">
                           <input type="text" class="form-control" name="prenomPara" id="prenomPara">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                       <div class="col-sm-10">
                           <input type="text" class="form-control" name="nomPara" id="nomPara">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="login" class="col-sm-2 col-form-label">Login</label>
                       <div class="col-sm-10">
                           <input type="text" class="form-control" name="loginPara" id="loginPara">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="password" class="col-sm-2 col-form-label">Password</label>
                       <div class="col-sm-10">
                           <input type="password" class="form-control" name="passwordPara" id="passwordPara">
                       </div>
                       <input type="hidden" name="idUser" id="idUser">
                   </div>
                   <div class="form-group row">
                       <div class="col-sm-10">
                           <button type="submit" class="btn btn-primary" name="btnParametre" id="btnParametre">Enrégistrer</button>
                       </div>
                   </div>
               </form>

           </div>

       </div>
</div>
