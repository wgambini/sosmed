<?php
require 'globals.php';
require 'oauth_helper.php';

class Twitter{

	private $reqUrl = 'http://api.twitter.com/oauth/request_token';
	private $consumer_key = 'SemtzQAERJSB0z5QoXbCtg';
	private $consumer_secret = 'aeZuZzj0sbSNZr91oOQqmRun3aXfkaQy3EbgTnB3qHQ';

    function __construct(){
        
    }
	
	function get_request_token($callback = 'oob', $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=false)
	{
		$retarr = array();  // return value
		$response = array();
		
		$params['oauth_version'] = '1.0';
		$params['oauth_nonce'] = mt_rand();
		$params['oauth_timestamp'] = time();
		$params['oauth_consumer_key'] = $this->consumer_key;
		$params['oauth_callback'] = $callback;
		
		$headers = array();
	
		// compute signature and add it to the params list
		if ($useHmacSha1Sig) {
			$params['oauth_signature_method'] = 'HMAC-SHA1';
			$params['oauth_signature'] =
			oauth_compute_hmac_sig($usePost? 'POST' : 'GET', $this->reqUrl, $params,
					$this->consumer_secret, null);
		} else {
			$params['oauth_signature_method'] = 'PLAINTEXT';
			$params['oauth_signature'] =
			oauth_compute_plaintext_sig($this->consumer_secret, null);
		}
	
		// Pass OAuth credentials in a separate header or in the query string
		if ($passOAuthInHeader) {
			$query_parameter_string = oauth_http_build_query($params, true);
			$header = build_oauth_header($params, "Twitter API");
			$headers[] = $header;
		} else {
			$query_parameter_string = oauth_http_build_query($params);
		}
	
		// POST or GET the request
		if ($usePost) {
			$request_url = $this->reqUrl;
			logit("getreqtok:INFO:request_url:$request_url");
			logit("getreqtok:INFO:post_body:$query_parameter_string");
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			$response = do_post($request_url, $query_parameter_string, 80, $headers);
		} else {
			$request_url = $this->reqUrl . ($query_parameter_string ?
					('?' . $query_parameter_string) : '' );
			logit("getreqtok:INFO:request_url:$request_url");
			$response = do_get($request_url, 80, $headers);
		}
	
		// extract successful response
		if (! empty($response)) {
			list($info, $header, $body) = $response;
			$body_parsed = oauth_parse_str($body);
			if (! empty($body_parsed)) {
				logit("getreqtok:INFO:response_body_parsed:");
			}
			$retarr = $response;
			$retarr[] = $body_parsed;
		}
	
		return $retarr;
	}
}