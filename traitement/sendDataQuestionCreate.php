<?php
session_start();
require_once '../function/connexion.php';
global $bdd;
require '../function/function.php';

    if(empty($_POST['question'])){
        echo '<div class="alert alert-danger">Donner une question</div>';
    }
    else{
        if(empty($_POST['score']) || !is_numeric($_POST['score'])){
            echo  '<div class="alert alert-danger">Donner score numérique</div>';
        }
        else{
            if(empty($_POST['nombre-reponse']) || !is_numeric($_POST['nombre-reponse'])){
                echo  '<div class="alert alert-danger">Donner nombre reponse numérique</div>';
            }
            else{
                if(empty($_POST['type'])){
                    echo  '<div class="alert alert-danger">Chois de reponse obligatoire</div>';
                }else{
                    if (!(isset($reponse)) && !(empty($reponse))){
                        $reponse = array(
                            'bonne-reponse'=>'',
                            'mauvaise-reponse'=>''
                        );
                    }
                    for ($i = 1; $i <= $_POST['nombre-reponse']; $i++){
                        if (isset($_POST['reponse'.$i])) {
                            if (empty($_POST['reponse'.$i])) {
                                echo '<div class="alert alert-danger">Donner la reponse'.$i.'<div class="alert alert-danger">';
                            }
                            else{
                                if(isset($_POST["checkreponse$i"])){
                                    $reponse['bonne-reponse'][] = $_POST['reponse'.$i];
                                }
                                else{
                                    $reponse['mauvaise-reponse'][] = $_POST['reponse'.$i];
                                }

                            }
                        }
                    }
                    $question = $_POST['question'];
                    $score = $_POST['score'];
                    $type = $_POST['type'];

                    $questions = $bdd->prepare('INSERT INTO question(question,score,type_question)
          VALUE  (:question, :score, :type_question )');
                    $questions->execute(array(
                        'question'=>$question,
                        'score'=>$score,
                        'type_question'=>$type
                    ));
                    $id = $bdd->lastInsertId();
                    //  createQuestion($question, $score);
                    if(isset($reponse)) {
                        foreach ($reponse as $key => $value) {
                            if ($key == 'bonne-reponse') {
                                foreach ($value as $cle => $val) {
                                    createReponse($val, 1, $id);
                                }
                            } else {
                                foreach ($value as $clees => $valeur) {
                                    createReponse($valeur, 0, $id);
                                }
                            }

                        }
                    }

                    echo '<div class="alert alert-success"> la question : ';
                    echo  $question;
                    echo ' est ajoutée avec succés</div>';
                }


            }
        }

}
