<?php
/*
------------------------------------------------------------------------
|     Italian Translation: e107 Italian Team  http:www.e107italia.org
------------------------------------------------------------------------
*/



$caption = "Utenti bannati dal sito";
$text = "Puoi bannare utenti dal sito utilizzando questo Pannello.<br />
Puoi inserire sia l'IP completo che un carattere jolly per bannare un range di indirizzi IP. Puoi anche inserire un indirizzo email per bloccare la registrazione di un utente al sito.<br /><br />
<b>Banning da indirizzo IP:</b><br />
Inserendo l'indirizzo IP 123.123.123.123 eviterai che l'utente con quell'indirizzo visiti il sito.<br />
Inserendo l'indirizzo IP 123.123.123.* eviterai che chiunque in quel range IP visiti il sito.  (Nota che non devono essere necessariamente quattro gruppi di cifre o asterischi).<br /><br />
<b>Banning da indirizzo email:</b><br />
Inserendo l'indirizzo email foo@bar.com eviterai che chiunque utilizzi quell'indirizzo email si registri come utente al sito.<br />
Inserendo l'indirizzo email *@bar.com eviterai che chiunque utilizzi quel dominio email si registri come utente al sit.<br /><br />
<b>Banning da Nome Utente</b><br />
Questo viene fatto dalla pagina di amministrazione Utenti.";


$ns -> tablerender($caption, $text);
?>
