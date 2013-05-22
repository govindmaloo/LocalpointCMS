<?php 
$con = mysql_connect("localhost", "lpcms_dev" , "dev_123") or die(mysql_error());
mysql_select_db("lpcms_dev") or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$d = "sites/test.localpoint-cms.com/files";
$files = getDirectoryList($d);
/*foreach ($files as $file)
{
	print $file . '</br>';
}
//$result = mysql_query("select filename FROM file_managed WHERE filename IN('".implode("', '", $files)."')");
$count =0;
while($file = mysql_fetch_array($result))
{
	print $file['filename'] . '<br/>';
	$count++;
}
print $count;

*/
foreach($files as $file)
{
	
	$success = rename($d."/".$file, $d."/".$file."jpg");
	if($success)
	{
		print $newname =  $file."jpg";
		print '<br/>';
		print $newuri = "public://".$file."jpg";
		print '<br/>';		print '<br/>';
		mysql_query("update file_managed set filename = '".$newname."', uri = '".$newuri."' , filemime = 'image/jpeg'  where filename = '". $file ."'") or die(mysql_error());
	}
}

/*
$sql = 'SELECT uri 
FROM  `file_managed` 
WHERE uri NOT LIKE  "public%"
AND uri NOT LIKE  "youtube%"
LIMIT 0 , 1000' ;

$results = mysql_query($sql) or die(mysql_error());
while($result = mysql_fetch_array($results))
{ 
	$newuri = "public://" . $result['uri'];
 	mysql_query("update file_managed set uri = '".$newuri."' where uri = '". $result['uri'] ."'") or die(mysql_error());
}
*/
  function getDirectoryList ($directory) 
  {

    // create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // open directory and walk through the filenames
    while ($file = readdir($handler)) {
    $extension = substr($file, strrpos($file, '.'));
//	print $extension . '<br/>';
      // if file isn't this directory or its parent, add it to the results
      if ($file != "." && $file != ".." && $extension == '.') {
        $results[] = $file;
      }

    }

    // tidy up: close the handler
    closedir($handler);

    // done!
    return $results;

  }

?>
</body>
</html>