<?
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

$text = "<body><b>".IRC_LAN_12."</b><br>
".IRC_LAN_8."<Br>
".IRC_LAN_13."<br>
<br><br>
".IRC_LAN_5."<br>
<br>".IRC_LAN_4."
<br>".IRC_LAN_2."
<br><br>
".IRC_LAN_10."<br>
".IRC_LAN_14."<br>
</body>";

$ns -> tablerender($text);
?>