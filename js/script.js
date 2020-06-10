// GET DOM
const login = document.getElementById('login');
const password = document.getElementById('password');
const form = document.getElementById('form-login');
const formCreationCompte = document.getElementById('form-creation-compte');
const prenom = document.getElementById('prenom');
const nom = document.getElementById('nom');
const password2 = document.getElementById('password2');
//let errors = false;

//Function
function checkRequired(inputArray){
    inputArray.forEach(input=>{
        if(input.value.trim() === ''){
            showError(input, `${input.id} is required`);
        }else{
            showSuccess(input);
        }
    })
}
function showError(input, message){
    const formControl = input.parentElement;
    formControl.className = 'col-12 error';

    const small = formControl.querySelector('small');
    small.innerText = message;
}
function showSuccess(input){
    const formControl = input.parentElement;
    formControl.className = 'col-12 success';
}


//Event Login
if(form) {
    form.addEventListener('submit', (e) => {
        // e.preventDefault();
        // checkRequired([login,password]);
    })
}

//Validation creation compte
if(formCreationCompte){
    formCreationCompte.addEventListener('submit', (e)=>{
        // e.preventDefault();
        // checkRequired([prenom, nom,login,password,password2]);
    })
}

//Fonction Telecharger Image
function getFile() {
    document.getElementById("upfile").click();
}

function getFile2() {
    document.getElementById("upfile2").click();
}

function sub(obj) {
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
    document.myForm.submit();
    event.preventDefault();
}

//Charger automatiquement le photo

var loadFile = function (event) {
    var output = document.getElementById("output");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src);
    }
};
var loadFile2 = function (event) {
    var output = document.getElementById("output2");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src);
    }
};

//Ajouter des champs reponses

$(document).ready(function () {
    $(this).on("click", " .fa-plus-circle ", function (){
        var nombreReponse = $("input[name = nombre-reponse]").val();
        for (var i=1; i<=nombreReponse; i++) {
            var html = '<div class="form-group row">' +
                '\n' +
                '                            <div class="col-sm-10">\n' +
                '                             ' +
                '                                    <div class="row" >\n' +
                '                                     <label for="reponse" class="col-sm-2 mt-lg-1">Reponse '+i+'</label>' +
                '                                        <div class="col-sm-8">\n' +
                '                                        <div class="input-group mb-3">\n' +
                '                                            <div class="input-group-prepend">\n' +
                '                                                <div class="input-group-text">\n' +
                '                                                    <input type="checkbox" name="checkreponse'+i+'" value="" aria-label="Checkbox for following text input">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <input type="text" class="form-control" name="reponse'+i+'"  aria-label="Text input with checkbox">\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                   \n' +
                '                                     <a class="remove"><i class="fas fa-trash-alt "></i></a>\n' +
                '                                    \n' +
                '                                </div>\n' +
                '                            </div>' +
                '</div>'
            $(".reponses").append(html);
        }
    });
  //Supprimer la reponse
        $(this).on('click', '.remove', function () {
            var target_input = $(this).parent();
            target_input.remove();
        })
    $(this).on("click", " .enregistrer", function () {
    })

    //Validation Form Question

    $("#formulaireCreation").validate({
        rules: {
            "question": {
                required: true,
            },
            "score": {
                required: true,
                number: true,
            },
            "nombre-reponse":{
                required : true,
                number: true,
            },
            "reponse1":{
                required : true,
            },
            "reponse2":{
                required : true,
            },
            "reponse3":{
                required : true,
            },
            "reponse4":{
                required : true,
            },
            "reponse5":{
                required : true,
            },
            "reponse6":{
                required : true,
            },
            "reponse7":{
                required : true,
            },
            "reponse8":{
                required : true,
            },
            "reponse9":{
                required : true,
            }

        },
        messages: {
            "question":{
                required : "Question Obligatoire"
            },
            "score":{
                required : "Score Obligatoire",
                number : "Donner un nombre"

            },
            "nombre-reponse":{
                required : "Nombre de reponse Obligatoire",
                number : "Donner un nombre"
            },
            "reponse1":{
                required : "Donner votre reponse",
            },
            "reponse2":{
                required : "Donner votre reponse",
            },
            "reponse3":{
                required : "Donner votre reponse",
            },
            "reponse4":{
                required : "Donner votre reponse",
            },
            "reponse5":{
                required : "Donner votre reponse",
            },
            "reponse6":{
                required : "Donner votre reponse",
            },
            "reponse7":{
                required : "Donner votre reponse",
            },
            "reponse8":{
                required : "Donner votre reponse",
            },
            "reponse9":{
                required : "Donner votre reponse",
            },

        }
    })

    //Form validation create compte

    $('#form-creation-compte').validate({
        rules:{
            "prenom":{
                required: true,
            }
        },
        messages:{
            "prenom":{
                required:'prenom is required',
            }
        }
    })

})
//Fonction


