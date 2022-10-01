<?php

namespace App\Services;

use App\Services\Contracts\HttpClientInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\TransferStats;
use stdClass;

class HttpClientServiceProvider implements HttpClientInterface 
{
	private $client;
    private $url;
    private $params;
    private $headers;
    private $methodParams;
    private $method;

	public function __construct(){
        $this->url = '';
        $this->methodParams = [];
        $this->method = "POST";

        $this->client = new Client([
            'base_uri' => $this->url,
            'verify' => false,
            'http_errors' => false
        ]);
    }

	function request()
	{	
		try {
            $response = $this->client->request($this->method, $this->url, $this->methodParams);
            if ($response->getStatusCode() != '200') {
                $res = new stdClass;
                $res->error = 1;
                $res->message = "Something went wrong.";
            } else {
                $res = json_decode($response->getBody());
                return $res;
            }
            
        } catch (RequestException $e) {
            $res = new stdClass;
            $res->error = 1;
            $res->message = $e->getMessage();
            return $res;
        }
	}

    function setUrl($url)
    {
    	$this->url = $url;
        return $this;
    }

    function setHeaders($headers)
    {
    	$this->methodParams['headers'] = $headers;
        return $this;
    }

    function setParams($params)
    {
    	$request = "form_params";
        if ($this->method === "GET") {
            $request = "query";
        }

        $this->methodParams[$request] = $params;
        return $this;
    }

	function setMethod($method)
	{
		$this->method = $method;
        return $this;
	}
}

