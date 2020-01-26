import requests_oauthlib,requests

# https://developer.twitter.com/
CONSUMER_KEY = ''
CONSUMER_SECRET = ''
OAUTH_TOKEN = ''
OAUTH_SECRET_KEY = ''
OAUTH_CALLBACK = 'YOUR CALLBACK URL'

# https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/overview
WEBHOOK_URL = 'https://[YOUR-HOST]/webhook'
ENV_NAME = 'yourEnvName'

URL = 'https://api.twitter.com/1.1/account_activity/all/'+ENV_NAME+'/webhooks.json?url='+WEBHOOK_URL

twitterAPI = requests.post(URL,data={},auth=requests_oauthlib.OAuth1(CONSUMER_KEY,CONSUMER_SECRET,OAUTH_TOKEN,OAUTH_SECRET_KEY,decoding=None))

print("Done") if twitterAPI.status_code == 200 else print(twitterAPI.text)
