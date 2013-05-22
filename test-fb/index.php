<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'fb/src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '219885444734929',
  'secret' => 'a1351d7c21ddf8ea8a4c70a75ddca1d0',
));

//$facebook->setAccessToken("219885444734929|MSsQmtfqc3FW-LiSX__NVWYoVqg");

$loginUrl = $facebook->getLoginUrl(array(
    'canvas' => 0,
    'fbconnect' => 0,
    'scope' => 'offline_access,publish_stream'
));
$user = $facebook->getUser();
if($user){
    echo $facebook->getAccessToken();
}
$post =  array(
    'access_token' => '219885444734929|MSsQmtfqc3FW-LiSX__NVWYoVqg',
    'message' => 'This message is posted with access token - ' . date('Y-m-d H:i:s')
);

//and make the request
$res = $facebook->api('/Govind.maloo/feed', 'POST', $post);

//For example this can also be used to gain user data
//and this time only token is needed
$token =  array(
    'access_token' => '219885444734929|MSsQmtfqc3FW-LiSX__NVWYoVqg'
);
$userdata = $facebook->api('/Govind.maloo', 'GET', $token);


?>
