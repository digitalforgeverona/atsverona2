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
require_once(e_PLUGIN."ircplugin/languages/irc_lan_".e_LANGUAGE.".php");
require_once(HEADERF);

//--------------------------------------------------------------------------------

$irclang = e_LANGUAGE;
$irchead = "<div style='text-align:center'>Chat (IRC)</div>";

$sql -> db_Select("ircplugin", "*", "id=1");
list($id, $server, $channel1, $channel2, $channel3, $alternatenick, $height, $color1, $color2, $color3, $color4, $color5, $color6, $color7, $color8, $color9, $color10, $color11, $color12, $color13, $color14, $color15, $ircnetwork, $statspage, $quitmsg) = $sql-> db_Fetch();

$text .= "<center><p align='center'><b>Questa ChatIRC fa parte di <a href='irc://".$server."'>".$ircnetwork."</a>;<br/> sei nel Canale ".$channel3."</b><br><br>
<applet code='IRCApplet.class' archive='irc.jar,pixx.jar' width='100%' height='".$height."'>
<param name='CABINETS' value='irc.cab,securedirc.cab,pixx.cab'>
<param name='pixx:color2' value='".$color1."'>
<param name='pixx:color5' value='".$color2."'>
<param name='pixx:color6' value='".$color3."'>
<param name='pixx:color7' value='".$color4."'>
<param name='pixx:color8' value='".$color5."'>
<param name='pixx:color9' value='".$color6."'>
<param name='pixx:color10' value='".$color7."'>
<param name='pixx:color11' value='".$color8."'>
<param name='pixx:color12' value='".$color9."'>
<param name='pixx:color13' value='".$color10."'>
<param name='pixx:color14' value='".$color11."'>
<param name='pixx:color15' value='".$color12."'>
<param name='pixx:color1' value='".$color13."'>
<param name='pixx:color4' value='".$color14."'>
<param name='pixx:color3' value='".$color15."'>
<param name='nick' value='".USERNAME."'>
<param name='alternatenick' value='".$alternatenick."'>
<param name='name' value='webchat'>
<param name='host' value='".$server."'>
<param name='gui' value='pixx'>
<param name='language' value='italianoISO'>
<param name='pixx:language' value='pixx-italianoISO'>
<param name='command1' value='join ".$channel3."'>
<param name='command2' value='join ".$channel1."'>
<param name='command3' value='join ".$channel2."'>
<param name='quitmessage' value='".$quitmsg."'>
</applet></p> <p align='center'>".IRC_LAN_3."<br>
<a href='irchelp.php' target='_blank'>Aiuto/Comandi</a></p>
</center>";

  $ns -> tablerender($irchead, $text);

  require_once(FOOTERF);
?>


/*
//</applet></p><br>You Can Check Out <a href='".$statspage."'>Our Channel's Stats Here</a><br>
*/