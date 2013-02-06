<?php

class plugin
{
	private $vars = array();
	
	public function __construct()
	{
		$this->name = get_class($this);
	}

	public function __set($name, $val)
	{
		$this->vars[$name] = $val;
	}

	public function __get($name)
	{
		if(array_key_exists($name, $this->vars))
			return $this->vars[$name];
		else
			throw new Exception("$name does not exist");
	}
}