# Threader
Threader takes all tweets from the thread and collects them for you automatically using [webhook] with (auto-reply)

--------------
# Requirements
- Python
  * requests_oauthlib
  * requests
- PHP
  * https://twitteroauth.com/
  
 -------------
 # how to use :-
 first you need fill all info in `server-side-configuration.php` :-
 ```php
 /////////////////////////////
// https://developer.twitter.com/
$CONSUMER_KEY = '';
$CONSUMER_SECRET = '';
$OAUTH_TOKEN = '';
$OAUTH_SECRET_KEY = '';
$MY_USER_ID = ''; // your user-id
////////////////////////////
 ```
 and then upload it on your server and fill all info in `` :-
 
 ```python
 # https://developer.twitter.com/
CONSUMER_KEY = ''
CONSUMER_SECRET = ''
OAUTH_TOKEN = ''
OAUTH_SECRET_KEY = ''
OAUTH_CALLBACK = 'YOUR CALLBACK URL'

# https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/overview
WEBHOOK_URL = 'https://[YOUR-HOST]/webhook' # HERE YOUR SERVER URL AFTER UPLOAD server-side-configuration.php
ENV_NAME = 'yourEnvName'
 ```
 -----------------------
 # Note :-
 [YOU SHOULD READ THIS](https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/overview)
