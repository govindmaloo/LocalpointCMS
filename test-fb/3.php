<?php
define('FB_APIKEY', '219885444734929');
define('FB_SECRET', 'a1351d7c21ddf8ea8a4c70a75ddca1d0');

$con = mysql_connect("localhost", "root", "abc123") or die(mysql_error()) ; 
mysql_select_db('testfb');

$query = "select * from fb_user_session";
$results = mysql_query($query);
$result = mysql_fetch_array($results);

define('FB_SESSION',$result[1]);
require_once('fb/src/facebook.php'); // this file will call restlibapi. soo make sure you have rst api file in your folder.
try {
$facebook = new Facebook(FB_APIKEY, FB_SECRET);
$facebook->api_client->session_key = FB_SESSION;

$fetch = array('friends' => array('pattern' => '.*','query' => "select uid2 from friend where uid1={$user}"));

echo $facebook->api_client->admin_setAppProperties(array('preload_fql' => json_encode($fetch)));
$message = 'anils message1';
if( $facebook->api_client->stream_publish($message))
echo 'message posted successfully';
} 
catch(Exception $e) {
echo $e . "<br />";
}
?>