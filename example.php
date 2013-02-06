<?php

require 'plugins.php';

$plugins = new plugins;

$plugins->hello('World!');
$ret = $plugins->test(1, 2);
foreach($ret as $res)
{
	echo $res."\n";
}
$plugins->somethingElse();

?>