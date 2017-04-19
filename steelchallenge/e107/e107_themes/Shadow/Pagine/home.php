<?php
/*
+---------------------------------------------------------------+
|	e107 website system
|	
|	Tema Shadow - by Alf - http://www.frock.it
+---------------------------------------------------------------+
*/
require_once("../../../class2.php");
require_once(HEADERF);

$caption = "";


$text = "

<div style='width:100%;text-align:left;margin-left:35px;'><img src='../images/logo.jpg'/></div>


<div id='menu'>

<!--   MENU PAGINA UNO  -->

<div id='pagina1_tab'>
		<span><strong>Pag 1</strong></span>
		<div id='box'>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
<p><a  rel='shadowbox' href='".THEME_ABS."pagine/pagina1.php' title='Pagina1'>
<img src='../images/go.gif' alt='Locked' title='Locked'> Vai a Pagina1</a></p>
		</div>
	</div>



<!--   MENU PAGINA DUE  -->
	
<div id='pagina2_tab'>
		<span><strong>Pag 2</strong></span>
		<div id='box'>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
<p><a  rel='shadowbox' href='".THEME_ABS."pagine/pagina2.php' title='Pagina2'>
<img src='../images/go.gif' alt='Locked' title='Locked'> Vai a Pagina2</a></p>
		</div>
	</div>


<!--   MENU PAGINA TRE  -->

<div id='pagina3_tab'>
		<span><strong>Pag 3</strong></span>
		<div id='box'>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
<p><a  rel='shadowbox' href='".THEME_ABS."pagine/pagina3.php' title='Pagina3'>
<img src='../images/go.gif' alt='Locked' title='Locked'> Vai a Pagina3</a></p>
		</div>
	</div>


<!--   MENU CERCA  -->	

<div id='cerca_tab'>
		<span><strong>Cerca</strong></span>
		<div id='box'>
		<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
			<p style='text-align:center'>
<form method='get' action='/prova/search.php'>
<input class='tbox search' type='text' name='q' size='20' value='' maxlength='50' />
<input type='hidden' name='r' value='0' /><input class='button search' type='submit' name='s' value='Cerca' />
</form>
</p>
		</div>
	</div>
	

<!--   MENU CONTATTI  -->

<div id='contatti_tab'>
		<span><strong>Contatti</strong></span>
		<div id='box'>
			<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
<p><a  rel='shadowbox' href='".e_BASE."e107_plugins/contactus/contactus.php' class='unlock' title='Contattaci'>
<img src='../images/go.gif' alt='Locked' title='Locked'> Contattaci</a></p>
		</div>
	</div>

";

if (USER==TRUE) {	
$text .= "
<!--   MENU LOGIN LOGGATO -->	

<div id='logged_tab'>
		<span><strong>Ciao ".USERNAME."</strong></span>
		<div id='box'>
		<span style='text-align:center'>Pannello di Controllo</span>
			{CUSTOM=login}
		</div>
	</div>

</div>

";

} else {

$text .= "

<!--   MENU LOGIN OSPITE -->	

<div id='logged_tab'>
		<span><strong>Login</strong></span>
		<div id='box'>
			{CUSTOM=login}
		</div>
	</div>
</div>

";

}


$caption = $tp->toHtml($caption);
$text = $tp->toHtml($text, TRUE, 'parse_sc, constants');

$ns -> tablerender($caption, $text);
require_once(FOOTERF);
?>