function connexion(){
    $( "#btn-connexion" ).on( "click", function() {
      result=verifMail($("#mail-connexion").val());
      if(result==true){
        $.ajax({
            type: "POST",
            data: {
              password:$("#pass-connexion").val(),email:$("#mail-connexion").val()
            },
            url: "../controller/connection_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
                if(data==0){
                    $("#message_form_connexion").html('<div class="alert alert-danger" role="alert"><i class="fas fa-1x fa-times"></i> Email ou Password Incorect</div>');
                }else{
                    $("#form_connexion").hide();
                    $("#button_connexion").hide();
                    $("#message_form_connexion").html('<div class="alert alert-success" role="alert"><i class="fas fa-1x fa-check"></i> Vous etes connecter</div>');
                    //$("#navbar").load("../include/navbar.php #navbar");
                   window.location.reload()
                }
            }
        });
        deconnexion();
      }else{
         $("#message_form_connexion").html("<div class='alert alert-danger' role='alert'><i class='fas fa-1x fa-times'></i> Votre email n'est pas valide</div>");
      }
    });  
}
function inscription(){
    $( "#btn-inscription" ).on( "click", function() {
        var email=$("#mail-inscription").val();
        var nom=$("#name").val();
        var password=$("#pass-inscription").val();
        var prenom = $("#forename").val();
        result=verifMail($("#mail-inscription").val());
        if(result==true){
        $.ajax({
            type: "POST",
            data: {
                email:email, nom:nom, password:password, prenom:prenom,
            },
            url: "../controller/inscription_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
                console.log(data);
                if(data==0){
                    $("#message_form_inscription").html('<div class="alert alert-danger" role="alert"><i class="fas fa-1x fa-times"></i> Cette adresse mail est déjà prise</div>');
                }else{
                    $("#form_inscription").hide();
                    $("#button_inscription").hide();
                    $("#message_form_inscription").html('<div class="alert alert-success" role="alert"><i class="fas fa-1x fa-check"></i> Inscription réussie</div>');
                    window.location.reload()
                }
            }
        });
        }else{
            $("#message_form_inscription").html("<div class='alert alert-danger' role='alert'><i class='fas fa-1x fa-times'></i> Votre email n'est pas valide</div>");
        }
    });  
}
function deconnexion(){
   $( "#deconnexion" ).on( "click", function() {
       $.ajax({
           type: "POST",
           url: "../controller/deconnection_controller.php",
           dataType: "html",
           async: false,
           success: function(data) {
               console.log('deconnexion');
               //$("#navbar").load("../include/navbar.php #navbar");
               window.location.reload()
           }
       });
   });  
}
function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   console.log(champ);
   if(!regex.test(champ))
   {
      return false;
   }
   else
   {
      return true;
   }
}
function createConference(){
   $( "#btn-conf" ).on( "click", function() {
       $.ajax({
           type: "POST",
           data: {
             name:$("#name_conf").val(),description:$("#description_conf").val(),categorie:$("#categorie-conf option:selected").val()
           },
           url: "../controller/create_conference_controller.php",
           dataType: "html",
           async: false,
           success: function(data) {
              if(data==0){
                 $("#message_form_conf").html('<div class="alert alert-danger" role="alert"><i class="fas fa-1x fa-times"></i> Problème de création</div>');
              }else{
                 $("#form_conf").hide();
                 $("#button_conf").hide();
                 $("#message_form_conf").html('<div class="alert alert-success" role="alert"><i class="fas fa-1x fa-check"></i> Création effectuée</div>');
                 window.location.reload()
              }
           }
       });
   });  
}
function createCategorie(){
    $( "#btn-categorie" ).on( "click", function() {
        $.ajax({
            type: "POST",
            data: {
              name:$("#name_categorie").val()
            },
            url: "../controller/create_categorie_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
               if(data==0){
                  $("#message_form_categorie").html('<div class="alert alert-danger" role="alert"><i class="fas fa-1x fa-times"></i> Problème de création</div>');
               }else{
                  $("#form_categorie").hide();
                  $("#button_categorie").hide();
                  $("#message_form_categorie").html('<div class="alert alert-success" role="alert"><i class="fas fa-1x fa-check"></i> Création effectuée</div>');
                  window.location.reload()
               }
            }
        });
    });  
 }
