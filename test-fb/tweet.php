
<?php

$user = $_REQUEST['user'];
$pwd = $_REQUEST['psw'];
$status = $_REQUEST['status'];
$url = $_REQUEST['destination'];


    if (!function_exists("curl_init")) die("twitterSetStatus needs CURL module, please install CURL on your php.");
    $ch = curl_init();
 
    // -------------------------------------------------------
    // get login form and parse it
    curl_setopt($ch, CURLOPT_URL, "https://mobile.twitter.com/session/new");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A543a Safari/419.3 ");
    $page = curl_exec($ch);
//print $page;
    $page = stristr($page, "<div class='signup-body'>");
    preg_match("/form action=\"(.*?)\"/", $page, $action);
    preg_match("/input name=\"authenticity_token\" type=\"hidden\" value=\"(.*?)\"/", $page, $authenticity_token);
 
    // -------------------------------------------------------
    // make login and get home page
    $strpost = "authenticity_token=".urlencode($authenticity_token[1])."&username=".urlencode($user)."&password=".urlencode($pwd);
    curl_setopt($ch, CURLOPT_URL, $action[1]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $strpost);
    $page = curl_exec($ch);
	// print $page;
    // check if login was ok
    preg_match("/\<div class=\"warning\"\>(.*?)\<\/div\>/", $page, $warning);
    if (isset($warning[1])) return $warning[1];
    $page = stristr($page,"<div class='tweetbox'>");
    preg_match("/form action=\"(.*?)\"/", $page, $action);
    preg_match("/input name=\"authenticity_token\" type=\"hidden\" value=\"(.*?)\"/", $page, $authenticity_token);
 
    // -------------------------------------------------------
    // send status update
    $strpost = "authenticity_token=".urlencode($authenticity_token[1]);
    $tweet['display_coordinates']='';
    $tweet['in_reply_to_status_id']='';
    $tweet['lat']='';
    $tweet['long']='';
    $tweet['place_id']='';
    $tweet['text']=$status;
    $ar = array("authenticity_token" => $authenticity_token[1], "tweet"=>$tweet);
    $data = http_build_query($ar);
    curl_setopt($ch, CURLOPT_URL, $action[1]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $page = curl_exec($ch);
// print $page;
    return true;
header("location: ". $url);
?>