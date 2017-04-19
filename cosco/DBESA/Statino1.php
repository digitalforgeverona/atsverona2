<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>DB_STATINO</title>

<link href="e107_themes/exas_b07_multicolor/style_blue.css" rel="stylesheet" type="text/css" />

</head>

<body>

            <FORM METHOD='POST' ACTION='TestStat.php?cmd=find' name='Inserisci'>

  <TABLE BORDER='1' width='100%' height="100%">

            <TH COLSPAN=2 class="forumheaderNome" width='100%'><B>CERCA TIRATORE</B></TH>

            <TR class="forumheaderNome">

            <TD width="45%" class="forumheaderNome"><p><B>NUMERO</B></p>

              <p><B>TIRATORE</B></p></TD>

            <TD width="45%" class="forumheaderNome"><input type='NUMBER'  name='ID' style='font-size: 100px; width:150px;' value='' size='3'></TD>

  </TR>

  <TR class="forumheaderAlpha">

    <TD COLSPAN=2 align="center" valign="middle" class="forumheaderNome"  style='padding-top: 15px;'><input name="Stage" type="hidden" id="Stage" value="1" />

      <center><input type='submit' value='TROVA' style='color:#00F;font-size: 500%;'></TD>

            </TR>

            </TABLE>

<p>

  <input name="Stage" type="hidden" id="Stage" value="1" />

</p>

<p>&nbsp;</p>

          </FORM>

            <BR>

            <BR>

            

<?php



echo "<script type='text/javascript' language='JavaScript'>

document.forms['Inserisci'].elements['ID'].focus();

</script>";	

?>

</body>

</html>