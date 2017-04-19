<?php 

require_once('./class2.php');

require_once(HEADERF);

require_once('Connections/Esagonale.php'); 


?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>ELENCO ISCRIZIONI</title>

<link href="e107_themes/exas_b07_multicolor/style_blue.css" rel="stylesheet" type="text/css" />-->





<script type="text/javascript">

    function ChangeColor(tableRow, highLight)

    {

    if (highLight)

    {

      tableRow.style.backgroundColor = '#dcfac9';

    }

    else

    {

      tableRow.style.backgroundColor = 'white';

    }

  }



  function DoNav(theUrl)

  {

  document.location.href = theUrl;

  }

  </script>

<!--</head>



<body>-->



<p>

  <?php



			  	// SCRIVE IN UN FILE IL NOME DELLA GARA ATTIVA

				$myFile = "GaraAttiva.txt";

				$fh = fopen($myFile, 'r');

				$theData = fread($fh, filesize($myFile));

				fclose($fh);

				$MioNomeGara = str_replace(' ', '_', $theData);
				
				$MioStage = $_REQUEST['stage'];



mysql_select_db($database_Esagonale, $Esagonale);
$query_ElencoIscrizioni = "SELECT ID, Nome, Cognome, Divisione, TipoProva, Chiamato FROM  `" .$MioNomeGara ."` WHERE Tempo_" .$MioStage ." =0 OR Tempo_" .$MioStage ." IS NULL ORDER BY ID ASC";

$ElencoIscrizioni = mysql_query($query_ElencoIscrizioni, $Esagonale) or die(mysql_error());

$row_ElencoIscrizioni = mysql_fetch_assoc($ElencoIscrizioni);

$totalRows_ElencoIscrizioni = mysql_num_rows($ElencoIscrizioni);

//echo "Totale: " .$totalRows_ElencoIscrizioni ."";

?> 

<center><span class="forumheaderNoShoot">ELENCO ISCRIZIONI STAGE: <?php echo $MioStage; ?></span></center></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<table width="80%" border="1">

  <tr class="forumheaderIntesta">

    <td>ID</td>

    <td>Nome</td>

    <td>Cognome</td>

    <td>Divisione</td>

    <td>TipoProva</td>

  </tr>

  <?php 

  

  

  do { 

  

  $MioTipoProva=$row_ElencoIscrizioni['TipoProva'];

  if ($MioTipoProva=="ISCRIZIONE"){

	  $MioHeader="forumheaderDelta";

	  } else{

		  $MioHeader="forumheaderAlpha";

		  }



$MiaDest = "DoNav('TestStat.php?cmd=find&ID=" .$row_ElencoIscrizioni['ID'] ."&stage=" .$MioStage ."');";

		  

if ($row_ElencoIscrizioni['Chiamato']==1){

	

	$MioHeader="forumheaderSecondStage";

	$MiaDest = "DoNav('TestStat2.php?cmd=find&ID=" .$row_ElencoIscrizioni['ID'] ."');";

	

	}		  

		  

		  

  

    echo "<tr class='" .$MioHeader ."' onclick=" .$MiaDest ." >"?>

      <td><?php echo $row_ElencoIscrizioni['ID']; ?></td>

      <td><?php echo $row_ElencoIscrizioni['Nome']; ?></td>

      <td><?php echo $row_ElencoIscrizioni['Cognome']; ?></td>

      <td><?php echo $row_ElencoIscrizioni['Divisione']; ?></td>

      <td><?php echo $row_ElencoIscrizioni['TipoProva']; ?></td>

    </tr>

    <?php } while ($row_ElencoIscrizioni = mysql_fetch_assoc($ElencoIscrizioni)); ?>

</table>

<!--</body>

</html>-->

<?php

mysql_free_result($ElencoIscrizioni);

require_once(FOOTERF);

?>

