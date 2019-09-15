<?php
declare(strict_types=1);

namespace Oka\Registrator\Registry;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
interface RegistryInterface
{
	/**
	 * Get service defintion by name
	 * 
	 * @param string $name
	 * @param array $queries
	 * @return array []\Oka\Registrator\Model\Service
	 */
	public function getServices(string $name, array $queries = []) :array;
}
