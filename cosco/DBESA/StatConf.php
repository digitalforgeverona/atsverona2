<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DB_STATINO</title>

<link href="e107_themes/exas_b07_multicolor/style_blue.css" rel="stylesheet" type="text/css" />

</head>



<body>

<?php



$Alpha = $_REQUEST['Alpha'];

$Charlye = $_REQUEST['Charlye'];

$Delta = $_REQUEST['Delta'];

$Miss = $_REQUEST['Miss'];

$NOSHOOT = $_REQUEST['NOSHOOT'];

$Penalty = $_REQUEST['Penalty'];

$Tempo = $_REQUEST['Tempo'];

$Stage = $_REQUEST['Stage'];

$ID = $_REQUEST['ID'];

$Nome = $_REQUEST['Nome'];

$Cognome = $_REQUEST['Cognome'];

?>







<SCRIPT TYPE="text/javascript">

<!--

var gb = new backlink();

gb.type = "image";

gb.src = "getback.gif";

gb.text = "get back";

gb.width = 100;

gb.height = 17;

gb.write();

//-->

</SCRIPT>

<?php echo "ID: " .$ID .""; ?>

<form action="istat_InserisciDatiGaraOK.php?cmd=add&ID=<?php echo "" .$ID .""; ?>" method="post" name="frmModulo2" target="_self">

<table width="100%" height="100%" border="1">

  <tr align="center" valign="middle">

    <td width="14%" height="20%" class="forumheaderAlpha">A</td>

    <td width="14%" height="20%" class="forumheaderCharlye">C</td>

    <td width="14%" height="20%" class="forumheaderDelta">D</td>

    <td width="14%" height="20%" class="forumheaderMiss">M</td>

    <td width="14%" height="20%" class="forumheaderNoShoot">NS</td>

    <td width="14%" height="20%" class="forumheaderPenalty">P</td>

    <td width="14%" height="20%" class="forumheaderTempo">Tempo</td>

  </tr>

  <tr align="center" valign="middle">

    <td width="14%" height="20%" class="forumheaderAlpha"><input name="A_<?php echo $Stage; ?>" type="text" class="forumheaderAlpha" id="Alpha" style="height:80px;font-size:50px;" value="<?php echo $Alpha; ?>" size="2" readonly="readonly" /></td>

    <td width="14%" height="20%" class="forumheaderCharlye"><input name="C_<?php echo $Stage; ?>" type="text" class="forumheaderCharlye" id="Charlye" style="height:80px;font-size:50px;" value="<?php echo $Charlye; ?>" size="2" readonly="readonly" /></td>

    <td width="14%" height="20%" class="forumheaderDelta"><input name="D_<?php echo $Stage; ?>" type="text" class="forumheaderDelta" id="Delta" style="height:80px;font-size:50px;" value="<?php echo $Delta; ?>" size="2" readonly="readonly" /></td>

    <td width="14%" height="20%" class="forumheaderMiss"><input name="M_<?php echo $Stage; ?>" type="text" class="forumheaderMiss" id="Miss" style="height:80px;font-size:50px;" value="<?php echo $Miss; ?>" size="2" readonly="readonly" /></td>

    <td width="14%" height="20%" class="forumheaderNoShoot"><input name="NS_<?php echo $Stage; ?>" type="text" class="forumheaderNoShoot" id="NOSHOOT" style="height:80px;font-size:50px;" value="<?php echo $NOSHOOT; ?>" size="2" readonly="readonly" /></td>

    <td width="14%" height="20%" class="forumheaderPenalty"><input name="P_<?php echo $Stage; ?>" type="text" class="forumheaderPenalty" id="Penalty" style="height:80px;font-size:50px;" value="<?php echo $Penalty; ?>" size="2" readonly="readonly" /></td>

    <td width="14%" height="20%" class="forumheaderTempo"><input name="Tempo_<?php echo $Stage; ?>" type="text" id="Tempo" style="background-color:#FFFF00;font-weight:bold;height:80px;font-size:40px;" value="<?php echo $Tempo; ?>" size="6" readonly="readonly" /></td>

  </tr>

  <tr align="center" valign="middle">

    <td height="20%" class="forumheaderIntesta">NOME</td>

    <td height="20%" colspan="5" class="forumheaderNome"><input name="Nome" type="text" class="forumheaderIntestaC" id="Nome" style="width:95%;background-color:#4E7DD1;height:50px;font-size:30px;" value="<?php echo "" .$Cognome ." " .$Nome .""; ?>" readonly="readonly" /></td>

    <td height="20%" class="forumheaderIntesta">NUM

      <input name="ID" type="text" class="forumheaderIntestaC" id="ID" style="background-color:#4E7DD1;height:50px;font-size:30px;" value="<?php echo $ID; ?>" size="5" readonly="readonly" /><br />

      <input name="Stage" type="text" class="forumheaderIntestaC" id="Stage" style="background-color:#4E7DD1;height:50px;font-size:30px;" value="<?php echo $Stage; ?>" size="5" readonly="readonly" /></td>

  </tr>

  <tr align="center" valign="middle">

    <td height="20%" colspan="7" valign="middle" class="forumheaderTempo">INSERIRE IL PIN 

    <input name="PIN" type="text" class="forumheaderDelta" id="PIN"  size="6"  style="height:80px;font-size:50px;" /></td>

  </tr>

  <tr align="center" valign="middle">

    <td height="20%" colspan="7" align="center" class="button"><a href="javascript:history.back(-1)"><img src="Bottoni/back_button.png" alt="get back" border="0"></a>

    <input type="image" src="Bottoni/green_button.png" alt="OK"  /></td>

  </tr>

</table>

</form>

</body>

</html>