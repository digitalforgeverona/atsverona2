<?php
//     Italian Translation:
//           e107 Italian Team http://www.e107it.org
//           con la collaborazione di Stefano Vecchi

$text = "In questa sezione puoi configurare 3 menù<br>
<b> Menù Nuovi Articoli</b> <br>
Inserisci un numero, per esempio '5', nel primo campo per visualizzare i primi 5 articoli e lascialo in bianco per vederli tutti. Configura quale dovrebbe essere il titolo del collegamento al resto dell'articolo nel secondo campo, se lasci quest'ultima opzione vuota non verrà  creato un collegamento, per esempio: 'Tutti gli articoli'<br>
<b> Commenti/Menù Forum</b> <br>
Il numero di default dei commenti è 5, il numero dei caratteri di default è 10000. Il suffisso è per una linea troppo lunga che viene tagliata appendendo questo suffisso alla fine. Una buona scelta è '...', controlla gli argomenti originali se li vuoi vedere nella panoramica.<br>";

$ns -> tablerender("Menu Configuration Help", $text);
?>