function getConference(){
   //$( "#conf-display" ).on( "click", function() {
      
       $.ajax({
           type: "POST",
           url: "../controller/get_conference_controller.php",
           dataType: "html",
           async: false,
           success: function(data) {
            //   console.log(data);
              
              var json = JSON.parse(data);
              let div = '<div class="tab-pane fade active show" id="home">';
              div+='<table id="example" class="table table-striped table-bordered" style="width:100%">';
                  div+='<thead>';
                      div+='<tr>';
                          div+='<th>Titre</th>';
                              div+='<th>Description</th>';
                              div+='<th>Catégorie</th>';
                              div+='</tr>';
                          div+='</thead>';
                      div+='<tbody>';
                      
                      $.each( json, function( key, value ) {
                        div+='<tr>';
                           div+='<td>'+value.nom1+'</td>';
                           div+='<td>'+value.description+'</td>';
                           div+='<td>'+value.nom+'</td>';
                           div+='</tr>';
                      });
                           

                      div+='</tbody>';
                  div+='</table>';
              div+='</div>';
             // div+='<div id="dialog_vote" title="Vote" class="container"></div>';
              $("#myTabContent").html(div);
              $('#example').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
              dialog();
           }
       });
   // });
}

function refreshGetConference(){
   $( "#conf-display" ).on( "click", function() {
      getConference();
   });
}

function getConferenceVote(){
   $( "#conf-vote" ).on( "click", function() {
    console.log("vote");
       $.ajax({
           type: "POST",
           url: "../controller/getconferencevote_controller.php",
           dataType: "html",
           async: false,
           success: function(data) {
            //   console.log(data);
              
              var json = JSON.parse(data);
              let div = '<div class="tab-pane fade active show" id="home">';
              div+='<table id="example" class="table table-striped table-bordered" style="width:100%">';
                  div+='<thead>';
                      div+='<tr>';
                          div+='<th>Titre</th>';
                              div+='<th>Description</th>';
                              div+='<th>Catégorie</th>';
                              div+='</tr>';
                          div+='</thead>';
                      div+='<tbody>';
                      
                      $.each( json, function( key, value ) {
                        div+='<tr>';
                           div+='<td>'+value.nom1+'</td>';
                           div+='<td>'+value.description+'</td>';
                           div+='<td>'+value.nom+'</td>';
                           div+='</tr>';
                      });
                           

                      div+='</tbody>';
                  div+='</table>';
              div+='</div>';
              $("#myTabContent").html(div);
              $('#example').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            } );
           }
       });
    });
}

function getConferenceNonVote(){
      console.log("non-vote");
       $.ajax({
           type: "POST",
           url: "../controller/getconferencenonvote_controller.php",
           dataType: "html",
           async: false,
           success: function(data) {
            //   console.log(data);
              
              var json = JSON.parse(data);
              let div = '<div class="tab-pane fade active show" id="home">';
              div+='<table id="example" class="table table-striped table-bordered" style="width:100%">';
                  div+='<thead>';
                      div+='<tr>';
                          div+='<th>Titre</th>';
                              div+='<th>Description</th>';
                              div+='<th>Catégorie</th>';
                              div+='<th>Vote</th>';
                              div+='</tr>';
                          div+='</thead>';
                      div+='<tbody>';
                      
                      $.each( json, function( key, value ) {
                        div+='<tr>';
                           div+='<td>'+value.nom1+'</td>';
                           div+='<td>'+value.description+'</td>';
                           div+='<td>'+value.nom+'</td>';
                           div+='<td><span id="'+value.id+'" class="opener_vote" title="Voter"><i class="fas fa-star"></i></span></td>';
                           div+='</tr>';
                      });
                           

                      div+='</tbody>';
                  div+='</table>';
              div+='</div>';
              div+='<div id="dialog_vote" title="Vote" class="container"></div>';
              $("#myTabContent").html(div);
              $('#example').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
              dialog();
           }
       });
}
function refreshgetConferenceNonVote(){
    $( "#conf-non-vote" ).on( "click", function() {
        getConferenceNonVote();
    });
}

function getConferenceTop10(){
   $( "#top10" ).on( "click", function() {
      
       $.ajax({
           type: "POST",
           url: "../controller/getconferencetop10_controller.php",
           dataType: "html",
           async: false,
           success: function(data) {
            //   console.log(data);
              
              var json = JSON.parse(data);
              let div = '<div class="tab-pane fade active show" id="home">';
              div+='<table id="example" class="table table-striped table-bordered" style="width:100%">';
                  div+='<thead>';
                      div+='<tr>';
                            div+='<th>Classement</th>';
                            div+='<th>Titre</th>';
                            div+='<th>Nombre de Vote</th>';
                            div+='</tr>';
                          div+='</thead>';
                      div+='<tbody>';
                      
                      $.each( json, function( key, value ) {
                        div+='<tr>';
                        let number=key;
                        number++;
                           div+='<td>'+number+'</td>';
                           div+='<td>'+value.nom+'</td>';
                           div+='<td>'+value.total+'</td>';
                           div+='</tr>';
                      });
                           

                      div+='</tbody>';
                  div+='</table>';
              div+='</div>';
              $("#myTabContent").html(div);
              $('#example').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });
           }
       });
    });
}
function gererConference(){
       console.log("non-vote");
        $.ajax({
            type: "POST",
            url: "../controller/get_conference_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
             //   console.log(data);
               
               var json = JSON.parse(data);
               let div = '<div class="tab-pane fade active show" id="home">';
               div+='<table id="example" class="table table-striped table-bordered" style="width:100%">';
                   div+='<thead>';
                       div+='<tr>';
                           div+='<th>Titre</th>';
                               div+='<th>Description</th>';
                               div+='<th>Catégorie</th>';
                               div+='<th>Supprimer</th>';
                               div+='</tr>';
                           div+='</thead>';
                       div+='<tbody>';
                       
                       $.each( json, function( key, value ) {
                         div+='<tr>';
                            div+='<td>'+value.nom1+'</td>';
                            div+='<td>'+value.description+'</td>';
                            div+='<td>'+value.nom+'</td>';
                            div+='<td><span id="'+value.id+'" class="btn_supprimer" title="Supprimer"><i class="fas fa-trash"></i></span></td>';
                            div+='</tr>';
                       });
                            
 
                       div+='</tbody>';
                   div+='</table>';
               div+='</div>';
               $("#myTabContent").html(div);
               $('#example').DataTable( {
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                 }
             });
               dialog();
               conferenceSupprimer();
            }
        });
 }
