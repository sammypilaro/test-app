<?php

namespace App\Services\Contracts;

interface RandomDataInterface {
	function getFullNameAndEmail($base_url);
}