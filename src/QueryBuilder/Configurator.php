<?php

namespace WebDevBr\QueryBuilder;

class Configurator
{
	private $config;

	public function __construct(Array $config)
	{
		if (empty($config['dsn'])) {
			throw new \Exception("dsn is required");
		}
		if (empty($config['user'])) {
			throw new \Exception("user is required");
		}
		if (empty($config['pass'])) {
			throw new \Exception("pass is required");
		}
		if (empty($config['config']) or !is_array($config['config'])) {
			$config['config'] = [];
		}
		$this->config = $config;
	}

	public function getConfig()
	{
		return $this->config;
	}
}