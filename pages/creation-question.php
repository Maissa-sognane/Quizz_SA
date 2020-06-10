<?php
$msgError = "";
$msgSuccess = "";

?>
<div class="mt-3">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>Création Questions</h1>
        </div>
    </div>
    <div class="border rounded-lg bg-white">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="error-return"></div>
                    <form  method="post" class="formulaire-creation-question" id="formulaireCreation">
                        <?php
                        if(isset($msgError) && !empty($msgError)){
                            echo '<div class="alert alert-danger align-center">'.$msgError.'</div>';
                        }
                        ?>
                        <div class="form-group row">
                            <label for="question" class="col-sm-2 mt-lg-4 p col-form-label">Question</label>
                            <div class="col-sm-10">
                                <textarea class="form-control pb-lg-5" id="question" name="question" placeholder="Entrer la question"><?php if(isset($_POST['question']) && !empty($_POST['question'])){echo $_POST['question'];} ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="score" class="col-sm-2   col-form-label">Score</label>
                            <div class="col-sm-10">
                                <input type="text" name="score"  class="form-control w-25" id="score"value="<?php if(isset($_POST['score'])){echo $_POST['score'];} ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2   col-form-label">Type</label>
                            <div class="col-sm-10">
                            <select class="form-control w-25" id="type" name="type">
                                <option name="simple">Simple</option>
                                <option name="multiple">Multiple</option>
                                <option name="text">Text</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reponse" class="col-sm-2 mt-lg-1">Nombre Reponse</label>
                            <div class="col-sm-4 ">
                                <input type="text" name="nombre-reponse" id="nombre-reponse" class="form-control w-25"
                                       value="<?php if(isset($_POST['nombre-reponse'])){echo $_POST['nombre-reponse'];} ?>">
                            </div>
                            <div class="col-sm-1 reponse">
                                <a><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                        <div class="reponses"></div>
                        <input type="submit" name="submit" id="submitQuestion" class="btn enregistrer" style="background-color: #25CCF7" value="Enrégistrer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


