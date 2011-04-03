<?php

/*
 * A wrapper for official.fm's Simple API
 * 
 * Requires the json extension, the libcurl extension and
 * Sean Huber's curl wrapper - https://github.com/shuber/curl
 * 
 * @package officialfm
 * @author Amos Wenger <amos@official.fm>
 */

require_once 'curl.php';

class OfficialFM {

    const API_BASE_URL = "http://api.official.fm/";
    
    /**
     * The CURL handle we use to make all requests
     */
    protected $curl;
    
    /**
     * Default HTTP parameters used in all requests
     */
    protected $default_params;
    
    /**
     * The user's official.fm API key
     */
    protected $api_key = "";
    
    /**
     * Initialize an OfficialFM object with your API key
     * 
     * @param string $api_key
     */
    function __construct($api_key)
    {
      $this->api_key = $api_key;
      $this->curl = new Curl;
      $this->curl->follow_redirects = false;
      $this->curl->headers['Content-Type'] = 'application/json';
      $this->curl->headers['Accept']       = 'application/json';
      $this->default_params = array(
        'key'     => $this->api_key,
        'format'  => 'json',
      );
    }
          
    // Retrieve information about a specific user
    public function user($user_id) {
      return $this->call_api('user/'.$user_id, array());
    }

    // helper to use CURL and decode from json
    private function call_api($sub_url, $other_params) {
      $params = array_merge($this->default_params, $other_params);
      $url = self::API_BASE_URL.$sub_url;
      
      $json = utf8_encode($this->curl->get($url, $params));
      // TODO: what about error checking? (e.g. invalid UTF-8 encoding)
      $obj = json_decode($json);
      return $obj[0];
    }

}

?> 
