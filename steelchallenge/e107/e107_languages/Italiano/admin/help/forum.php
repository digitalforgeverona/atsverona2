<?php
//     Italian Translation:
//           e107 Italian Team http://www.e107it.org
//           con la collaborazione di Stefano Vecchi


$caption = "Help Forum";
$text = "<b>Generale</b><br />
Utilizza questa schermata per creare o modificare i tuoi forums<br />
<br />
<b>Categorie Principalei/Forums</b><br />
Una categoria principale è una intestazione sotto la quale gli altri forum sono visualizzati, questo rende più semplice il layout consentendo una navigazione tra i forums più facile per i visitatori.
<br /><br />
<b>Accessibilità </b>
<br />
Puoi consentire l'accesso ai tuoi forums solo a certe categorie di visitatori. Dopo aver determinato la 'classe' dei visitatori puoi selezionare la classe a cui consentire l'accesso al forum.
Puoi settare delle categorie principali o dei forum individuali in questo modo.
<br /><br />
<b>Moderatori</b>
<br />
Seleziona i nomi nella lista degli amministratori per assegnargli lo stato di moderatore del forum. L'amministratore deve avere i permessi per moderare i forum per essere incluso in questa lista.
<br /><br />
<b>Livelli</b>
<br />
Qui puoi determinare i livelli degli utenti. Se vengono completati i campi con i nomi delle immagini, verranno usate le immagini. Per usare i nomi dei livelli inseriscine i nomi e assicurati di lasciare in bianco il corrispondente campo con il nome immagine.<br />La soglia rappresenta il numero di messaggi che l'utente deve inserire prima che il suo livello cambi.";
$ns -> tablerender($caption, $text);
unset($text);
?>
