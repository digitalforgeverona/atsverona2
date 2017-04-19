<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system - Language File.
|
|     $Source: /cvs_backup/e107_0.7/e107_languages/English/English.php,v $
|     $Revision: 11660 $
|     $Date: 2010-08-16 11:41:35 -0500 (Mon, 16 Aug 2010) $
|     $Author: secretr $
+----------------------------------------------------------------------------+
*/
setlocale(LC_ALL, 'it_IT.UTF-8', 'it');  // DA VERIFICARE
define("CORE_LC", "it");
define("CORE_LC2", "it");
// define("TEXTDIRECTION","rtl");
define("CHARSET", "utf-8");
define("CORE_LAN1", "Errore : Manca il tema.\\n\\nCambia il tema impostato nelle preferenze (admin area) o fai l'upload del files del tema corrente sul server.");

//v.616
//obsolete define("CORE_LAN2", " \\1 ha scritto:");//  "\\1" represents the username.
//obsolete define("CORE_LAN3", "Caricamento dei Files disabiltato");

//v0.7+
define("CORE_LAN4", "Elimina install.php dal tuo server");
define("CORE_LAN5", "lasciarlo sul server costituisce una fonte di pericolo");

// v0.7.6
define("CORE_LAN6", "La protezione anti flood è stata attivata su questo sito; questo messaggio ti avvisa che se contui con le operazioni che stai compiendo, potresti essere bannato dal sito.");
define("CORE_LAN7", "Core tenta di ripristinare le prefs dal backup automatico.");
define("CORE_LAN8", "Errore nelle Core Prefs");
define("CORE_LAN9", "Core non può ripristinare dal backup automatico.");
define("CORE_LAN10", "Rilevato un cookie corrotto - Log out.");

// Footer
define("CORE_LAN11", "Render time:");
define("CORE_LAN12", "sec");
define("CORE_LAN13", "di queries.");
define("CORE_LAN14", "");          // Used in 0.8
define("CORE_LAN15", "queries DB");
define("CORE_LAN16", "Memoria in uso:");

// img.bb
define('CORE_LAN17', '[ immagine disabilitata ]');
define('CORE_LAN18', 'Immagine: ');

define("CORE_LAN_B", "b");
define("CORE_LAN_KB", "kb");
define("CORE_LAN_MB", "Mb");
define("CORE_LAN_GB", "Gb");
define("CORE_LAN_TB", "Tb");


define("LAN_WARNING", "Attenzione!");
define("LAN_ERROR", "Errore");
define("LAN_ANONYMOUS", "Anonimo");
define("LAN_EMAIL_SUBS", "-email-");

// 0.7.23
define("LAN_SANITISED", "SANITISED");
?>