<?php
// Usage without mysql_list_dbs()
$link = mysql_connect('localhost', 'lpcms', 'lp_1234');
$res = mysql_query("SHOW DATABASES");

while ($row = mysql_fetch_assoc($res)) {
    echo $row['Database'] . "<br/>";
}

// Deprecated as of PHP 5.4.0
$link = mysql_connect('localhost', 'lpcms', 'lp_1234');
$db_list = mysql_list_dbs($link);

while ($row = mysql_fetch_object($db_list)) {
     echo $row->Database . "<br>";
	$db = $row->Database;
//db connection details
//$host = "localhost";
//$username = "root";
//$password = "";
//$db = "wordpress";
 
//connect to db
//$db_connection = mysql_connect($host, $username, $password) or die("Could not connect to db");
mysql_select_db ($db, $link) or die("Could not connect to table");
 
//get statuses for tables in db
$sql = "SHOW TABLE STATUS";
$result	= mysql_query($sql);
 
//initialize array
$tables = array();
while($row = mysql_fetch_array($result))
{
    // return the size in Kilobytes
    $table_size = ($row[ "Data_length" ] + $row[ "Index_length" ]) / 1024;
    $tables[$row['Name']] = sprintf("%.2f", $table_size);
 
    //get total size of all tables
    $total_size += round($table_size,2);
 
    // optimize tables
    $optimise_sql = "OPTIMIZE TABLE {$row['Name']}";
    $optimise_result = mysql_query($optimise_sql);
}
 
//get statuses for tables in db after optimization
$sql = "SHOW TABLE STATUS";
 
//initialize array
$optimised_tables = array();
$result	= mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	// return the size in Kilobytes
	$table_size = ($row[ "Data_length" ] + $row[ "Index_length" ]) / 1024;
	$optimised_tables[$row['Name']] = sprintf("%.2f", $table_size);
 
	//get total size of all tables after optimization
	$optimise_total_size += round($table_size,2);
}

}
?>