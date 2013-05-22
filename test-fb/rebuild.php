
<?php
$con = mysql_connect("localhost", "lpcms_lagruyere", "lagruyere_123");
mysql_select_db("lpcms_lagruyere");

$query = "select * from  node";
$results = mysql_query($query);
while($result = mysql_fetch_assoc($results))
{
	$qry = "insert into  node_comment_statistics values('".$result['nid']."',0,'".$result['changed']."', NULL, '".$result['uid']."', 0)";
	mysql_query($qry);
}