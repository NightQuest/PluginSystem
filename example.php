<?php

require 'plugins.php';

$hook = new Plugins;

$hook->hello('World!');
$hook->test(1, 2);
$hook->somethingElse();

?>