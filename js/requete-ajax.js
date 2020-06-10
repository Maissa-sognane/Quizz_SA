//Fonction pour les requetes
$(document).ready(function () {
   /* $("#form-creation-compte").submit(function () {
        var prenomUser = $('#prenom').val();
        var nomUser = $('#nom').val();
        var loginUser = $('#login').val();
        var passwordUser = $('#password').val();
        var password2User = $('#password2').val();
        var photoUser = $('#upfile2');

        $.post('traitement/sendDataFormCreate.php', {prenom:prenomUser,nom:nomUser, login:loginUser,
            password:passwordUser, password2:password2User,avatar:photoUser}, function (data) {
                    $('.error-return').html(data);
                    $('#prenom').val('');
                    $('#nom').val('');
                    $('#login').val('');
                    $('#password').val('');
                    $('#password2').val('');
                    $('#upfile2').val('');

        });
      return false;

    });*/
//Form Create User

    $("#submitCreateUser").click(function (event) {
        event.preventDefault();
        var form = $('#form-creation-compte')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: 'traitement/sendDataFormCreate.php',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                $(".error-return").html(data);
                console.log("SUCCESS : ", data);
            },
            error: function (e) {
                $(".error-return").html(e.responseText);
                console.log("ERROR : ", e);
            }
        });


    })

// Form Create Question
    $("#submitQuestion").click(function (event) {
        //stop submit the form, we will post it manually.
        event.preventDefault();


// Get form
        var formQuestion = $('#formulaireCreation')[0];

// Create an FormData object
        var dataQuestion = new FormData(formQuestion);

// If you want to add an extra field for the FormData
        //  data.append("CustomField", "This is some extra data, testing");

// disabled the submit button
        //  $("#submit").prop("disabled", true);

        $.ajax({
            type: "POST",
            url: 'traitement/sendDataQuestionCreate.php',
            data: dataQuestion,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                $(".error-return").html(data);

            },
            error: function (data) {
                $(".error-return").html(data);
            }
        });
    });
});
$(document).ready(function () {
    //Nombre de Admin par Page
    var nmbreUserParPage = 2;
    $(document).ready(function(){

        getData();  // Affcihage des données

        $("#but_prev").click(function(){
            var rowid = Number($("#txt_rowid").val());
            var allcount = Number($("#txt_allcount").val());
            rowid -= nmbreUserParPage;
            if(rowid < 0){
                rowid = 0;
            }
            $("#txt_rowid").val(rowid);
            getData();
        });

        $("#but_next").click(function(){
            var rowid = Number($("#txt_rowid").val());
            var allcount = Number($("#txt_allcount").val());
            rowid += nmbreUserParPage;
            if(rowid <= allcount){

                $("#txt_rowid").val(rowid);
                getData();
            }

        });
    });

    /* Traitement des données */
    function getData(){
        var rowid = $("#txt_rowid").val();
        var allcount = $("#txt_allcount").val();

        $.ajax({
            url:'traitement/listeAdmin.php',
            type:'post',
            data:{rowid:rowid,rowperpage:nmbreUserParPage},
            dataType:'json',
            success:function(response){
                createTablerow(response);
            }
        });

    }

    /* Fonction Creation de table */
    function createTablerow(data){

        var dataLen = data.length;

        $("#emp_table tr:not(:first)").remove();

        for(var i=0; i<dataLen; i++){
            if(i == 0){
                var allcount = data[i]['allcount'];
                $("#txt_allcount").val(allcount);
            }else{
                var id = data[i]['id'];
                var prenom = data[i]['prenom'];
                var nom = data[i]['nom'];
                var login = data[i]['login'];

                $("#emp_table").append("<tr id='tr_"+i+"'></tr>");
                $("#tr_"+i).append("<td align='center'>"+id+"</td>");
                $("#tr_"+i).append("<td align='left'>"+prenom+"</td>");
                $("#tr_"+i).append("<td align='center'>"+nom+"</td>");
                $("#tr_"+i).append("<td align='center'>"+login+"</td>");
                $("#tr_"+i).append("<td align='center'><button id='"+id+"' class='btn btn-danger fas fa-trash'></button></td>");
            }
        }
    }

    /*Supression admin*/
    $('#emp_table').on('click', ".btn-danger", function () {
        const id = $(this).attr('id');
        deleteUser(id, 'traitement/deleteUser.php', "Voulez-vous supprimer");
    })

    //Function Delete User

    const deleteUser = (id, url, message)=>{
        $.ajax({
            type:"POST",
            url:url,
            data:{id:id},
            success:confirm(message)
        });
    }

    //Changer Avatar
    $('#upfile').on('click', function () {
        var form = $('#myForm')[0];
        var data = new FormData(form);
        $.ajax({
            url:'traitement/upUser.php',
            enctype: 'multipart/form-data',
            data:data
        })

    })


})

/*
$(document).ready(function () {
        let offset = 0;
        const tbody = $('#tbody');
        $.ajax({
            type:'POST',
            url: 'traitement/listeAdmin.php',
            data:{limit:2,offset:offset},
            dataType: 'JSON',
            success: function (data) {
                tbody.html('')
                printData(data,tbody);
                offset += 2
            }
        });
        let btnSuivant = $('#suivant');
        btnSuivant.click(function () {
            $.ajax({
                type:'POST',
                url: 'traitement/listeAdmin.php',
                data:{limit:2,offset:offset},
                dataType: 'JSON',
                success: function (data) {
                    printData(data,tbody);
                    offset += 2
                }
            });

        })
})

function printData(data,tbody){
    $.each(data, function(indice,user){
        tbody.append(`
            <tr class="text-center">
                <td>${user.prenom}</td>
                <td>${user.nom}</td>
                <td>${user.login}</td>
                <td>${user.profil}</td>
            </tr>
        `);
    });
}

 */
$(document).ready(function () {
//Parametre Profil
    const formParametre = $("#formParametre")[0];
    const data = new FormData(formParametre);
    const prenomPara = $('#prenomPara').val();
    const nomPara = $('#nomPara').val();
    const loginPara = $('#loginPara').val();
    const passwordPara = $('#passwordPara').val();
    const idUser = $('#idUser').val();

    $.ajax({
        url:'traitement/upUser.php',
        type:'post',
        dataType:'json',
        success:function(response){
            $('#idUser').val(response[0]['id']);
            $('#prenomPara').val(response[0]['prenom']);
            $('#nomPara').val(response[0]['nom']);
            $('#loginPara').val(response[0]['login']);
            $('#passwordPara').val(response[0]['password']);
        }
    });

    //Update User

    $('#btnParametre').click(function (e) {
        e.preventDefault();

        const formParametre = $("#formParametre")[0];
        const data = $("#formParametre").serialize();
            $.ajax({
                url:'traitement/settingUser.php',
                type:"POST",
                data:data,
                success:function (data) {
                    $('.parametre').html(data);
                }
            })

    })


})
