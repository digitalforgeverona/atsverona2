<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 

<html>

<head>

       <title>Title here!</title>

</head>

<body>



      <?php

      

           include 'class.ezpdf.php';

           $pdf =& new Cezpdf('a4','portrait');

           $pdf->selectFont('./fonts/Helvetica.afm');

           

           /*$img = ImageCreatefromjpeg('http://localhost:85/e107/e107_themes/dAb_08/images/DB.jpg');*/

           $pdf->ezImage('login.png');

           $pdf->stream();





?>





</body>

</html>

