<?php
header('Content-type: text/html; charset=utf-8');

include 'autoload.php';
include '/at_core/core.php';

ATCore::init();

include 'config.php';

$token = ATCore_debug::start('sql', array(1, 2,3,5));

$sql = ATCore_db::query('SELECT * FROM `log`');
echo 1;
print_r(mysql_fetch_assoc($sql));

ATCore_debug::stop($token, array(4,5,6));

echo "<pre>";
print_r(ATCore_debug::$data);
?>