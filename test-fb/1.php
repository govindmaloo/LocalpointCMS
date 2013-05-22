<?php 
session_start();
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
/*
$(document).ready(function(e) {
    if(getUrlVars()['access_token']){
	window.opener.$("#edit-fb_access_token").val(accessToken);
	window.close();
}


else if(window.location.hash.length == 0){
	var appID = getUrlVars()['api_key'];
	var url = location.href;
var url_parts = url.split('?');
var main_url = url_parts[0];
	var path = 'https://www.facebook.com/dialog/oauth?';
       var queryParams = ['client_id=' + appID,
         'redirect_uri=' + main_url,
         'response_type=token',
         'scope=offline_access,manage_pages,publish_stream'];
       var query = queryParams.join('&');
       var url = path + query;
window.location.href = url;
/*"https://www.facebook.com/dialog/permissions.request?app_id=219885444734929&display=popup&next=http%3A%2F%2Flocalpoint-cms.com%2Ftest-fb%2F2.php&response_type=token&fbconnect=1&perms=manage_pages%2Coffline_access%2Cpublish_checkins%2Cpublish_stream%2Cread_stream%2Crsvp_event%2Cshare_item%2Cstatus_update";
}
else
{
	


//$("#access_token").val(accessToken);
$("#get").click(function(e) {
	//window.opener.document.getElementById("edit-fb_access_token").value=hash1;
 window.close();
});
}

});
*/

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
</script>




<?php

// this url will redirect to 2.php where we will save the permanent session key
if($_REQUEST['access_token'])
{
	echo '<script>
$(document).ready(function(e) {
    if(getUrlVars()["access_token"]){
	window.opener.document.getElementById("edit-fb-access-token").value = getUrlVars()["access_token"];
	window.close();
}
})</script>';

}
else{
echo '<script>
$(document).ready(function(e) {
    if(getUrlVars()["access_token"]){
	window.opener.document.getElementById("edit-fb-access-token").value = getUrlVars()["access_token"];
	window.close();
}


else if(window.location.hash.length == 0){
	//var appID = getUrlVars()["api_key"];
	
	var appID = '.$_SESSION["api_key"].';
	var url = location.href;
var url_parts = url.split("?");
var main_url = url_parts[0];
	var path = "https://www.facebook.com/dialog/oauth?";
       var queryParams = ["client_id=" + appID,
         "redirect_uri=" + main_url,
         "response_type=token",
         "scope=offline_access,manage_pages,publish_stream"];
       var query = queryParams.join("&");
       var url = path + query;
window.location.href = url;
/*"https://www.facebook.com/dialog/permissions.request?app_id=219885444734929&display=popup&next=http%3A%2F%2Flocalpoint-cms.com%2Ftest-fb%2F2.php&response_type=token&fbconnect=1&perms=manage_pages%2Coffline_access%2Cpublish_checkins%2Cpublish_stream%2Cread_stream%2Crsvp_event%2Cshare_item%2Cstatus_update";*/
}
else
{
	
var hashStr = window.location.hash.substring(1);
        var arr = hashStr.split("&");
        var accessToken = arr[0];
//var hash = document.location.hash;
//var hash1 = hash.substring(hash.indexOf("#access_token=") + 14,hash.indexOf("&"));
//alert(hash1);
var page_access_token = null;
$.getJSON("https://graph.facebook.com/me/accounts?" + accessToken, function(data) {
	$.each(data, function(key, val){
		$.each(val, function(key, val){
		if(val.id=="'.$_SESSION['fan_page'].'")
		{
			page_access_token = val.access_token;
		}
		});
	});
 
}).success(function(){var url = "'.$_SESSION['base_url'].'/test-fb/1.php?access_token=" + page_access_token;
window.location.href= url;})


//$("#access_token").val(accessToken);
$("#get").click(function(e) {
	//window.opener.document.getElementById("edit-fb_access_token").value=hash1;
 window.close();
});
}

});

</script>';

}
/*echo '<script>
if(window.location.hash.length != 0){

}
</script>';*/
//unset($_SESSION['base_url']);

/*
$url = 'https://www.facebook.com/dialog/permissions.request?app_id=219885444734929&display=popup&next=http%3A%2F%2Flocalpoint-cms.com%2Ftest-fb%2F2.php&response_type=token&fbconnect=1&perms=user_about_me%2Cuser_activities%2Cuser_birthday%2Cuser_checkins%2Cuser_education_history%2Cuser_events%2Cuser_games_activity%2Cuser_groups%2Cuser_hometown%2Cuser_interests%2Cuser_likes%2Cuser_location%2Cuser_location_posts%2Cuser_notes%2Cuser_online_presence%2Cuser_photo_video_tags%2Cuser_photos%2Cuser_questions%2Cuser_relationship_details%2Cuser_relationships%2Cuser_religion_politics%2Cuser_status%2Cuser_subscriptions%2Cuser_videos%2Cuser_website%2Cuser_work_history%2Cads_management%2Ccreate_event%2Ccreate_note%2Cemail%2Cexport_stream%2Cmanage_friendlists%2Cmanage_notifications%2Cmanage_pages%2Coffline_access%2Cphoto_upload%2Cpublish_actions%2Cpublish_checkins%2Cpublish_stream%2Cread_friendlists%2Cread_insights%2Cread_mailbox%2Cread_requests%2Cread_stream%2Crsvp_event%2Cshare_item%2Csms%2Cstatus_update%2Cvideo_upload%2Cxmpp_login';
header("location: $url");
*/


?>