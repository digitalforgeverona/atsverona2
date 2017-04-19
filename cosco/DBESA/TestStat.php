<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DB_STATINO</title>

<link href="e107_themes/exas_b07_multicolor/style_blue.css" rel="stylesheet" type="text/css" />

</head>



<body>



<?php



			  require_once('class2.php');

			  //echo "CLASSI: " .USERCLASS ."";

			  $mi=strpos(USERCLASS,'6');

			  //echo "<br>" .$mi ."";

			  //exit();

			  //if (!ADMIN || !getperms('4'))

			  if ($mi===false)

{

    header("location:ElencoIscrizioni.php");

    

	exit;

}

			  

			  $connection = mysql_connect("localhost", "atsveron_dbesa", "Jump02052012")

                           or die ("NON è possibile stabilire una connessione.");



			  $db = mysql_select_db("atsveron_dbesa", $connection)

                           or die ("NON è possibile selezionare il DB.");

			  

			  $ID = $_REQUEST["ID"];

			  if ($ID==''){

				  $ID=$_GET["ID"];

				  }

			  $MioStage = $_REQUEST["stage"];

			  if ($MioStage==''){$MioStage=1;}

              $MioNomeGara = str_replace(' ', '_', NOMEGARA);

              $query = "SELECT * FROM " .$MioNomeGara ." WHERE ID ='" .$ID ."'";

              //echo "QUERY: " .$query ."";

			  $result = mysql_query($query)

                       or die ("Errore sulla query di ricerca tiratore: ".mysql_error());

              $row = mysql_fetch_array($result) or die(mysql_error());

			  $Nome = $row['Nome'];

			  $Cognome = $row['Cognome'];

			  $Divisione = $row['Divisione'];

			  	$Alpha = $row['A_' .$MioStage .''];

				$Charlye = $row['C_' .$MioStage .''];

				$Delta = $row['D_' .$MioStage .''];

				$Miss = $row['M_' .$MioStage .''];

				$NOSHOOT = $row['NS_' .$MioStage .''];

				$Penalty = $row['P_' .$MioStage .''];

				$MioTempo = $row['Tempo_' .$MioStage .''];

				$Stage = $_GET["stage"];

				

				if ($Alpha==""){$Alpha="0";}

				if ($Charlye==""){$Charlye="0";}

				if ($Delta==""){$Delta="0";}

				if ($Miss==""){$Miss="0";}

				if ($NOSHOOT==""){$NOSHOOT="0";}

				if ($Penalty==""){$Penalty="0";}

				





?>



<link href="e107_themes/exas_b07_multicolor/style_blue.css" rel="stylesheet" type="text/css" />







<script language="javascript">

function Aumenta(campo, per) {

    var oggetti = document.getElementById(campo).value;

    oggetti = parseInt(oggetti, 10);

    if (isNaN(oggetti)) oggetti = 0;

    

    oggetti += per;

    if (oggetti < 0) return;

    

    document.getElementById(campo).value = oggetti;

	

	SommaColpi();

	

	

}



function SommaColpi() {

       

	var a = parseInt(document.getElementById('Alpha').value, 10);

	var c = parseInt(document.getElementById('Charlye').value, 10);

	var d = parseInt(document.getElementById('Delta').value, 10);

	var m = parseInt(document.getElementById('Miss').value, 10);

	document.getElementById('Totale').value = a+c+d+m;

	

}



function CheckTempo(numcolpi){

	

	var returnval;

	

	var a = parseInt(document.getElementById('Alpha').value, 10);

	var c = parseInt(document.getElementById('Charlye').value, 10);

	var d = parseInt(document.getElementById('Delta').value, 10);

	var m = parseInt(document.getElementById('Miss').value, 10);

	var miototale = a+c+d+m;

	document.getElementById('Totale').value = miototale;

	

	if ( miototale != numcolpi){	

		alert('NUMERO COLPI NON CORRISPONDENTE: '+numcolpi);

   		returnval = false;

		}

	else

	   {

	   var MioTempo = document.getElementById('Tempo').value.length;	

	

	if ( MioTempo == 0){ 

   		alert('TEMPO NON INSERITO.');

   		returnval = false;

		}

	else

	   {

	   returnval = true;

	   }

	   }

	

	

	return returnval;

}



</script>

<?php //echo "Colpi: " .$MieiNumeroColpi[0] .""; ?>

