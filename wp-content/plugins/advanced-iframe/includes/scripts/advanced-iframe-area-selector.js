var selector;
// retry counter is used for Firefox right now!
var retryCounter=0;
var default_url = 'Please enter an url first';

$(document).ready(function () {
  loadData();
});

function loadData() {
  if(window.opener) {
     // load data
     $("#url").val($("#src", window.opener.document).val());
     $("#iframe_width").val($("#width", window.opener.document).val());
     $("#iframe_height").val($("#height", window.opener.document).val());
     var parent_key = $("#securitykey", window.opener.document).val();
     var parent_id = $("#id", window.opener.document).val(); 
     if (typeof parent_key === 'undefined') {
        retryCounter++;
        if (retryCounter < 20) {
           window.setTimeout("loadData()", 100);
           return;
        }   
     }
     updateIframe();
     

  } else {
     $("#main_selector").hide();
     $("#url").val(default_url);
     $("#iframe_width").val("");
     $("#iframe_height").val("");
     var parent_key = "not-set";
     var parent_id = "not-set"; 
     alert("Please use the advanced area selector within the wordpress administraton."); 
  }
  selector = $('#image').imgAreaSelect({ instance: true, handles: true, onSelectChange: function (img, selection) {
    $("#selection_x").val(selection.x1);
    $("#selection_y").val(selection.y1);
    $("#selection_width").val(selection.width);
    $("#selection_height").val(selection.height);
    $("#selection_viewport").val("show_part_of_iframe_next_viewports=\"" +selection.x1 + "," + selection.y1 + "," + selection.width + "," + selection.height + "\"");
    $("#selection_shortcode").val("[advanced_iframe securitykey=\""+parent_key+"\" use_shortcode_attributes_only=\"true\" src=\""+$("#url").val()+"\" id=\""+parent_id+"\" height=\""+$("#iframe_height").val()+"\" width=\""+$("#iframe_width").val()+"\" show_part_of_iframe=\"true\" show_part_of_iframe_x=\""+$("#selection_x").val()+"\" show_part_of_iframe_y=\""+$("#selection_y").val()+"\" show_part_of_iframe_width=\""+$("#selection_width").val()+"\" show_part_of_iframe_height=\""+$("#selection_height").val()+"\"]");    
    } });
}

function updateIframe() {
     var url = $("#url").val();
     var url_enc = encodeURI(url);
     var width = escape($("#iframe_width").val());
     var height = escape($("#iframe_height").val());
     
     if (width != "" && height != "" && url != '' && url != default_url) {
         if (width.indexOf("%") >= 0 || height.indexOf("%") >= 0 ) {
            alert("Please don't use % for the width or the height. The selected area will than vary dependant on the browser size. Please set the height and the width and update the iframe settings.");
            
         } else {
           $("#image").css("width",width).css("height",height);
           $("#iframe").css("width",width).css("height",height);
           $("#iframe").attr('src',url_enc); 
           if (selector) {
               selector.cancelSelection();
           }
           $("#main_selector").show();
         }
     } else {
        alert("Configuration could not be ploaded from the parent page.\nPlease enter the iframe options manually.");
     }
     return false;
}

function copySelection() {
   $("#src", window.opener.document).val(encodeURI($("#url").val()));
   $("#width", window.opener.document).val(escape($("#iframe_width").val()));
   $("#height", window.opener.document).val(escape($("#iframe_height").val()));
   
   if ($("#selection_x").val() != "") { 
      $('input:radio[name=show_part_of_iframe]', window.opener.document)[0].checked = true;
      $('#show_part_of_iframe_x', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_y', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_height', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_width', window.opener.document).prop('readonly',false); 
      $('#show_part_of_iframe_next_viewports', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_new_window', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_new_url', window.opener.document).prop('readonly',false);
      $('input[id=show_part_of_iframe_allow_scrollbar_horizontal]:radio', window.opener.document).attr('disabled',false);  
      $('input[id=show_part_of_iframe_allow_scrollbar_vertical]:radio', window.opener.document).attr('disabled',false);  
      $('input[id=show_part_of_iframe_next_viewports_loop]:radio', window.opener.document).attr('disabled',false);
      $('input[id=show_part_of_iframe_next_viewports_hide]:radio', window.opener.document ).attr('disabled',false); 
      $('#show_part_of_iframe_style', window.opener.document).prop('readonly',false);         
    }  
    $("#show_part_of_iframe_x", window.opener.document).val(escape($("#selection_x").val()));
    $("#show_part_of_iframe_y", window.opener.document).val(escape($("#selection_y").val()));
    $("#show_part_of_iframe_width", window.opener.document).val(escape($("#selection_width").val()));
    $("#show_part_of_iframe_height", window.opener.document).val(escape($("#selection_height").val()));   
    window.close();
}