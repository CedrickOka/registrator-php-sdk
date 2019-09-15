<?php
declare(strict_types=1);

namespace Oka\Registrator\Registry;

use GuzzleHttp\RequestOptions;
use Oka\Registrator\Model\Service;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
class Consul extends AbstractRegistry implements RegistryInterface
{
	/**
	 * {@inheritDoc}
	 * @see \Oka\Registrator\Registry\RegistryInterface::getService()
	 */
	public function getServices(string $name, array $queries = []): array
	{
		/** @var \Psr\Http\Message\ResponseInterface $response */
		$response = $this->httpClient->get(sprintf('/v1/catalog/service/%s', $name), [
				RequestOptions::QUERY => $queries
		]);
		
		$services = [];
		$contents = json_decode($response->getBody()->getContents(), true);
		
		if (true === is_array($contents)) {
			foreach ($contents as $value) {
				if (false === isset($value['ServiceID']) || false === isset($value['ServiceName']) || false === isset($value['ServiceAddress']) || false === isset($value['ServicePort'])) {
					continue;
				}
				
				$service = new Service();
				$service->setId($value['ServiceID'])
						->setName($value['ServiceName'])
						->setIp($value['ServiceAddress'])
						->setPort($value['ServicePort']);
				
				if (false === empty($value['ServiceTags'])) {
					$service->setTags($value['ServiceTags']);
				}
				
				if (false === empty($value['ServiceMeta'])) {
					$service->setAttributes(new ParameterBag($value['ServiceMeta']));
				}
				
				$services[] = $service;
			}
		}
		
		return $services;
	}
}
