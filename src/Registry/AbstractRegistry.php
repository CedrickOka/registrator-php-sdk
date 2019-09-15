<?php
declare(strict_types=1);

namespace Registry;

use GuzzleHttp\Client;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
abstract class AbstractRegistry
{
	/**
	 * @var Client $httpClient
	 */
	protected $httpClient;
	
	public function __construct(Client $httpClient)
	{
		$this->httpClient = $httpClient;
	}
}
