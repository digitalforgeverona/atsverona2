
<?	
  // ===========================================================================
  // File:        ajchat_menu.php
  // Author:      Jan van Rensburg (JVR Software) 2009
  // Email:       jvrsoftware@jvrsoftware.co.za
  // Description: This file displays a ajax chat window linking to user profiles.
  // Notes:       Be sure to set chat.txt file permissions to 0666
  // License:     Released under the terms and conditions of the GNU General
  //              Public License (http://gnu.org).
  // ===========================================================================
		$textmenu = "		
		<table width='100%'  border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>
		
					
			<div class='forumheader3' width='100%' id='chatwindow'> </div>		
";
if (USER) 
{
$textmenu .= "		<div class='forumheader4' width='100%' align='right'>
			<input  id='chatnick' type='hidden' size='9' maxlength='9' value='".USERNAME."'>
			<input  id='chatmsg' type='text'  style='width:100%;' maxlength='80'  onkeyup='keyup(event.keyCode);'></div>
			<div width='100%' align='right'><input class='button' type='button' value=' Send ' onclick='submit_msg();'></div> ";
} else {
$textmenu .= "		<div class='forumheader4' width='100%'>
			<input id='chatnick' type='hidden' size='9' maxlength='9' value='".USERNAME."'>&nbsp;
			<input id='chatmsg' type='hidden' style='width:100%;' maxlength='80' onkeyup=''> 
			<input type='hidden' value=' Send ' onclick='' > </div>";

}
$textmenu .= "		
		</td>
  </tr>
</table>



<script type='text/javascript'>
ajax_read('".e_PLUGIN."ajax_chat/chat.txt')
/* Settings you might want to define */
	var waittime=800;		

/* Internal Variables & Stuff */
	chatmsg.focus()
	document.getElementById('chatwindow').innerHTML = 'loading...';

	var xmlhttp = false;
	var xmlhttp2 = false;


/* Request for Reading the Chat Content */
function ajax_read(url) {

	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
		if(xmlhttp.overrideMimeType){
			xmlhttp.overrideMimeType('text/xml');
		}
	} else if(window.ActiveXObject){
		try{
			xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');
		} catch(e) {
			try{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			} catch(e){
			}
		}
	}

	if(!xmlhttp) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}

	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState==4) {
		document.getElementById('chatwindow').innerHTML =  xmlhttp.responseText;

		zeit = new Date(); 
		ms = (zeit.getHours() * 24 * 60 * 1000) + (zeit.getMinutes() * 60 * 1000) + (zeit.getSeconds() * 1000) + zeit.getMilliseconds(); 
		intUpdate = setTimeout(ajax_read('".e_PLUGIN."ajax_chat/chat.txt?x=' + ms), waittime)
		}
	}

	xmlhttp.open('GET',url,true);
	xmlhttp.send(null);
}

/* Request for Writing the Message */
function ajax_write(url){
	if(window.XMLHttpRequest){
		xmlhttp2=new XMLHttpRequest();
		if(xmlhttp2.overrideMimeType){
			xmlhttp2.overrideMimeType('text/xml');
		}
	} else if(window.ActiveXObject){
		try{
			xmlhttp2=new ActiveXObject('Msxml2.XMLHTTP');
		} catch(e) {
			try{
				xmlhttp2=new ActiveXObject('Microsoft.XMLHTTP');
			} catch(e){
			}
		}
	}

	if(!xmlhttp2) {
		alert('Giving up Cannot create an XMLHTTP instance');
		return false;
	}



	xmlhttp2.open('GET',url,true);
	xmlhttp2.send(null);
}

/* Submit the Message */
function submit_msg(){
	nick = document.getElementById('chatnick').value;
	msg = document.getElementById('chatmsg').value;

	if (nick == '') { 
		check = prompt('please enter username:'); 
		if (check === null) return 0; 
		if (check == '') check = 'anonymous'; 
		document.getElementById('chatnick').value = check;
		nick = check;
	} 

	document.getElementById('chatmsg').value = '';
	ajax_write(\"".e_PLUGIN."ajax_chat/w.php?m=\" + msg + \"&n=\" + nick);
}

/* Check if Enter is pressed */
function keyup(arg1) { 
	if (arg1 == 13) submit_msg(); 
}

/* Start the Requests! ;) */

var intUpdate = setTimeout(ajax_read('".e_PLUGIN."ajax_chat/chat.txt'), waittime);



</script>";
$ns->tablerender("Website Chat", $textmenu);
?>