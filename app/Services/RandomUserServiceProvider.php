<?php

namespace App\Services;

use App\Services\Contracts\RandomDataInterface;
use App\Services\HttpClientServiceProvider;
use stdClass;

class RandomUserServiceProvider implements RandomDataInterface
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

		if (!isset($response->error)) {
			$response = $this->http_client_service->request();
			$res = new stdClass;
			$res->firstname = $response->results[0]->name->first;
			$res->lastname = $response->results[0]->name->last;
			$res->email = $response->results[0]->email;
		}

		return $res;
	}
}