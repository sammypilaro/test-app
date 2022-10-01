<?php

namespace App\Services;

use App\Services\Contracts\RandomDataInterface;
use App\Services\HttpClientServiceProvider;
use stdClass;

class RandomDataAPIServiceProvider implements RandomDataInterface 
{

	private $http_client_service;

	public function __construct()
	{		
		$this->http_client_service = new HttpClientServiceProvider();
	}

	public function getFullNameAndEmail($base_url)
	{
		$this->http_client_service
			->setMethod('GET')
			->setUrl($base_url);

		$response = $this->http_client_service->request();
		if (!isset($response->error)) {
			$res = new stdClass;
			$res->firstname = $response->first_name;
			$res->lastname = $response->last_name;
			$res->email = $response->email;
		}

		return $res;
	}
}