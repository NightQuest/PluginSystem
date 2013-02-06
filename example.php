<?php

require 'plugins.php';

$plugins = new plugins;

echo "Loaded plugins:\n";
$names = $plugins->name;
foreach($names as $name)
{
	echo $name."\n";
}
echo "\n";

$plugins->hello('World!'); // implicit call
$plugins->example_one->hello('World!'); // explicit call

$plugins->somethingElse();
$ret = $plugins->test(1, 2);
foreach($ret as $name => $res)
{
	echo "$name: $res\n";
}
echo "\n";

// Hacky, but this is simply an example and saves typing.
$ob = nl2br(ob_get_contents());
ob_end_clean();
echo $ob;
?>