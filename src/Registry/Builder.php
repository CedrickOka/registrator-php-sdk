<?php
declare(strict_types=1);

namespace Oka\Registrator\Registry;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
class Builder
{
	/**
	 * @var array $clientOptions
	 */
	private $clientOptions;
	
	/**
	 * @var string $rootNamespace
	 */
	private $rootNamespace;
	
	public function __construct(array $clientOptions = [], string $rootNamespace = 'Oka\Registrator\Registry')
	{
		$this->clientOptions = $clientOptions;
		$this->rootNamespace = $rootNamespace;
	}
	
	/**
	 * @param string $namespace
	 * @param string $baseUrl
	 * @param array $clientOptions
	 * @return RegistryInterface
	 */
	public function createRegistry(string $namespace, string $baseUrl, array $clientOptions = []) :RegistryInterface
	{
		$registryClass = $this->getClass($namespace);
		
		return new $registryClass($this->httpClient($baseUrl, $clientOptions));
	}
	
	/**
	 * @param string $namespace
	 * @throws \RuntimeException
	 * @return string
	 */
	private function getClass($namespace) :string
	{
		$class = $this->rootNamespace.'\\'.$namespace;
		
		if (false === class_exists($class)) {
			throw new \RuntimeException(sprintf('%s does not exist', $class));
		}
		
		return $class;
	}
	
	private function httpClient($baseUrl, $options)
	{
		$clientOptions = [
				'base_uri' => static::normalizeUrl($baseUrl),
				RequestOptions::CONNECT_TIMEOUT => 15,
				RequestOptions::TIMEOUT => 30
		];
		
		if (false === empty($this->clientOptions)) {
			$clientOptions = array_merge($this->clientOptions, $options);
		}
		
		return new Client($clientOptions);
	}
	
	private static function normalizeUrl(string $url): string
	{
		if (false === strpos($url, 'http')) {
			$url = 'http://'.$url;
		}
		
		return rtrim($url, '/').'/';
	}
}
