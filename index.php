<?php
$start = microtime(true);
/**
 * Подключаем автозагрузку классов
 */
include 'autoload.php';
spl_autoload_register('autoload');

/**
 * Подключаем конфигурацию
 */
include 'config.php';

/**
 * Запускаем фреймворк
 */
core::init();

$fin = microtime(true);

echo '<br>'.($fin-$start);
?>