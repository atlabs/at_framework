<?php
header('Content-type: text/html; charset=utf-8');
$start = microtime(true);

include 'autoload.php';
include '/at_core/core.php';

include 'config.php';

core::init();

$fin = microtime(true);

echo '<br>' . ($fin - $start);
?>