<form action="StatConf.php" method="post" name="frmModulo" target="_self" onSubmit='return CheckTempo(<?php echo "" .$MieiNumeroColpi[$Stage-1] .""; ?>)'>

  <table width="100%" height="100%" border="1">

    <tr align="center" valign="middle">

      <td width="12%" height="20%" class="forumheaderIntesta">NOME</td>

      <td height="20%" colspan="5" class="forumheaderIntestaC"><label for="Nome"></label>

      <input name="Nome" type="text" class="forumheaderIntestaC" id="Nome" style="width:100%;background-color:#4E7DD1;height:50px;font-size:30px;" value="<?php echo "" .$Cognome ." " .$Nome ." - " .$Divisione .""; ?>" readonly="readonly" /></td>

      <td width="24%" height="20%" class="forumheaderIntestaC"><label for="ID"></label>

        NUM

      <input name="ID" type="text" class="forumheaderIntestaC" id="ID" style="background-color:#4E7DD1;height:50px;font-size:30px;" value="<?php echo $ID; ?>" size="4" readonly="readonly" /></td>

    </tr>

    <tr align="center" valign="middle">

      <td width="12%" height="20%"><img src="Bottoni/green.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Alpha', 01)"/></td>

      <td width="12%" height="20%"><img src="Bottoni/orange.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Charlye', 01)"/></td>

      <td width="12%" height="20%"><img src="Bottoni/red.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Delta', 01)"/></td>

      <td width="12%" height="20%"><img src="Bottoni/purple.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Miss', 01)"/></td>

      <td width="12%" height="20%"><img src="Bottoni/blue.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('NOSHOOT', 01)"/></td>

      <td width="12%" height="20%"><img src="Bottoni/black.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Penalty', 01)"/></td>

      <td width="24%" height="20%"><input type="image" src="Bottoni/green_button.png" width="100%" height="100%" alt="M +"  /></td>

    </tr>

    <tr align="center" valign="middle">

      <td width="12%" height="25%" class="forumheaderAlpha">A</td>

      <td width="12%" height="25%" class="forumheaderCharlye" >C</td>

      <td width="12%" height="25%" class="forumheaderDelta" >D</td>

      <td width="12%" height="25%" class="forumheaderMiss">M</td>

      <td width="12%" height="25%" class="forumheaderNoShoot">NS</td>

      <td width="12%" height="25%" class="forumheaderPenalty">P</td>

      <td width="24%" height="25%" class="forumheaderTempo">TIME</td>

    </tr>

    <tr align="center" valign="middle">

      <td width="12%" height="20%"><center><input name="Alpha" type="text" id="Alpha" value='<?php echo "" .$Alpha ."" ?>' size="2" readonly="readonly" style="height:80px;font-size:50px;" /></center></td>

      <td width="12%" height="20%"><center><input name="Charlye" type="text" id="Charlye" value='<?php echo "" .$Charlye ."" ?>' size="2" readonly="readonly" style="height:80px;font-size:50px;" /></center></td>

      <td width="12%" height="20%"><center><input name="Delta" type="text" id="Delta" value='<?php echo "" .$Delta ."" ?>' size="2" readonly="readonly" style="height:80px;font-size:50px;" /></center></td>

      <td width="12%" height="20%"><center><input name="Miss" type="text" id="Miss" value='<?php echo "" .$Miss ."" ?>' size="2" readonly="readonly" style="height:80px;font-size:50px;" /></center></td>

      <td width="12%" height="20%"><center><input name="NOSHOOT" type="text" id="NOSHOOT" value='<?php echo "" .$NOSHOOT ."" ?>' size="2" readonly="readonly" style="height:80px;font-size:50px;" /></center></td>

      <td width="12%" height="20%"><center><input name="Penalty" type="text" id="Penalty" value='<?php echo "" .$Penalty ."" ?>' size="2" readonly="readonly" style="height:80px;font-size:50px;" /></center></td>

      <td width="24%" height="20%"><center><input name="Tempo" type="NUMBER" step="0.01" id="Tempo" value='<?php echo "" .$MioTempo ."" ?>' size="6" style="background-color:#FFFF00;font-weight:bold;height:80px;font-size:40px;width:90%;" /></center></td>

    </tr>

    <tr align="center" valign="middle">

      <td width="12%" height="20%" rowspan="2"><img src="Bottoni/d_green.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Alpha', -01)"/></td>

      <td width="12%" height="20%" rowspan="2"><img src="Bottoni/d_orange.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Charlye', -01)"/></td>

      <td width="12%" height="20%" rowspan="2"><img src="Bottoni/d_red.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Delta', -01)"/></td>

      <td width="12%" height="20%" rowspan="2"><img src="Bottoni/d_purple.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Miss', -01)"/></td>

      <td width="12%" height="20%" rowspan="2"><img src="Bottoni/d_blue.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('NOSHOOT', -01)"/></td>

      <td width="12%" height="20%" rowspan="2"><img src="Bottoni/d_black.png" width="100%" height="20%" alt="M +"  onclick="Aumenta('Penalty', -01)"/></td>

      <td width="24%" height="10%" align="right" class="forumheaderColpi">COLPI<input name="Totale" type="text" id="Totale" value="0" size="2" readonly="readonly" style="background-color:#44B8F0;height:80px;font-size:40px;" /></td>

    </tr>

    <tr align="center" valign="middle">

      <td height="10%" align="right" class="forumheaderColpi">STAGE

        <input name="Stage" type="text" id="Stage" value="<?php echo $MioStage; ?>" size="1" readonly="readonly" style="background-color:#FFFFFF;height:80px;font-size:40px;color:#F00" /></td>

    </tr>

  </table>

 

</form>



<script type="text/javascript">

                    SommaColpi();

                    </script>



</body>

</html>