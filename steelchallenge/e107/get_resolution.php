<?
/**************************************************************************************
Originally from http://www.phpbuddy.com/article.php?id=8
Author: Ranjit Kumar (Cheif Editor phpbuddy.com)
Modified by: Ying Zhang (Dodo) http://pure-essence.net
Two main modifications:
1. To check currently saved screen resolution cookie
2. To allow inclusion by other php files

In order to use this file in another php file, use:

$callget_res_page_name = $REQUEST_URI;
$GLOBALS[callget_res_page_name] = $callget_res_page_name;
include("get_resolution.php");
echo $screen_width." is your screen width and ".$screen_height." is your screen height.";

*****************************************************************************************/
?>

<script language="javascript">
<!--
function writeCookie() 
{
 var today = new Date();
 var the_date = new Date("December 31, 2023");
 var the_cookie_date = the_date.toGMTString();
 var the_cookie = "brut_w="+ screen.width;
 var the_cookie = the_cookie + ";expires=" + the_cookie_date;
  document.cookie=the_cookie;
 var today = new Date();
 var the_date = new Date("December 31, 2023");
 var the_cookie_date = the_date.toGMTString();
 var the_cookie = "brut_h="+ screen.height;
 var the_cookie = the_cookie + ";expires=" + the_cookie_date;
  document.cookie=the_cookie;
 
}


function checkRes(width, height) {
	if(width != screen.width || height != screen.height) {
		writeCookie();
	} else {
		return true;
	}
}
//-->
</script>

<?
if(isset($_COOKIE["brut_w"])) {
	
	?>
	<script language="javascript">
	<!--
	checkRes(<?=$brut_w?>, <?=$screen_height?>);
	//-->
	</script>
	<?
}
else //means cookie is not found set it using Javascript
{
?>
<script language="javascript">
<!--
writeCookie();
//-->
</script>
<?
}
?>