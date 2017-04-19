<?php
/*
+---------------------------------------------------------------+
| IRC plugin v1.1 per il e107v0.7xx content management system
|
| un altro plugin casuale da http://www.e107help.org
|
| Realizzato in conformità dei termini e delle condizioni della
| GNU General Public License (http://gnu.org).
+---------------------------------------------------------------+
*/
require_once("../../class2.php");
if(!getperms("P")){ header("location:".e_BASE."index.php"); }
require_once(e_PLUGIN."ircplugin/languages/irc_lan_".e_LANGUAGE.".php");
require_once(e_ADMIN."auth.php");

unset($text);

if(IsSet($_POST['update_ircplugin'])){
	$sql -> db_Update("ircplugin", "server='".$_POST['ircplugin_server']."', channel1='".$_POST['ircplugin_channel1']."', channel2='".$_POST['ircplugin_channel2']."', channel3='".$_POST['ircplugin_channel3']."', alternatenick='".$_POST['ircplugin_alternatenick']."', height='".$_POST['ircplugin_height']."', color1='".$_POST['ircplugin_color1']."', color2='".$_POST['ircplugin_color2']."', color3='".$_POST['ircplugin_color3']."', color4='".$_POST['ircplugin_color4']."', color5='".$_POST['ircplugin_color5']."', color6='".$_POST['ircplugin_color6']."', color7='".$_POST['ircplugin_color7']."', color8='".$_POST['ircplugin_color8']."', color9='".$_POST['ircplugin_color9']."', color10='".$_POST['ircplugin_color10']."', color11='".$_POST['ircplugin_color11']."', color12='".$_POST['ircplugin_color12']."', color13='".$_POST['ircplugin_color13']."', color14='".$_POST['ircplugin_color14']."', color15='".$_POST['ircplugin_color15']."', ircnetwork='".$_POST['ircplugin_ircnetwork']."',
	 statspage='".$_POST['ircplugin_statspage']."', quitmsg='".$_POST['ircplugin_quitmsg']."' WHERE id='1'");
	$ns -> tablerender("", "<div style='text-align:center'><b>".IRC_LAN_20."</b></div>");
}

$sql -> db_Select("ircplugin", "*", "id=1");
list($id, $server, $channel1, $channel2, $channel3, $alternatenick, $height, $color1, $color2, $color3, $color4, $color5, $color6, $color7, $color8, $color9, $color10, $color11, $color12, $color13, $color14, $color15, $ircnetwork, $statspage, $quitmsg) = $sql-> db_Fetch();

$text .= "<div style='text-align:center'>
<form method='post' action='".e_SELF."'>\n
<table style='width:90%' class='fborder'>
<tr>
  <td style='width:30%' class='forumheader1'>-- Configurazione del Plugin IRC --</td>
  <td style='width:70%' class='forumheader1'></td>
</tr>

<tr>
  <td style='width:30%' class='forumheader3'>Nome del Network IRC:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_ircnetwork' size='30' value='".$ircnetwork."' maxlength='180' /> Network del suo Canale IRC operativo</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>URL del Server IRC di Default:Porta:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_server' size='30' value='".$server."' maxlength='30' /> Indirizzo Web del Server:Porta (Porta standard:6667)</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Canale 1:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_channel1' size='30' value='".$channel1."' maxlength='200' /> Il Nome del Canale IRC del suo Sito (comprensivo di #)</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Canale 2:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_channel2' size='30' value='".$channel2."' maxlength='200' /> (blank = nessun Canale 2)</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Canale 3:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_channel3' size='30' value='".$channel3."' maxlength='200' /> (blank = nessun Canale 3)</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Usare il seguente nickname se limitato:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_alternatenick' size='15' value='".$alternatenick."' maxlength='15' /> Se vuoto, usa il nome dell'Utente</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Altezza in pixel del Client:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_height' size='3' value='".$height."' maxlength='3' /> Pixels</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Messaggio di Uscita:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_quitmsg' size='30' value='".$quitmsg."' maxlength='200' /></td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Pagina di Statistica:</td>
  <td style='width:70%' class='forumheader3'><input class='tbox' type='text' name='ircplugin_statspage' size='40' value='".$statspage."' maxlength='200' /># for no page</td>
</tr>
  <td style='width:30%' class='forumheader1'><br/>-- Colori del Plugin IRC --</td>
  <td style='width:70%' class='forumheader1'></td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 13:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color13' size='8' value='".$color13."' maxlength='8' /> Testo</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 14:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color14' size='8' value='".$color14."' maxlength='8' /> Bordi</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 15:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color15' size='8' value='".$color15."' maxlength='8' /> Bordi Obliqui cursore di scorrimento finestra</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 1:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color1' size='8' value='".$color1."' maxlength='8' /> Ombra Pulsanti Split Finestra e Chiusura</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 2:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color2' size='8' value='".$color2."' maxlength='8' /> Sfondo pulsanti e barre di scorrimento</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 3:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color3' size='8' value='".$color3."' maxlength='8' /> Sfondo barre pulsanti superiore/inferiore e barre di scorrimento, sfondo elenco Utenti nel Canale</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 4:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color4' size='8' value='".$color4."' maxlength='8' /> Sfondo pulsante/i Canale/i - Sezione pubblica</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 5:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color5' size='8' value='".$color5."' maxlength='8' /> Sfondo pulsante/i Canale/i - Sezione privata</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 6:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color6' size='8' value='".$color6."' maxlength='8' /> Sfondo Pulsanti Split Finestra e Chiusura</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 7:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color7' size='8' value='".$color7."' maxlength='8' /> Selezione: Stato e Finestra attivi</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 8:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color8' size='8' value='".$color8."' maxlength='8' /> Sfondo pulsante Op</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 9:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color9' size='8' value='".$color9."' maxlength='8' /> Pulsante di Chiusura</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 10:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color10' size='8' value='".$color10."' maxlength='8' /> Sfondo targhetta Utenti Voice</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 11:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color11' size='8' value='".$color11."' maxlength='8' /> Sfondo targhetta Utenti Op</td>
</tr>
<tr>
  <td style='width:30%' class='forumheader3'>Colore 12:</td>
  <td style='width:70%' class='forumheader3'>#<input class='tbox' type='text' name='ircplugin_color12' size='8' value='".$color12."' maxlength='8' /> Sfondo targhetta Utenti Auto-Op</td>
</tr>
<tr style='vertical-align:top'>
  <td colspan='2' style='text-align:center' class='forumheader'>
  <input class='button' type='submit' name='update_ircplugin' value='Aggiorna Configurazione IRC' />
</td>
</tr>
</table>";
  
$ns -> tablerender("<div style='text-align:center'>Configurazione IRC</div>", $text);

require_once(e_ADMIN."footer.php");
?>	
