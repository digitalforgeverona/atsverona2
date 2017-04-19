<?php
//     Italian Translation: e107 Italian Team  http:www.e107italia.org


define("LANINS_001", "Installazione e107");

define("LANINS_002", "Stage ");
define("LANINS_003", "1");
define("LANINS_004", "Selezione Lingua");
define("LANINS_005", "Prego scegli la Lingua da utilizzare per il processo di installazione");
define("LANINS_006", "Imposta Lingua");
define("LANINS_007", "4");
define("LANINS_008", "Controllo Versioni PHP &amp; MySQL / Controllo Permessi File");
define("LANINS_009", "Retest File Permissions");
define("LANINS_010", "File non scrivibile: ");
define("LANINS_010a", "Cartella non scrivibile: ");
define("LANINS_011", "Errore");
define("LANINS_012", "Le Funzioni MySQL sembrano non esisteret. Questo probabilmente significa che o l'estensione MySQL PHP non è installata oppure che la tua installazione PHP installation non supporta MySQL."); // help for 012
define("LANINS_013", "Impossibile determinare la tua versione MySQL. Questo non costituisce un errore fatale, pertanto continua pure il processo si installazione, ma sii consapevole che e107 richiede MySQL >= 3.23 per funzionare correttamente.");
define("LANINS_014", "Permessi File");
define("LANINS_015", "Versione PHP");
define("LANINS_016", "MySQL");
define("LANINS_017", "OK");
define("LANINS_018", "Assicurati che i seguenti file esistano e siano scrivibili lato server. Questo normalmente richiede che siano settati CHMOD 777, ma in caso contrario - contatta il tuo hosting se hai qualunque problema.");
define("LANINS_019", "La versione PHP installata sul tuo server non e' in grado di funzionare con e107. e107 richiede una versione min. PHP 4.3.0 per funzionare correttamente. Aggiorna la tua versione PHP, oppure contatta il tuo host per un aggiornamento.");
define("LANINS_020", "Continua Installazione");
define("LANINS_021", "2");
define("LANINS_022", "Dettagli Server MySQL");
define("LANINS_023", "Prego inserisci le tue impostazioni MySQL.

Se hai i permessi root puoi creare un nuovo database selezionando la casella 'crea database'. In caso contrario devi creare un database oppure utilizzarne uno pre-esistente.

Se hai soltanto un database usa un prefisso in modo che altri scripts possano condividere lo stesso database.
Se non conosci i dettagli del tuo MySQL contatta il tuo web host.");
define("LANINS_024", "Server MySQL:");
define("LANINS_025", "Username MySQL:");
define("LANINS_026", "Password MySQL:");
define("LANINS_027", "Database MySQL:");
define("LANINS_028", "Crea Database?");
define("LANINS_029", "Prefisso Tabelle:");
define("LANINS_030", "Il server MySQL che vorresti che e107 utilizzasse. Puo' includere un port number. es. \"hostname:port\" oppure una path ad un socket locale es. \":/path/to/socket\" per il localhost.");
define("LANINS_031", "Lo username che vuoi che e107 usi per connettersi al tuo server MySQL");
define("LANINS_032", "La Password scelta per lo username sopra inserito");
define("LANINS_033", "Il database MySQL nel quale vuoi che e107 risieda, a volte riferito ad uno schema. Se l'utente ha un database, crea i permessi con i quali puoi operare per creare automaticamente il database se non esiste gia'.");
define("LANINS_034", "Il prefisso che vuoi che e107 usi nel creare le tabelle. Utile per installazioni multiple di e107 in unico schema database.");
define("LANINS_035", "Continua");
define("LANINS_036", "3");
define("LANINS_037", "Verifica Connessione MySQL");
define("LANINS_038", " e Creazione Database");
define("LANINS_039", "Prego assicurati che tutti i campi richiesti siano compilati, in particolare, Server MySQL, Username MySQL e Database MySQL (Questi sono sempre richiesti dal Server MySQL)");
define("LANINS_040", "Errore");
define("LANINS_041", "Impossibile connettersi al server MySQL utilizzando le informazioni inserite. Prego torna alla pagina precedente e assicurati che tutte le informazioni siano corrette.");
define("LANINS_042", "Connessione al server MySQL stabilita e verificata.");
define("LANINS_043", "Impossibile creare database, prego assicurati di avere i permessi corretti per creare database sul tuo server.");
define("LANINS_044", "Database creato con successo.");
define("LANINS_045", "Prego clicca il pulsante per procedere allo Step successivo.");
define("LANINS_046", "5");
define("LANINS_047", "Dettagli Admministratore");
define("LANINS_048", "Torna indietro all'ultimo Step");
define("LANINS_049", "Le due password inserite non coincidono. Prego torna indietro e riprova.");
define("LANINS_050", "XML Extension");
define("LANINS_051", "Installata");
define("LANINS_052", "Non Installata");
define("LANINS_053", "e107 .700 richiede che sia installata l'Estensione PHP XML. Prego contatta il tuo host oppure leggi le informazioni qui: ");
define("LANINS_054", " prima di continuare");
define("LANINS_055", "Conferma Installazione");
define("LANINS_056", "6");
define("LANINS_057", " e107 ha ora tutte le informazioni per completare l'installazione.

Prego clicca il pulsante per creare le tabelle database e salvare tutte le impostazioni.

");
define("LANINS_058", "7");
define("LANINS_060", "Impossibile leggere il datafile sql

Prego assicurati che il file <b>core_sql.php</b> esista nella directory <b>/e107_admin/sql</b>.");
define("LANINS_061", "e107 non e' stato in grado di creare tutte le tabelle richieste nel database.
Prego pulisci il database e rettifica qualunque inconveniente prima di riprovare nuovamente.");

define("LANINS_062", "[b]Benvenuto al tuo nuovo sito e107![/b]
e107 e' stato installato con successo ed e' ora pronto all'inserimento di contenuti.<br />L'Area Amministrazione e' [link=e107_admin/admin.php]qui[/link], clicca per accedere. Dovrai fare il Login utilizzando Username e Password memorizzate nel processo di installazione.

[b]Supporto[/b]
e107 Team: [link=http://www.e107it.org]http://www.e107it.org[/link], Team di Supporto Italiano.

e107 Homepage: [link=http://e107.org]http://e107.org[/link], qui troverai FAQ e documentazione (in Inglese).
Forums: [link=http://e107.org/e107_plugins/forum/forum.php]http://e107.org/e107_plugins/forum/forum.php[/link]

[b]Downloads[/b]
Plugins: [link=http://e107coders.org]http://e107coders.org[/link]
Themes: [link=http://e107styles.org]http://e107styles.org[/link] | [link=http://e107themes.org]http://e107themes.org[/link]

Grazie per aver scelto e107, ci auguriamo soddisfi le tue esigenze di un sito web.
(Puoi cancellare questo messaggio dall'Area Amministrazione.)");

define("LANINS_063", "Benvenuto a e107");

define("LANINS_069", "e107 e' stato installato con successo!

Per motivi di sicurezza dovresti impostare i permessi sul file <b>e107_config.php</b> a 644.

Prego cancella anche il file <b>install.php</b> dal tuo server dopo aver cliccato il pulsante sottostante
");
define("LANINS_070", "e107: impossibile salvare il file principale config sul tuo server.

Prego assicurati che il file <b>e107_config.php</b> abbia i permessi corretti");
define("LANINS_071", "Completamento Installazione");

define("LANINS_072", "Username Amministratore");
define("LANINS_073", "Questo e' il nome che userai per accedere al sito.");
define("LANINS_074", "Nome Reale Amministratore");
define("LANINS_075", "Questo e' il nome che vuoi che sia mostrato agli utenti nel tuo Profilo, Forum e altre aree del sito. Se desideri utilizzare solo lo Username, lascia vuoto questo campo.");
define("LANINS_076", "Password Amministratore");
define("LANINS_077", "Prego inserisci la password amministratore che vuoi usare");
define("LANINS_078", "Conferma Password Amministratore");
define("LANINS_079", "Prego digita nuovamente la password amministratore per la conferma");
define("LANINS_080", "Email Amministratore");
define("LANINS_081", "Inserisci il tuo indirizzo email");

define("LANINS_082", "user@yoursite.com");

// Better table creation error reporting (versione di upgrade alla 0.7.3)
define("LANINS_083", "Errori riscontati MySQL:");
define("LANINS_084", "Lo script di installazione non può stabilire una connessione al database");
define("LANINS_085", "Lo script di installazione non può selezionare il database:");

define("LANINS_086", "Username Admin, Password  Admin and Email Admin  sono  campi <b>necessari</b>. Ritorna all'ultimo form e verifica che i dati siano correttamente inseriti.");

define("LANINS_087", "Miscellanea");
define("LANINS_088", "Home");
define("LANINS_089", "Download");
define("LANINS_090", "Utenti");
define("LANINS_091", "Invia News");
define("LANINS_092", "Contatti");
define("LANINS_093", "Abilita accesso a elementi riservati dei menu");
define("LANINS_094", "Esempio Gruppo riservato forum");
define("LANINS_095", "Verifica Integrità");

define("LANINS_096", 'Ultimi commenti');
define("LANINS_097", '[ancora ...]');
define("LANINS_098", 'Articoli');
define("LANINS_099", 'Front Page Articoli ...');
define("LANINS_100", 'Ultimi Post Forum');
define("LANINS_101", 'Aggiorna menu impostazioni');
define("LANINS_102", 'Data / Ora');
define("LANINS_103", 'Recensioni');
define("LANINS_104", 'Front Page Recensioni...');


// AGGIORNAMENTO 7.12

define("LANINS_105", "Non è consentito un Nome o Prefisso di Database che inizi con \'e\' or \'E\' ");
define("LANINS_106", "WARNING - E107 non può scrivere nelle directory e/o file elencati. Questo non interromperà l\'installazione di E107 ma alcune impostazioni non saranno disponibili. 
				Ti sarà richiesto di cambiare i permessi dei file per poter utilizzare queste impostazioni.");
define("LANINS_107", "");
define("LANINS_108", "");




?>
