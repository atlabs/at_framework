<?php
$start = microtime(true);
/**
 * ���������� ������������ �������
 */
include 'autoload.php';
spl_autoload_register('autoload');

/**
 * ���������� ������������
 */
include 'config.php';

/**
 * ��������� ���������
 */
core::init();

$fin = microtime(true);

echo '<br>'.($fin-$start);
?>