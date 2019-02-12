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
                 $("#message_form_inscription").html('<div class="alert alert-danger" role="alert"><i class="fas fa-1x fa-times"></i> Email ou Password Incorect</div>');
              }else{
                 $("#form_inscription").hide();
                 $("#button_inscription").hide();
                 $("#message_form_inscription").html('<div class="alert alert-success" role="alert"><i class="fas fa-1x fa-check"></i> Inscription réussie</div>');
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
function createDescription(){
   $( "#btn-conf" ).on( "click", function() {
      console.log("test00");
      
       $.ajax({
           type: "POST",
           data: {
             name:$("#name_conf").val(),description:$("#description_conf").val(),categorie:$("#cate_conf").val()
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
                 //$("#navbar").load("../include/navbar.php #navbar");
               //   window.location.reload()
              }
           }
       });
   });  
}
function conferenceVote(){
   $( "#conf-vote" ).on( "click", function() {
      console.log("testvote");
      
      /* $.ajax({
           type: "POST",
           data: {
             name:$("#name_conf").val(),description:$("#description_conf").val(),categorie:$("#cate_conf").val()
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
                 //$("#navbar").load("../include/navbar.php #navbar");
               //   window.location.reload()
              }
           }
       });*/
   });  
}
function conferenceNonVote(){
   $( "#conf-non-vote" ).on( "click", function() {
      console.log("testnonvote");
      
      /* $.ajax({
           type: "POST",
           data: {
             name:$("#name_conf").val(),description:$("#description_conf").val(),categorie:$("#cate_conf").val()
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
                 //$("#navbar").load("../include/navbar.php #navbar");
               //   window.location.reload()
              }
           }
       });*/
   });  
}