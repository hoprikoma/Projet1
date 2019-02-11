function connexion(){
    $( "#btn-connexion" ).on( "click", function() {
       $.ajax({
            type: "POST",
            data: {
              password:"heeee"
            },
            url: "../controller/user_controller.php",
            dataType: "html",
            async: false,
            success: function(data) {
              console.log(data);
            }
        });
        console.log("hello");
    });
    
}