function getGererConference(){
    $( "#conf-gerer" ).on( "click", function() {
        gererConference();
    });
}
function conferenceSupprimer(){
    $( ".btn_supprimer" ).on( "click", function() {
        console.log(this.getAttribute('id'));
        $.ajax({
            type: "POST",
            data: {
              id_conference:this.getAttribute('id')
            },
            url: "../controller/supprimer_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
               gererConference();
            }
        });
    });  
 }
 function allConferenceSupprimer(){
    $( "#delete-all" ).on( "click", function() {
        console.log(this.getAttribute('id'));
        $.ajax({
            type: "POST",
            url: "../controller/supprimerall_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
                getConference();
            }
        });
    });  
 }
 function vote(){
    $( "#btn-vote" ).on( "click", function() {
        console.log($("#id_conference").val());
        console.log($("input[name=rating]:checked").val());
        $.ajax({
            type: "POST",
            data: {
              id_conference:$("#id_conference").val(), vote:$("input[name=rating]:checked").val()
            },
            url: "../controller/vote_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
               if(data==0){
                  $("#message_form_vote").html('<div class="alert alert-danger" role="alert"><i class="fas fa-1x fa-times"></i> Erreur Enregistrement</div>');
               }else{
                  $("#form_vote").hide();
                  $("#button_vote").hide();
                  $("#message_form_vote").html('<div class="alert alert-success" role="alert"><i class="fas fa-1x fa-check"></i> Vote Enregitrer</div>');
                  getConferenceNonVote();
               }
            }
        });
    });  
 }

 function gererUser()
 {
    console.log("gerer_user");
     $.ajax({
         type: "POST",
         url: "../controller/getAllUser_controller.php",
         dataType: "html",
         async: false,
         success: function(data) {
          //   console.log(data);
            
            var json = JSON.parse(data);
            let div = '<div class="tab-pane fade active show" id="home">';
            div+='<table id="example" class="table table-striped table-bordered" style="width:100%">';
                div+='<thead>';
                    div+='<tr>';
                            div+='<th>Nom</th>';
                            div+='<th>Prenom</th>';
                            div+='<th>Email</th>';
                            div+='<th>Supprimer</th>';
                            div+='</tr>';
                        div+='</thead>';
                    div+='<tbody>';
                    
                    $.each( json, function( key, value ) {
                      div+='<tr>';
                         div+='<td>'+value.nom+'</td>';
                         div+='<td>'+value.prenom+'</td>';
                         div+='<td>'+value.email+'</td>';
                         div+='<td><span id="'+value.id+'" class="btn_supprimer" title="Supprimer"><i class="fas fa-trash"></i></span></td>';
                         div+='</tr>';
                    });
                         

                    div+='</tbody>';
                div+='</table>';
            div+='</div>';
            $("#myTabContent").html(div);
            $('#example').DataTable( {
              "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
              }
          });
            dialog();
            userSupprimer();
         }
     });
}
function getGererUser(){
    $( "#user-gerer" ).on( "click", function() {
        gererUser();
    });
}
function userSupprimer()
{
    $( ".btn_supprimer" ).on( "click", function() {
        console.log(this.getAttribute('id'));
        $.ajax({
            type: "POST",
            data: {
              id_user:this.getAttribute('id')
            },
            url: "../controller/supprimerUser_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
               gererUser();
            }
        });
    }); 
}
function getCategorie(){
        $.ajax({
            type: "POST",
            url: "../controller/getCategorie_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
                var json = JSON.parse(data);
                let div="";
                $.each( json, function( key, value ) {
                    div+='<option value='+value.id+'>'+value.nom+'</option>';
                });
                $("#categorie-conf").html(div);
            }
        });
}