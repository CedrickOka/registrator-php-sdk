<?php
namespace Oka\Registrator\Tests\Registry;

use Oka\Registrator\Registrator;
use PHPUnit\Framework\TestCase;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
class ConsulTest extends TestCase
{
	public function testGetServices()
	{
		$registrator = new Registrator();
		$consul = $registrator->consul('http://172.18.0.3:8500');
		$services = $consul->getServices($_ENV['SERVICE_NAME']);
		
		$this->assertCount(1, $services);
	}
}
