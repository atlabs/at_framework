<?php
function autoload($class)
{
	$file = $class . '.php';

	if(find($file))
	{
		include_once find($file);
		class_alias('AT_'.$class, $class);
	}
}

function find($file)
{
	$dir_core = dirname(__FILE__) . '/at_core/';

	if(file_exists($dir_core . $file))
	{
		return $dir_core . $file;
	}

	$dir_app = dirname(__FILE__) . '/admin/controller/';

	if(file_exists($dir_app . $file))
	{
		return $dir_app . $file;
	}

	return false;
}

?>