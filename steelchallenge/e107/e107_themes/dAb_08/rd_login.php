<?php
// roofdog78 login box---------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

  if (!USER)
  {
    $rd_login = "
    <form method='post' action='$_SERVER[PHP_SELF]'>
      <div><br /><h2>".LAN_THEME_8."</h2><br />
        ".LAN_THEME_9." <input class='tbox' type='text'     name='username' size='15' value='' maxlength='30' /><br />
        ".LAN_THEME_10." <input class='tbox' type='password' name='userpass' size='15' value='' maxlength='20' /><br /><br />
        <input type='hidden' name='autologin' value='1' />
        <input class='loginbutton' type='submit' name='userlogin' value='' />
        <a href='".e_BASE."signup.php'><img src='".THEME."images/signup.png' alt=''/></a>
        <a href='".e_BASE."fpw.php'><img src='".THEME."images/lostpass.png' alt=''/></a>
      </div>
		</form>";
  }
  else
  {
    $rd_login = "
	<div><br /><h2>".LAN_THEME_11."<br />".USERNAME."</h2><br /><a href='".e_BASE."index.php?logout'><img src='".THEME."images/logout.png' alt=''/></a>
		<a href='".e_BASE."user.php?id.".USERID."'><img src='".THEME."images/profile.png' alt=''/></a>
		<a href='".e_BASE."usersettings.php'><img src='".THEME."images/settings.png' alt=''/></a></div>
    ";
  }
  
  if (ADMIN)
  {
    $rd_login .= "<br /><a href='".e_BASE."e107_admin/admin.php'><b>".LAN_THEME_12."</b></a>";
  }
  $rd_login = "<div class='mediumtext' style='white-space:nowrap'>".$rd_login."</div>";

  define("RD_LOGIN", $rd_login);

//------------------------------------------------------------------------------------------------------------+

  unset($rd_login);

//------------------------------------------------------------------------------------------------------------+

?>