<?php
function autoload($class)
{
	$file = strtolower(str_replace('ATCore_', '', $class)) . '.php';

	if(find($file))
	{
		require_once find($file);

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