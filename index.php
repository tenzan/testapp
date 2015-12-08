<?php

 $db = mysql_connect("localhost","root","root"); 
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }

 $db_select = mysql_select_db("catalog",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
?>
<html>
 <head>
 <title>Catalog</title>
 </head>
 <body>
 <?php

$result = mysql_query("SELECT * FROM products", $db);
 if (!$result) {
 die("Database query failed: " . mysql_error());
 }

 while ($row = mysql_fetch_array($result)) {
 echo $row[1]." ".$row[2]."<br />";
 }
?>
 </body>
</html>

<?php
//Step5
 mysql_close($db);
?>
