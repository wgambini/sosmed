<?php

class c_timeline extends CI_Controller{
	var $key = 'fmiNYO0XTIEzXNu0NzFA'; // this is your consumer key
	var $secret = 'ILCupjQW2DG9Dqhw0h3r4f98emCLeikTe7Y9bpucAs'; // this is your secret key

	function index(){
		$options = array( 'consumer_key' => $this->key, 'consumer_secret' => $this->secret );
		OAuthStore::instance("2Leg", $options );

		$url = "http://api.twitter.com/1/statuses/home_timeline.format?include_entities=true"; // this is the URL of the request
		$method = "GET"; // you can also use POST instead
		$params = null;

		try
		{
			// Obtain a request object for the request we want to make
			$request = new OAuthRequester($url, $method, $params);

			// Sign the request, perform a curl request and return the results,
			// throws OAuthException2 exception on an error
			// $result is an array of the form: array ('code'=>int, 'headers'=>array(), 'body'=>string)
			$result = $request->doRequest();

			$response = $result['body'];
			echo $response;
		}
		catch(OAuthException2 $e)
		{

		}
	}
}
?>