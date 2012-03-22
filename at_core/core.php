<?php

class ATCore
{
	public static $root = '';

	public static $serv = '';

	public static $init = false;


	public static function init()
	{
		if(self::$init)
		{
			return true;
		}

		spl_autoload_register('autoload');

		register_shutdown_function(function ()
		{
			return ATCore::shutdown_handler();
		});

		set_exception_handler(function (Exception $e)
		{
			echo 'exception '.$e; exit;
		});

		set_error_handler(function ($severity, $message, $filepath, $line)
		{
			echo 'error: '.$severity . ' '.$message.' '.$filepath.' '.$line;
		});

		self::$serv = (object)array_change_key_case($_SERVER, CASE_LOWER);

		self::$root = dirname(__FILE__) . '/at_core';

		ATCore_Request::init();
	}

	public static function shutdown_handler()
	{
		if ($last_error = error_get_last())
		{
			//error::error($last_error);
		}
	}
}


?>