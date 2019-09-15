<?php
declare(strict_types=1);

namespace Oka\Registrator\Model;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 *
 * @author Cedrick Oka Baidai <okacedrick@gmail.com>
 *
 */
class Service implements ServiceInterface
{
	/**
	 * @var string $id
	 */
	protected $id;
	
	/**
	 * @var string $id
	 */
	protected $name;
	
	/**
	 * @var string $id
	 */
	protected $ip;
	
	/**
	 * @var int $id
	 */
	protected $port;
	
	/**
	 * @var array $tags
	 */
	protected $tags;
	
	/**
	 * @var array $attributes
	 */
	protected $attributes;
	
	public function __construct()
	{
		$this->tags = [];
		$this->attributes = new ParameterBag();
	}
	
	public function getId() :string
	{
		return $this->id;
	}
	
	public function setId(string $id) :self
	{
		$this->id = $id;
		return $this;
	}
	
	public function getName() :string
	{
		return $this->name;
	}
	
	public function setName(string $name) :self
	{
		$this->name = $name;
		return $this;
	}
	
	public function getIp() :string
	{
		return $this->ip;
	}
	
	public function setIp(string $ip) :self
	{
		$this->ip = $ip;
		return $this;
	}
	
	public function getPort() :int
	{
		return $this->port;
	}
	
	public function setPort(int $port) :self
	{
		$this->port = $port;
		return $this;
	}
	
	public function getTags() :array
	{
		return $this->tags;
	}
	
	public function addTags($tag) :self
	{
		if (false === in_array($tag, $this->tags)) {
			$this->tags[] = $tag;
		}
		return $this;
	}
	
	public function setTags(array $tags) :self {
		$this->tags = $tags;
		return $this;
	}
	
	public function removeTags($tag) :self
	{
		if (false !== ($key = array_search($tag, $this->tags))) {
			unset($this->tags[$key]);
		}
		return $this;
	}
	
	public function getAttributes() :ParameterBag
	{
		return $this->attributes;
	}
	
	public function setAttributes(ParameterBag $attributes) :self
	{
		$this->attributes = $attributes;
		return $this;
	}
}
