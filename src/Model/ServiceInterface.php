<?php
declare(strict_types=1);

namespace Oka\Registrator\Model;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
interface ServiceInterface
{
	/**
	 * Gets unique service instance ID
	 * 
	 * @return string
	 */
	public function getId() :string;
	
	/**
	 * Gets service name
	 * 
	 * @return string
	 */
	public function getName() :string;
	
	/**
	 * Gets IP address service is located at
	 * 
	 * @return string
	 */
	public function getIp() :string;
	
	/**
	 * Gets port service is listening on
	 *
	 * @return int
	 */
	public function getPort() :int;
	
	
	/**
	 * Gets extra tags to classify service
	 *
	 * @return array
	 */
	public function getTags() :array;
	
	
	/**
	 * Gets extra attribute metadata
	 *
	 * @return ParameterBag
	 */
	public function getAttributes() :ParameterBag;
}