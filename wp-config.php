<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web,è anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'atsveron_wordpress');

/** Nome utente del database MySQL */
define('DB_USER', 'atsveron_root');

/** Password del database MySQL */
define('DB_PASSWORD', 'Jump02052012');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uMuHW$TJ:0Qtm{fq5+ZBd$c)h:G8WEA-Pyt!*SyJxC&BGdkacD4J!hj3pbqx]KZC');
define('SECURE_AUTH_KEY',  'G@-@%~=~(#y%x< TvPTwHPi-ZqA0I-30^vj9!)})C]=k/4He+0S|+|B9WipWcOkB');
define('LOGGED_IN_KEY',    '4yi~d%d6C9FpEVMB[|*/iS[|[+7}D(->.Urj[D6s4Kyqm>&gIUXnnfbS(yLR-TyF');
define('NONCE_KEY',        'W8<V2=3cscxKoW~C&-M4kpi-(>DgT5g,T(+%/j&`BJ-X58}V71qk|t=v:v|WjMaM');
define('AUTH_SALT',        'TX<R8v<o:j(HbSZsWrZ-B-tVx7GLyG$HBYqSxIJ/<l=.Z_W]e<m|P-p(Xh|V*4c%');
define('SECURE_AUTH_SALT', '@6+ip]gHN dDHmVW+LbiWx+du;bl*u`NG3;$E+iEL+(RAJ}ESq-)@o]8-+24N_YE');
define('LOGGED_IN_SALT',   'Zchp5?B$xO%}&m#3MytFLs&F1pPm*&7!PF<XJdDhe<E=-;xlc)%f0L/_+/~,R6[x');
define('NONCE_SALT',       'V8:H0pdL9REbszUu{60<B/W%N>Z(Fl(6:*l!vfS.W,*S%PQJAzQUTOh*/]-(a1kE');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Lingua di Localizzazione di WordPress, di base Inglese.
 *
 * Modificare questa voce per localizzare WordPress. Occorre che nella cartella
 * wp-content/languages sia installato un file MO corrispondente alla lingua
 * selezionata. Ad esempio, installare de_DE.mo in to wp-content/languages ed
 * impostare WPLANG a 'de_DE' per abilitare il supporto alla lingua tedesca.
 *
 * Tale valore è già impostato per la lingua italiana
 */
define('WPLANG', 'it_IT');

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
