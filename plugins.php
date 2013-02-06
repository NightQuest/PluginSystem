<?php

class Plugins
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
		foreach($this->plugins as $plugin)
		{
			if(method_exists($plugin, $func) && is_callable(array($plugin, $func)))
			{
				call_user_func_array(array($plugin, $func), $args);
			}
		}
	}
}

?>