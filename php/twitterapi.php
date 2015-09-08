<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];
 
if ( strrpos($http_origin, "silentsleeper.com") || strrpos($http_origin, "mysite2") ){  
    header("Access-Control-Allow-Origin: $http_origin");
}
 
header('Content-Type: application/json');
 
ini_set('display_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'].'/twittertest/php/TwitterAPIExchange.php');
 
/** https://dev.twitter.com/apps/ getOAuth code here **/
$settings = array(
    'oauth_access_token' => "xxxxxxxxxxxxxxxxxxx",
    'oauth_access_token_secret' => "xxxxxxxxxxxxxxxxxxx",
    'consumer_key' => "xxxxxxxxxxxxxxxxxxx",
    'consumer_secret' => "xxxxxxxxxxxxxxxxxxx"
);
 
 
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
 
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$_SERVER['QUERY_STRING'];
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
 
$api_response = $twitter ->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
 
echo $api_response;

?>