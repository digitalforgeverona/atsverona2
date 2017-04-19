<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system - Language File.
|
|     $Source: /cvsroot/e107/e107_0.7/e107_plugins/content/languages/English/lan_content_help.php,v $
|     $Revision: 1.14 $
|     $Date: 2005/06/29 23:01:57 $
|     $Author: lisa_ $
|     Italian Translation: e107 Italian Team http://www.e107it.org	
+----------------------------------------------------------------------------+
*/
define("CONTENT_ADMIN_HELP_1", "Help Area Gestione Contenuti");
define("CONTENT_ADMIN_HELP_ITEM_1", "<i>Se non hai ancora aggiunto una categoria principale, creala qui <a href='".e_SELF."?cat.create'>Crea Nuova Categoria</a>.</i><br />
<br /><b>Categoria</b><br />
Seleziona una categoria dal men a discesa per gestirne i contenuti.<br /><br />
Selezionano una categoria principale tutti i suoi contenuti verranno visualizzati.<br />
Selezionando una sotto categoria saranno visualizzati solo i contenuti di quest'ultima.<br /><br />
In alternativa puoi anche usare il men  sulla destra.");
define("CONTENT_ADMIN_HELP_ITEM_2", "<b>Prima Lettera</b><br />
Se esistono molti contenuti, verr visualizzata la prima lettera dell'intestazione degli stessi. Selezionando il bottone tutti verranno visualizzati tutti i contenuti.<br /><br /><b>
Dettagli</b><br />
Vedrai una lista di tutti i contenuti col loro id, icona, autore, intestazione [sottointestazione] e opzioni.<br /><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link al contenuto<br />
".CONTENT_ICON_EDIT." : modifica<br />
".CONTENT_ICON_DELETE." : elimina <br />");
define("CONTENT_ADMIN_HELP_ITEMEDIT_1", "<b>Modulo di modifica</b><br />
Puoi modificare tutte le informazioni per questo contenuto e salvare le modifiche.<br /><br />
Se necessiti di cambaire la categoria per quel contentuto, fai prima questo, per favore. Dopo aver selezionato la categoria, cambia o aggiungi campi, prima di salvare i cambiamenti.");
define("CONTENT_ADMIN_HELP_ITEMCREATE_1", "<b>categoria</b><br />
Seleziona una categoria dal men  a tendina prima per crere dei contenuti.<br />");
define("CONTENT_ADMIN_HELP_ITEMCREATE_2", "<b>Moudlo Creazione</b><br />
Puoi dare tutte le informazioni per questo contenuto, quindi salvarlo.<br /><br />
Sii conscio del fatto che differenti categorie principali hanno set di impostazioni diversi; campi differenti possono disponibili per l'inserimento dati. Ad ogni modo devi sempre selezionare la categoria prima di riempire i campi!");
define("CONTENT_ADMIN_HELP_CAT_1", "<i>Questa pagina visualizza tutte le categorie e sottocategorie presenti.</i><br /><br />
<b>Dettagli</b><br />
Puoi vedere la lista di tutte le sottocategorie col loro id, icona, autore, intestazione [sottointestazione] e opzioni.<br /><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link alla categoria<br />
".CONTENT_ICON_EDIT." : modifica<br />
".CONTENT_ICON_DELETE." : elimina<br />");
define("CONTENT_ADMIN_HELP_CAT_2", "<i>Questa pagina ti permette di creare una nuova categoria</i><br /><br />
Scegli sempre una categoria principale prima di riempire i campi !<br /><br />
Ci deve essere fatto, perch  alcune preferenze univocche delle categorie necessitano di essere caricate nel sistema.<br /><br />
Di default la pagina delle categorie  impostata per creare una nuova categoria principale.");
define("CONTENT_ADMIN_HELP_CAT_3", "<i>Questa pagina mostra il modulo di modifica delle categorie.</i><br /><br />
<b>Modulo di modifica categorie</b><br />
Puoi modificare tutte le informazioni di questa (sotto)categoria e salvarne i cambiamenti.<br /><br />
Se vuoi cambiare la Categoria Principale di questa Categoria, fai questo prima di ogni altra operazione. Dopo aver settato la categoria corretta modifica tutti gli altri campi.");
define("CONTENT_ADMIN_HELP_ORDER_1", "<i>Questa pagina visualizza tutte le categorie e sottocategorie presenti.</i><br /><br />
<b>Dettagli</b><br />
Vedi id categorie e il nome della stessa. Inoltre hai ha disposizione opzioni per l'ordinamento delle categorie.<br /><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link to al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link alla categoria<br />
".CONTENT_ICON_ORDERALL." : gestione contenuti categoria.<br />
".CONTENT_ICON_ORDERCAT." : gestione ordinamento contenuti nella categoria.<br />
".CONTENT_ICON_ORDER_UP." : il bottone s  sposta in alto il contenuto.<br />
".CONTENT_ICON_ORDER_DOWN." : il bottone gi sposta in basso il contenuto.<br /><br />
<b>Ordinamento</b><br />
puoi impostare manualmente l'ordine di tutte le categorie. Devi cambiare il valore nel bottone del box di selezione quindi premere il bottone sotto per rendere effettivo l'ordinamento.<br />");
define("CONTENT_ADMIN_HELP_ORDER_2", "<i>Questa pagina visualizza tutti i contenuti della categoria che hai selezionato.</i><br /><br />
<b>dettagli</b><br />
vedi l'id del contenuto, il suo autore e la sua intestazione. Inoltre sono presenti diverse opzioni per la gestione.<br /><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link al contenuto<br />
".CONTENT_ICON_ORDER_UP." : il bottone s  sposta in alto il contenuto.<br />
".CONTENT_ICON_ORDER_DOWN." : il bottone gi sposta in basso il contenuto.<br /><br />
<b>ordinamenro</b><br />
Puoi impostare manualmente l'ordine delle categorie. Devi cambiare il valore nel bottone del box di selezione quindi premere il bottone sotto per rendere effettivo l'ordinamento.<br />");
define("CONTENT_ADMIN_HELP_ORDER_3", "<i>Questa pagina visualizza tutti i contenuti della Categoria Principale che hai selezionato.</i><br /><br />
<b>Dettagli</b><br />
Vedi l'id del contenuto, il suo autore e la sua intestazione. Vedi inlotre altre opzioni per gestire  l'ordinamento.<br /><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link al contenuto<br />
".CONTENT_ICON_ORDER_UP." : il bottone s  sposta in alto il contenuto.<br />
".CONTENT_ICON_ORDER_DOWN." : il bottone gi sposta in basso il contenuto.<br /><br />
<b>ordinamenro</b><br />
Puoi impostare manualmente l'ordine delle categorie. Devi cambiare il valore nel bottone del box di selezione quindi premere il bottone sotto per rendere effettivo l'ordinamento.<br />");
define("CONTENT_ADMIN_HELP_OPTION_1", "Su questa pagina puoi selezionare una Categoria Principale per impostarne le opzioni, oppure scegliere di modificare quelle di default.<br /><br />
<b>explanation of icons</b><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link alla categoria<br />
".CONTENT_ICON_OPTIONS." : modifica le opzioni<br /><br /><br />
Le impostazioni di default sono usate solamente quando si crea una categoria principale. Cos  quando ne crei una queste opzioni di default vengono salvate. Puoi quindi cambiare le impostazioni di default per essere sicuro che le nuove categorie princiapli salvato abbiano le caratteristiche che desideri.<br /><br />
Ogni Categoria Principale ha un suo proprio set di opzioni, che sono quindi univoci");
define("CONTENT_ADMIN_HELP_MANAGER_1", "In questa pagina vedi la lista di tutte le categorie. Puoi gestire 'Manager Contenuti Personali' per ogni categoria premendo sull'icona.<br /><br />
<b>Spiegazione delle icone</b><br />
".CONTENT_ICON_USER." : link al profilo dell'autore<br />
".CONTENT_ICON_LINK." : link alla categoria<br />
".CONTENT_ICON_CONTENTMANAGER_SMALL." : modifica manager categorie personale<br />");
define("CONTENT_ADMIN_HELP_MANAGER_2", "<i>Su questa pagina puoi asseganre utenti alla categoria selezionata</i><br /><br />
<b>Gestione Personale</b><br />Puoi assegnare utenti a determinate categorie. Facendo cos, questi utenti possono gestire i loro contenuti personali anche al di fuori dell'amministrazione
(content_manager.php).<br /><br />Assegna utenti dalla colonna di sinistra clickando il loro nome. Potrai vedere  i nomi selezionati nella colonna di destra.
Dopo aver premuto il pulsante di assegnazione gli utenti della colonna di destra saranno assegnati a questa categoria.");
define("CONTENT_ADMIN_HELP_SUBMIT_1", "<i>In questa pagina vedi una lsita di tutti i contenuti inviati dagli utenti.</i><br />
<br /><b>Dettagli</b><br />Vedrai una lista con tutti i dettagli relativi all'invio id, icona, categoria principale, Intestazione [sottointestazione], autore e opzioni.<br />
<br /><b>Opzioni</b><br />Puoi approvare o eliminare un contenuto usando i bottoni visualizzati.");
define("CONTENT_ADMIN_HELP_OPTION_DIV_1", "Questa pagina ti permette di impostare le opzioni per la creazione dei contenuti.<br />
<br />Puoi definire in qualis ezioni renderle disponibili quando un Amministratore (o un personal manager) crea a nuovo contenuto<br />
<br /><b>Data Tags Personalizzati</b>
<br />Puoi permettere di aggiungere un campo opzionale al contenuto usando questi Data Tags Personalizzati. Questi campi opzionali sono blank key=>value pairs. Per esempio: puoi aggiungere un key field per 'Fotografo' e assegnare il valore con 'tutte le mie foto'. 
Sia questa chiave che questo valore soon campi testo vuoti e saranno presenti nel modulo creato.<br /><br />
<b>Data tags default</b><br />
Oltre ai Tags Personalizzati, puoi assegnare Tags di default. La differenza consiste nel fatto che i tags default, hanno gi  valori assegnati e l'utente deve solo riempire il campo valore.
 Per rimprendere l'esempio di prima 'Fotografo' pu essere di default, e l'utente dovr  assegnare 'tutte le mie foto'.
<br />");
define("CONTENT_ADMIN_HELP_OPTION_DIV_2", "Puoi definire quali sezioni sono disponibili per l'invio dei contenuti.<br />
<br />".CONTENT_ADMIN_OPT_LAN_11.":<br />".CONTENT_ADMIN_OPT_LAN_12."");
define("CONTENT_ADMIN_HELP_OPTION_DIV_3", "In Percorso e Opzioni Tema puoi definire dove files e immagini vengono memorizzate.<br /><br />
Puoi definire quale tema sar usato nella categoria principale. Puoi creare temi addizionali copiando (e rinominando) la cartella di 'default' completa nella cartelle dei Template.<br />
<br />Puoi definire uno schema di layout dui default  per i nuovi contenuti. Puoi creare nouvi layout con il  file content_content_template_XXX.php  in  'templates/default'. Questi layout possono essere usati per dare ad ogni contenuto un'impostazione diversa.<br /><br />");
define("CONTENT_ADMIN_HELP_OPTION_DIV_4", "Le Opzioni Generali sono usate in tutti i contenuti.");
define("CONTENT_ADMIN_HELP_OPTION_DIV_5", "Queste opzioni hanno influenza anche sulla Gestione Contenuti Personale.<br />
<br />".CONTENT_ADMIN_OPT_LAN_63."");
define("CONTENT_ADMIN_HELP_OPTION_DIV_6", "Queste opzioni sono usate nel Blocco Menu per questa categoria principale se tu hai attivato il Blocco Menu.<br />
<br />".CONTENT_ADMIN_OPT_LAN_68."<br />
<br />".CONTENT_ADMIN_OPT_LAN_118.":<br />".CONTENT_ADMIN_OPT_LAN_119."<br /><br />");
define("CONTENT_ADMIN_HELP_OPTION_DIV_7", "Le Opzioni di Anteprima dei Contenuti agiscono sull'anteprima dei contenuti.<br />
<br />Questa anteprima   data in varie pagine, tipo pagine recenti, la visualzzazione nella pagina delle categorie e la visualizzazione della pagina Autori.<br />
<br />".CONTENT_ADMIN_OPT_LAN_68."");
define("CONTENT_ADMIN_HELP_OPTION_DIV_8", "La pagina delle categorie visualizza informazioni sui contentuti presenti nella categoria principale.<br />
<br />Sono presenti due aree distinte:<br />
<br />Pagina di tutte le categorie:<br />mostra tutte le categorie contenute nella categoria principale<br />
<br />Visualizzazione Pagina Categoria:<br />mostra le categorie, opzionalmente le sotto-categorie in quella categoria e il contenuto in quella categoria di tutte le sotto-categorie<br />");
define("CONTENT_ADMIN_HELP_OPTION_DIV_9", "La pagina dei contenuti visualizza i contenuti.<br />
<br />Puoi definire quali sezioni mostrare puntando/spuntando le opzioni nel box.<br />
<br />Puoi mostrare indirizzo email di un autore non registrato.<br />
<br />Puoi impostare le icone email/stamap/pdf, il sistema di valutazione ed i commenti.<br />
<br />".CONTENT_ADMIN_OPT_LAN_74."");
define("CONTENT_ADMIN_HELP_OPTION_DIV_10", "La Pagina Autori visualizza la lista degli autori dei contentuti in una determinata categoria principale.<br />
<br />Puoi definire quali sezioni mostrare puntando/spuntando le opzioni nel box.<br />");
define("CONTENT_ADMIN_HELP_OPTION_DIV_11", "La Pagina Archivio visualizza la lista dei contentuti in una determinata categoria principale.<br />
<br />>Puoi definire quali sezioni mostrare puntando/spuntando le opzioni nel box.<br />
<br />".CONTENT_ADMIN_OPT_LAN_66."<br /><br />".CONTENT_ADMIN_OPT_LAN_68."");
define("CONTENT_ADMIN_HELP_OPTION_DIV_12", "La pagina delle valutazioni mostra tutti i contenuti che sono stati valutati dagli utenti.<br />
<br />Puoi definire quali sezioni mostrare puntando/spuntando le opzioni nel box.");
define("CONTENT_ADMIN_HELP_OPTION_DIV_13", "The Top Score Page shows all content items that have been given a score by the author of the content item.<br /><br />You can choose the sections to display by checking the boxes.<br /><br />Also you can define if the email address of a non-member author will be displayed.");
define("CONTENT_ADMIN_HELP_OPTION_DIV_14", "this page allows you to set options for the admin create category page.<br /><br />You can define which sections are available when an admin (or personal content manager) creates a new content category");


?>