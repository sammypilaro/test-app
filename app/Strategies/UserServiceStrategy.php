<?php

namespace App\Strategies;

use App\Strategies\Contracts\UserServiceInterface;
use App\Services\Contracts\RandomDataInterface;

class UserServiceStrategy implements UserServiceInterface
{
	private $random_data_strategy;
	public function __construct(RandomDataInterface $random_data_strategy)
	{	
		$this->random_data_strategy = $random_data_strategy;
	}

	public function getRandomUser($base_url)
	{
		return $this->random_data_strategy->getFullNameAndEmail($base_url);
	}
}