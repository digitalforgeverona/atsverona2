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
if(!getperms("P")){ header("location:".e_BASE."index.php"); }
require_once(e_ADMIN."auth.php");

require_once(HEADERF);
$caption = "IRC Plugin v1.1 - File ReadMe";
$text = "<b>l'IRC plugin usa <a href=\"http://www.pjirc.com\" target=\"_blank\">PJIRC v2.2.1</a> con l'Interfaccia PIXX</b><br />
<br />
<b>Per ogni Aggiornamento dalla v0.6<br />
<br>Se si &egrave; proceduto ad un aggiornamento dalla v0.6 (o comunque da versioni precedenti) occorre disinstallare il plugin dal pannello dei plugin manager, cancellare poi la sottocartella 'ircplugin' nella cartella '..\e107_plugins\' e procedere all\'upload completo della cartella 'ircplugin' all'interno del file ircplugin_v1.0.2.zipe<br>
<br />
Per ulteriori informazioni..
<br>
<br>
visitare http://www.e107help.org<br />
email: <a href='http://www.clarensio.it/'>Clarensio (clarensiofw@hotmail.com)</a><br />
<br />
Se desiderasse una versione con pi&ugrave; caratteristiche dei canali o altro, mi invii una e-Mail e cercher&ograve; di aiutarLa..<br />
<br><br>
Istruzioni di Installazione<br>
Per procedere con l'installazione, apra il file .Zip, copi la cartella 'ircplugin' nella sua cartella '../e107_plugins/' e quindi proceda ad installare il plugins nel pannello di amministrazione --> Plugins Manager
<br><br>
Per ogni problema riscontrato, mi mandi una e-Mail allegando la descrizione del problema.
<Br><br><a href='config.php'>Cliccare qu&igrave; per Configurare</a> (se il plugin &egrave; gi&agrave; stato installato).
</b>
";

$ns -> tablerender($caption, $text);
require_once(FOOTERF);
?>