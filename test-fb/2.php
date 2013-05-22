<?php
session_start();

if(!isset($_SESSION['base_url']))
{ 
$_SESSION['base_url'] = $_REQUEST['base_url'];
}
if(!isset($_SESSION['fan_page_url']))
{ 
	$_SESSION['fan_page'] = $_REQUEST['fan_page'];
}
if(!isset($_SESSION['api_key']))
{ 
	$_SESSION['api_key'] = $_REQUEST['api_key'];
}


?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
/*
$(document).ready(function(e) {

 var hashStr = window.location.hash.substring(1);

        var arr = hashStr.split('&');

        var accessToken = arr[0];
//var hash = document.location.hash;
//var hash1 = hash.substring(hash.indexOf("#access_token=") + 14,hash.indexOf("&"));
//alert(hash1);

$("#access_token").val(accessToken);
$("#get").click(function(e) {
	//window.opener.document.getElementById("edit-fb_access_token").value=hash1;
 window.close();
});
    
});*/

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

var appID = getUrlVars()["api_key"];
	var url = location.href;
var url_parts = url.split("?");
var main_url = url_parts[0];
	var path = "https://www.facebook.com/dialog/oauth?";
       var queryParams = ["client_id=" + appID,
         "redirect_uri=http://localpoint-cms.com/test-fb/1.php",
         "response_type=token",
         "scope=offline_access,manage_pages,publish_stream",
		 "enable_profile_selector=1"];
       var query = queryParams.join("&");
       var url = path + query;
window.location.href = url;

</script>
<script>


/*
var urlParams = {};
(function () {
    var e,
        a = /\+/g,  // Regex for replacing addition symbol with a space
        r = /([^&=]+)=?([^&]*)/g,
        d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
        q = window.location.search.substring(1);

    while (e = r.exec(q))
       urlParams[d(e[1])] = d(e[2]);
})();


var hash = document.location.hash;
var hash1 = hash.substring(hash.indexOf("#access_token=") + 14,hash.indexOf("&"));
parent.location = urlParams["parent"];
alert(urlParams["parent"]);
var val = window.opener.$("#edit-fb_access_token").val(hash1);
window.close();
*/


</script>

<h3>Copy from text box</h3>
<input type="text" id="access_token" width="60" value="" />
<a href="javascript: void(0)" id="get">Close</a>
<?php

/*<input type="text" id="access_token" name="access_token" value="" />
$con = mysql_connect("localhost", "root", "abc123") or die(mysql_error()) ; 
mysql_select_db('testfb');

$query = "insert into fb_user_session values('', '$uid', '$sessionkey')";
mysql_query($query, $con);

// save the permanent session key, and user id in your database. This way diff users will be having different set of permanent session keys and user ids.
/*$url = 'http://www.facebook.com/login.php?api_key=219885444734929&connect_display=popup&v=1.0&next=3.php&cancel_url=http://www.facebook.com/connect/login_failure.html&fbconnect=true&return_session=true&req_perms=read_stream,publish_stream,offline_access';
header("location: $url");

*/
?>