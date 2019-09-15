<?php
declare(strict_types=1);

namespace Oka\Registrator;

use Oka\Registrator\Registry\Builder;
use Oka\Registrator\Registry\RegistryInterface;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
class Registrator
{
	/**
	 * @var Builder
	 */
	private $builder;
	
	/**
	 * @param array $clientOptions Guzzle Http request options
	 * @param Builder $builder
	 */
	public function __construct(array $clientOptions = [], Builder $builder = null) 
	{
		$this->builder = new Builder($clientOptions, 'Oka\Registrator\Registry');
	}
	
	public function consul(string $registryUrl, array $clientOptions) :RegistryInterface
	{
		return $this->builder->createRegistry('Consul', $registryUrl, $clientOptions);
	}
}
