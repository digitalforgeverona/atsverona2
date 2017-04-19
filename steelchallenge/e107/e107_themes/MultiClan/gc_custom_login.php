<?php

// -----------------------------------------------------------------------------------------------------------+

  unset($tmp);

  $tmp .= "<div class='mediumtext' style='white-space:nowrap'>";

  if (!USER)
  {
    $tmp .= "	<form method='post' action='$_SERVER[PHP_SELF]'>
		<div style='text-align:center; margin:0px 0px; padding:0px;'><font size='1px'><font color='#ffffff'>
		<div>
		<img src='".THEME."images/sUsername.gif' alt=''><input class='login' type='text' name='username' size='15' value='' maxlength='20' /><br />

		<img src='".THEME."images/sPassword.gif' alt=''><input class='login' type='password' name='userpass' size='15' value='' maxlength='20' /><br />

		<input type='hidden' name='autologin' value='1' />
		<input class='button' type='submit' name='userlogin' value='Login' />
		&nbsp;&nbsp;&nbsp;Please<a href='".e_BASE."signup.php'><img src='".THEME."images/signup.gif' alt=''</a>to become a member<br />

		<div style='text-align:center; margin:0px 0px; padding:0px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forgot Password?<font size='1px'><font color='#666666'>
		<a href='".e_BASE."fpw.php'>Retrive it here</a>.
		</div>
		</div>
		</div>
		</form>";
  }
  else
  {
    $tmp .= "<div style='text-align:center; margin:0px 0px; padding:0px;'><font size='1px'>
		 <a href='".e_BASE."usersettings.php'><img src='".THEME."images/ssettings.gif' alt=''</a>
  		 <a href='".e_BASE."user.php?id.".USERID."'><img src='".THEME."images/sprofile.gif' alt=''</a>
		 <a href='".e_BASE."search.php'><img src='".THEME."images/sSearch.gif' alt=''</a>
		 <a href='".e_BASE."index.php?logout'><img src='".THEME."images/slogout.gif' alt=''</a>
		 </div>
		 ";
  }
  
  $tmp .= "</div>";

  define("GC_CUSTOM_LOGIN", $tmp);

  unset($tmp);

// -----------------------------------------------------------------------------------------------------------+
  
  if (!USER)
  {
    $tmp .= "	<form method='post' action='$_SERVER[PHP_SELF]'>
    		<div>
		Username: <input class='tbox' type='text'     name='username' size='15' value='' maxlength='20' />&nbsp;&nbsp;
		Password: <input class='tbox' type='password' name='userpass' size='15' value='' maxlength='20' />&nbsp;&nbsp;
		<input type='hidden' name='autologin' value='1' />
		<input class='button' type='submit' name='userlogin' value='Login' />
		&nbsp;&nbsp;&nbsp;&nbsp;<a href='".e_BASE."signup.php'>Signup</a>
		</div>
		</form>";
  }
  else
  {
    $tmp .= "	You are Logged in as <b>".USERNAME."&nbsp;<b/>
		: <a href='".e_BASE."index.php?logout'>Logout</a> 
		: ";
  }

  define("GC_CUSTOM_LOGIN_SMALL", $tmp);
  
  unset($tmp);

// -----------------------------------------------------------------------------------------------------------+

  if (strstr($_SERVER[PHP_SELF], "forum"))
  {
    if (!USER)
    {
      $tmp .= "	<form method='post' action='$_SERVER[PHP_SELF]'>
      		<div>
		Username: <input class='tbox' type='text'     name='username' size='15' value='' maxlength='20' />&nbsp;&nbsp;
		Password: <input class='tbox' type='password' name='userpass' size='15' value='' maxlength='20' />&nbsp;&nbsp;
		<input type='hidden' name='autologin' value='1' />
		<input class='button' type='submit' name='userlogin' value='Login' />
		&nbsp;&nbsp;&nbsp;<a href='".e_BASE."signup.php'>Signup</a> |
		&nbsp;<a href='".e_BASE."fpw.php'>Forgot Password?</a>
		</div>
		</form>";
    }
    else
    {
      $tmp .= "	You are Logged in as <b>".USERNAME."&nbsp;<b/>";
    }
    
    $tmp = "<div style='text-align:center'>$tmp<hr /></div>";
    
  }
  
  define("GC_CUSTOM_LOGIN_FORUM", $tmp);
  
  unset($tmp);

// -----------------------------------------------------------------------------------------------------------+
  
?>