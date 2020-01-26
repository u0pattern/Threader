<?php
require "twitteroauth/autoload.php";
// https://twitteroauth.com/
use Abraham\TwitterOAuth\TwitterOAuth;

/////////////////////////////
// https://developer.twitter.com/
$CONSUMER_KEY = '';
$CONSUMER_SECRET = '';
$OAUTH_TOKEN = '';
$OAUTH_SECRET_KEY = '';
$MY_USER_ID = ''; // your user-id
////////////////////////////

if(isset($_REQUEST['crc_token'])) {
  $signature = hash_hmac('sha256', $_REQUEST['crc_token'], $CONSUMER_SECRET, true);
  $response['response_token'] = 'sha256='.base64_encode($signature);
  header('content-type: application/json;charset=utf-8');
  echo json_encode($response);
} else {
	$event = file_get_contents('php://input');
	if(strpos($event, 'tweet_create_events') !== false) {
		$eventAPI = json_decode($event,true)['tweet_create_events'][0];
		if($eventAPI['in_reply_to_user_id_str'] == $MY_USER_ID){
			$urlThread = 
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $OAUTH_TOKEN, $OAUTH_SECRET_KEY);
			// IMPORTANT: change `$host` var value in `twitteroauth.php` to `https://api.twitter.com/`
			$dataThread = $connection->get("2/timeline/conversation/".$eventAPI['in_reply_to_status_id_str'].".json?earned=true&include_entities=true&include_cards=true&cards_platform=Android-12&include_carousels=true&ext=stickerInfo%2CmediaRestrictions%2CaltText%2CmediaStats%2CmediaColor%2Cinfo360%2CcameraMoment%2Cmaster_playlist_only&include_media_features=true&include_blocking=true&include_blocked_by=true&tweet_mode=extended&include_reply_count=true&include_composer_source=true&simple_quoted_tweet=true&include_ext_media_availability=true&include_user_entities=true&include_profile_interstitial_type=true");
			$idsThread = json_decode($dataThread, true)['tweets'];
			foreach($idsThread as $idTweet => $valueTweet){
				echo "$idTweet: $valueTweet<br>";
				
				//////////////////////
				// Do what ever you want to do here
				//////////////////////
				
				/////////////////////////////////
				// auto-reply
				$statues = $connection->post("1.1/statuses/update", ["status" => "test"]);
			}
		}
	}
}
?>
