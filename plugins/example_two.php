<?php

class example_two extends plugin
{
	public function test($one, $two)
	{
		$ret = $one * $two;
		echo "$one * $two: ". $ret ."\n";
		return $ret;
	}
}