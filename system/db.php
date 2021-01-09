<?
$baglan = mysql_connect("localhost","root",""); 
if (!$baglan) 
{ 
die("No database selected"); 
} 
mysql_select_db("ucsdb", $baglan); 
?>