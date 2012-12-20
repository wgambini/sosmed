<?php
class Library{

	var $oauthrequester;
	var $key = 'SemtzQAERJSB0z5QoXbCtg';
	var $secret = 'aeZuZzj0sbSNZr91oOQqmRun3aXfkaQy3EbgTnB3qHQ';

	function __construct(){

	}

	function request_token(){
		$request_token_info = null;
		try {
			$oauth = new OAuth('SemtzQAERJSB0z5QoXbCtg', 'aeZuZzj0sbSNZr91oOQqmRun3aXfkaQy3EbgTnB3qHQ');
			$request_token_info = $oauth->getRequestToken("https://api.twitter.com/oauth/request_token");
			if(empty($request_token_info)) {
				print "Failed fetching request token, response was: " . $oauth->getLastResponse();
				return;
			}
		} catch(OAuthException $E) {
			echo "Response: ". $E->lastResponse . "\n";
		}
		return $request_token_info;
	}

	function get_ouauth_requester($url, $method, $params){
		$options = array('consumer_key' => $this->key, 'consumer_secret' => $this->secret);
		OAuthStore::instance("2Leg", $options);
		$request = null;
		try{
			$request = OAuthRequester($url, $method, $params);
			// Obtain a request object for the request we want to make
			$request = OAuthRequester($url, $method, $params);

			// Sign the request, perform a curl request and return the results,
			// throws OAuthException2 exception on an error
			// $result is an array of the form: array ('code'=>int, 'headers'=>array(), 'body'=>string)
			/* $result = $request->doRequest();

			$response = $result['body']; */
		}catch(OAuthException2 $e){
		}
		return $request;
	}
}