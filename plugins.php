<?php

require_once('plugin.php');

class plugins
{
	private $plugins = array();

	public function __construct()
	{
		$files = glob('plugins/*.php');
		foreach($files as $file)
		{
			$pinfo = pathinfo($file, PATHINFO_FILENAME);
			include_once($file);
			$this->plugins[$pinfo] = new $pinfo;
		}
	}

	public function __call($func, $args)
	{
		$ret = array();
		foreach($this->plugins as $plugin)
		{
			if(method_exists($plugin, $func) && is_callable(array($plugin, $func)))
			{
				$ret[$plugin->name] = call_user_func_array(array($plugin, $func), $args);
			}
		}

		return $ret;
	}

	public function __get($name)
	{
		$ret = array();
		foreach($this->plugins as $plugin)
		{
			if($plugin->name == $name)
			{
				return $plugin;
			}

			$ret[$plugin->name] = $plugin->$name;
		}

		return $ret;
	}

	public function __set($name, $value)
	{
		foreach($this->plugins as $plugin)
		{
			$plugin->$name = $value;
		}
	}
}