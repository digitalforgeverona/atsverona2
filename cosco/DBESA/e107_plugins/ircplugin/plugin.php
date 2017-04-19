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
// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = "IRC Plugin";
$eplug_version = "1.1";
$eplug_author = "Clarensio";
$eplug_logo = "irc.png";
$eplug_url = "http://www.e107help.org";
$eplug_email = "clarensiofw@hotmail.com";
$eplug_description = "e107 IRC Integrazione (se si &egrave; proceduto ad un upgrade, leggere il file README)";
$eplug_compatible = "e107v7xx";
$eplug_readme = "leggimi.php";	// lasciare vuoto per nessun file leggimi

// Nome per la cartella del plugin -------------------------------------------------------------------------------------
$eplug_folder = "ircplugin";

// Nome del titolo nel per il plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "Chat (IRC)";

// Nome del file di configurazione admin --------------------------------------------------------------------------
$eplug_conffile = "config.php";

// Immagine dell'icona e testo della didascalia ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder."/images/irc.gif";
$eplug_caption =  "Configura IRC Plugin";

// Elenco delle preferenze -----------------------------------------------------------------------------------------------
$eplug_prefs = array(
);

// Elenco dei nomi della tabella -----------------------------------------------------------------------------------------------
$eplug_table_names = array(
	"ircplugin"
);

// elenco delle richieste sql per creare le tabelle -----------------------------------------------------------------------------
$eplug_tables = array(
"CREATE TABLE ".MPREFIX."ircplugin (
        id int(11) NOT NULL default '0',
        server varchar(30) NOT NULL default '',
       	channel1 varchar(200) NOT NULL default '',
				channel2 varchar(200) NOT NULL default '',
				channel3 varchar(200) NOT NULL default '',
        alternatenick varchar(15) NOT NULL default '',
        height varchar(3) NOT NULL default '',
 	  		color1 varchar(7) NOT NULL default '',
				color2 varchar(7) NOT NULL default '',
				color3 varchar(7) NOT NULL default '',
				color4 varchar(7) NOT NULL default '',
				color5 varchar(7) NOT NULL default '',
				color6 varchar(7) NOT NULL default '',
				color7 varchar(7) NOT NULL default '',
				color8 varchar(7) NOT NULL default '',
				color9 varchar(7) NOT NULL default '',
				color10 varchar(7) NOT NULL default '',
				color11 varchar(7) NOT NULL default '',
				color12 varchar(7) NOT NULL default '',
				color13 varchar(7) NOT NULL default '',
				color14 varchar(7) NOT NULL default '',
				color15 varchar(7) NOT NULL default '',
				ircnetwork varchar(150) NOT NULL default '',
				statspage varchar(200) NOT NULL default '',
				quitmsg varchar(200) NOT NULL default '',
        PRIMARY KEY  (id)
      ) TYPE=MyISAM;",
"INSERT INTO ".MPREFIX."ircplugin VALUES (
        1,
        'irc.nome_network.xxx',
        '#Canale1',
				'',
				'',
        'Guest??',
        '400',
        'EFEFEF',
        'EFEFEF',
        'EFEFEF',
        'EFEFEF',
        'EFEFEF',
				'EFEFEF',
				'EFEFEF',
				'EFEFEF',
				'EFEFEF',
				'EFEFEF',
				'EFEFEF',
        'EFEFEF',
				'000000',
				'000000',
        'EFEFEF',
				'Nome_Network',
				'http://www.nome_tuo_sito.yyy/stats.html',
				'visita nome_tuo_sito.yyy');"
);

// Creare il link nel Menù Principale? (si=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = TRUE;
$eplug_link_name = "IRC Chat";
$eplug_link_url = $PLUGINS_DIRECTORY."e107_plugins/ircplugin/irc.php";

// Testo da mostrare al termine dell'installazione positiva del plugin ------------------------------------------------------------------
$eplug_done = "L'IRC Plugin &egrave; stato installato con Successo!!!<br>Ora andare nel Pannello di Configurazione per Configurarlo!!!";

// upgrading ... //

// $upgrade_add_prefs = ""; //

// $upgrade_remove_prefs = ""; //

// $upgrade_alter_tables = ""; //

// $eplug_upgrade_done = ""; //

?>