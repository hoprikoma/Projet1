function dialog(){
    $( "#dialog_inscription" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 10
      },
      hide: {
        effect: "blind",
        duration: 10
      },
      clickOutside: true,
      clickOutsideTrigger: "#opener_inscription"
    });

    $( "#dialog_connexion" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 10
      },
      hide: {
        effect: "blind",
        duration: 10
      },
      clickOutside: true,
      clickOutsideTrigger: "#opener_connexion"
    });

    $( "#dialog_conf" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 10
      },
      hide: {
        effect: "blind",
        duration: 10
      },
      clickOutside: true,
      clickOutsideTrigger: "#opener_conf"
    });

    $( "#dialog_vote" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 10
      },
      hide: {
        effect: "blind",
        duration: 10
      },
      clickOutside: true,
      clickOutsideTrigger: ".opener_vote"
    });


    $( "#opener_inscription" ).on( "click", function() {
      $( "#dialog_inscription" ).dialog( "open" );
    });
 
    $( "#opener_connexion" ).on( "click", function() {
      $( "#dialog_connexion" ).dialog( "open" );
    });
    
    $( "#opener_conf" ).on( "click", function() {
      $( "#dialog_conf" ).dialog( "open" );
    });
    $( ".opener_vote" ).on( "click", function() {
      div='<div class="rating container" id="form_star">';
      div+='<div id="form_vote">';
      div+='<form action="" method="post">';
      div+='<label for="star1" title="Mauvaise">1 star</label>';
      div+='<input type="radio" id="star1" name="rating" value="1" />';
      div+='<label for="star2" title="Pas interessante">2 stars</label>';
      div+='<input type="radio" id="star2" name="rating" value="2" />';
      div+='<label for="star3" title="Moyenne">3 stars</label>';
      div+='<input type="radio" id="star3" name="rating" value="3" checked="checked">';
      div+='<label for="star4" title="Plutot bonne">4 stars</label>';
      div+='<input type="radio" id="star4" name="rating" value="4" />';
      div+='<label for="star5" title="Géniale">5 stars</label>';
      div+='<input type="radio" id="star5" name="rating" value="5" />';
      div+='<input type="hidden" id="id_conference" value="'+this.getAttribute('id')+'" />';
      div+='</form>';
      div+='<div id="button_vote">';
      div+='<button id="btn-vote"  class="btn btn-primary" style="margin-bottom:10px">Envoi</button>';
      div+='</div>';
      div+='</div>';
      div+='<div id="message_form_vote"></div>';
      div+='</div>';
      $('#dialog_vote').html(div);
      $( "#dialog_vote" ).dialog( "open" );
      vote();
    });

  }
  


  /* jQuery UI dialog clickoutside */

/*
The MIT License (MIT)
Copyright (c) 2013 - AGENCE WEB COHERACTIO
Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:
The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

$.widget( "ui.dialog", $.ui.dialog, {
  options: {
    clickOutside: false, // Determine if clicking outside the dialog shall close it
    clickOutsideTrigger: "" // Element (id or class) that triggers the dialog opening 
  },

  open: function() {
    var clickOutsideTriggerEl = $( this.options.clickOutsideTrigger );
    var that = this;
    
    if (this.options.clickOutside){
      // Add document wide click handler for the current dialog namespace
      $(document).on( "click.ui.dialogClickOutside" + that.eventNamespace, function(event){
        if ( $(event.target).closest($(clickOutsideTriggerEl)).length == 0 && $(event.target).closest($(that.uiDialog)).length == 0){
          that.close();
        }
      });
    }
    
    this._super(); // Invoke parent open method
  },
  
  close: function() {
    var that = this;
    
    // Remove document wide click handler for the current dialog
    $(document).off( "click.ui.dialogClickOutside" + that.eventNamespace );
    
    this._super(); // Invoke parent close method 
  },  

});
