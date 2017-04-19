<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|      Clarity - Theme by roofdog78
+----------------------------------------------------------------------------+
*/
$sc_style['LM_SIGNUP_LINK']['pre'] = "&nbsp;";
$sc_style['LM_SIGNUP_LINK']['post'] = "<br />";

$sc_style['LM_FPW_LINK']['pre'] = "&nbsp;";
$sc_style['LM_FPW_LINK']['post'] = "<br />";

$sc_style['LM_RESEND_LINK']['pre'] = "&nbsp;";
$sc_style['LM_RESEND_LINK']['post'] = "";

$sc_style['LM_REMEMBERME']['pre'] = "";
$sc_style['LM_REMEMBERME']['post'] = "<br />";

if (!isset($LOGIN_MENU_FORM)){

	$LOGIN_MENU_FORM = "
	<table id='login'>
		 <tr>
		     <td style='width:100%;'>
	             ".LOGIN_MENU_L1."
	             {LM_USERNAME_INPUT}
				 ".LOGIN_MENU_L2."
                 {LM_PASSWORD_INPUT}
	             <br />
                 {LM_IMAGECODE}
                 <br />
			 
			     <img src='".THEME."images/bullet2.png' alt='' style='vertical-align:top;'/> &nbsp;{LM_LOGINBUTTON}
				 <br />
				 {LM_BULLET} {LM_SIGNUP_LINK}
	             {LM_BULLET} {LM_FPW_LINK}
	             {LM_BULLET} {LM_RESEND_LINK}
			 </td>
		 </tr>
	 </table>
	";
}

if (!isset($LOGIN_MENU_LOGGED)){
    $sc_style['LM_ADMINLINK']['pre'] = "";
	$sc_style['LM_ADMINLINK']['post'] = "<br />";

	$LOGIN_MENU_LOGGED = "
		{LM_MAINTENANCE}
		{LM_ADMINLINK_BULLET} {LM_ADMINLINK}
		{LM_BULLET} {LM_USERSETTINGS}<br />
		{LM_BULLET}	{LM_PROFILE}<br />
		{LM_BULLET} {LM_LOGOUT}
	";
}

if (!isset($LOGIN_MENU_MESSAGE)){
	$LOGIN_MENU_MESSAGE = '<div>{LM_MESSAGE}</div>';
}
?>
