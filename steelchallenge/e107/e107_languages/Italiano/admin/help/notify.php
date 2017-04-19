<?php
//     Italian Translation: e107 Italian Team http://www.e107it.org
$text = "Il sistema di Notifica invia email di notifica quando si verifica un nuovo evento nel sistema.<br />
<br /> Per esempio, se imposti Ricevi email di notifica per 'IP bannato per flood al sito' associato
al Gruppo Amministratori, tutti gli utenti appartenente al gruppo riceverà una email nel caso in cui
il sito fosse sottoposto a flooding.<br /><br />
Puoi anche, ad esempio, impostare 'News inviata da Amministratore' per il Gruppo 'Utenti':
tutti gli Utenti registrati riceveranno una email contenente le news pubblicate dall'Amministratore.<br />
<br />Se desideri che le email di notifica vengano inviate ad un indirizzo email alternativo -
inserisci l'indirizzo desiderato nel campo 'Email'.";

$ns -> tablerender("Help Notifica", $text);
?>
