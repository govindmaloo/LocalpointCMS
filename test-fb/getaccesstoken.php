<?php 
session_start();
  $app_id = "219885444734929";
   $app_secret = "a1351d7c21ddf8ea8a4c70a75ddca1d0";
   $my_url = "http://www.localpoint-web.ch/test-fb/getaccesstoken.php";
   
   if($_REQUEST['logout']){
	   	$logout = 'https://www.facebook.com/logout.php?access_token='.$_SESSION['user_access_token'].'&confirm=1&next=';
		$redirect = $my_url.'?access_token=' .$_SESSION['access_token'];
		echo("<script> window.location.href='" . $logout . urlencode($redirect). "'</script>");
   }
  if($_REQUEST['access_token'])
	{
		$redirect = $_SESSION['base_url'].'/test-fb/getaccesstoken.php?access_token=' .$_REQUEST['access_token'].'&confirm=1';
		session_destroy();
		if($_REQUEST['confirm'] != 1)
		 echo("<script> window.location.href='" . $redirect. "'</script>");
		print '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>';
echo '<script>
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf("?") + 1).split("&");
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split("=");
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

$(document).ready(function(e) {
    if(getUrlVars()["access_token"]){
	window.opener.document.getElementById("edit-fb-access-token").value = getUrlVars()["access_token"];
	window.close();
}
})</script>';
exit(0);
}
  
  
  
   
   //print "before-session : " .$_SESSION['fan_page'];
   if(!isset($_SESSION['base_url'])){ $_SESSION['base_url'] = $_REQUEST['base_url'];}
   if(!isset($_SESSION['fan_page'])){ $_SESSION['fan_page'] = $_REQUEST['fan_page'];}
   if(!isset($_SESSION['api_key'])){$_SESSION['api_key'] = $app_id = $_REQUEST['api_key'];}
   
   $code = $_REQUEST["code"];
   if(empty($code)) {
     // Redirect to Login Dialog
	 $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
	 //print $_SESSION['state'];
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
       . $_SESSION['state']. "&scope=offline_access,manage_pages,publish_stream,status_update,read_stream";
	
     echo("<script> window.location.href='" . $dialog_url . "'</script>");
   }
  //print $_SESSION['state'];
   if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
     $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
       . "&client_secret=" . $app_secret . "&code=" . $code;

     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);
	// print_r($params);
	// echo $params['access_token'] ." expire in ".$params['expires'];
/* echo("<script> top.location.href='" . "http://localpoint-web.ch/test-fb/1.php?access_token=" . $params['access_token']. "'</script>");
  */  
     $_SESSION['user_access_token'] = $params['access_token'];

     $graph_url = "https://graph.facebook.com/me/accounts?access_token=" 
       . $params['access_token'];

     $user = json_decode(file_get_contents($graph_url));
	 //print_r($user);
     //echo("Hello " . $user->name);
	 $page_id =  $_SESSION['fan_page'];
	 unset($_SESSION['fan_page']);
	 $pages = $user->data;
	 //print_r($pages);
	 $check = true;
	 foreach($pages as $obj){
		//print "For every page and application<br>";
		print $page_id ;
		if($obj->id == $page_id){
		//print $obj->category;
		//print $obj->access_token;
		$check = false;
		$_SESSION['access_token'] = $obj->access_token;
		echo("<script>window.location.href='" . $my_url . "?logout=true'</script>");
  
		/*$token_url = "https://graph.facebook.com/oauth/access_token?             
    client_id=". $app_id . "&
    client_secret=".$app_secret."&
    grant_type=fb_exchange_token&
    fb_exchange_token=".$obj->access_token;
	
	$response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);
	 print_r($params);*/
		//print $obj->name;
		}
	 }
	 if($check){
		 echo "<h1>Given page id not owned by the current user</h1>";
	 }
	 
   }
   else {
     echo("The state does not match. You may be a victim of CSRF.");
   }
 ?>