<?php
$token = debug::start('app', array(1, 2,3));
echo $token;
header('Content-type: text/html; charset=utf-8');

include 'autoload.php';
include '/at_core/core.php';

include 'config.php';

core::init();

?>