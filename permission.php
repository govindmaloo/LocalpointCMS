<?php
// Usage without mysql_list_dbs()
/*
$link = mysql_connect('localhost', 'lpcms', 'lp_1234');
$res = mysql_query("SHOW DATABASES");

while ($row = mysql_fetch_assoc($res)) {
    echo $row['Database'] . "<br/>";
}
*/
// Deprecated as of PHP 5.4.0
$link = mysql_connect('localhost', 'lpcms', 'lp_1234');
$db_list = mysql_list_dbs($link);

while ($row = mysql_fetch_object($db_list)) {
    // echo $row->Database . "<br>";
	$db = $row->Database;
	$name = explode("_",$db);
	$excluded = array("dev");
	if($name[0] == "lpcms" && !in_array($name[1],$excluded)){
		//echo $db . "<br>";
		mysql_select_db ($db, $link) or die("Could not connect to table");
		/*$sql = "insert into role_permission(rid, permission, module)
							 values('6','create ad_for_facebook content','node'),
						 	    ('6','delete any ad_for_facebook content','node'),
								('6','delete own ad_for_facebook content','node'),
								('6','edit any ad_for_facebook content','node'),
								('6','edit own ad_for_facebook content','node')";
								*/
		//$sql = "update taxonomy_term_data set name = 'Prochains événements' where name = 'Events'";			
								
		try{
		/*	$table = array("facebook", "twitter", "twitter_account");
			$i = count($table);						
			for(;$i>0;$i--){
				$sql = "drop table ".$table[$i-1];
				$result = mysql_query($sql, $link); 		
			}
			*/
			if(table_exists("facebook_data", $db)){
				echo "Table found" . "<br>";
			}
			else 
			{
				echo "not found in database : " . $db;
				}
			
		}
		catch(Exception $e){
			echo "Error";
			echo $e->getMessage();
		}
	}
//db connection details
//$host = "localhost";
//$username = "root";
//$password = "";
//$db = "wordpress";
 
//connect to db
//$db_connection = mysql_connect($host, $username, $password) or die("Could not connect to db");
/*
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
*/

}


function table_exists($tablename, $database = false) {

    if(!$database) {
        $res = mysql_query("SELECT DATABASE()");
        $database = mysql_result($res, 0);
    }

    $res = mysql_query("
        SELECT COUNT(*) AS count 
        FROM information_schema.tables 
        WHERE table_schema = '$database' 
        AND table_name = '$tablename'
    ");

    return mysql_result($res, 0) == 1;

}
?>