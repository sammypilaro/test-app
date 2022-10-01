<?php

namespace App\Services\Contracts;

interface HttpClientInterface {
	function request();
    function setUrl($url);
    function setHeaders($headers);
    function setParams($params);
	function setMethod($method);
}