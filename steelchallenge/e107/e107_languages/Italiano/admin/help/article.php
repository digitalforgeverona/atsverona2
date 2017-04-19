<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     ©Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $Source: /cvsroot/e107/e107_0.7/e107_languages/English/admin/help/article.php,v $
|     $Revision: 1.2 $
|     $Date: 2005/12/14 17:37:43 $
|     $Author: sweetas $
|     Italian Translation:
|           e107 Italian Team http://www.e107it.org
|           con la collaborazione di Stefano Vecchi
+----------------------------------------------------------------------------+
*/

$text = "Da questa pagina puoi aggiungere articoli singoli o multi-pagina.<br />
 Per un articolo multipagina separa ogni pagina con il testo [newpage], per esempio <br /><code>Test1 [newpage] Test2</code><br /> potrai creare would un articolo a due pagine con 'Test1' sulla pagina 1 e 'Test2' sulla 2.
<br /><br />
Se il tuo articolo contiene TAGS HTML che vuoi mantenere, racchiudi il codice tra [html] [/html]. Per esempio se tu inserisci il testo  '&lt;table>&lt;tr>&lt;td>Ciao &lt;/td>&lt;/tr>&lt;/table>' nel tuo articolo, dovrebbe essere visualizzata una tabella contenente la parola Ciao. Se inserisci '[html]&lt;table>&lt;tr>&lt;td>Ciao &lt;/td>&lt;/tr>&lt;/table>[/html]' il codice che hai inserito dovrebbe essere visualizato al posto della tabella.";
$ns -> tablerender("Article Help", $text);
?>
