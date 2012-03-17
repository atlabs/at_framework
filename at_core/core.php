<?php

class Core
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

		register_shutdown_function(function ()
		{
			return core::shutdown_handler();
		});

		set_exception_handler(function (Exception $e)
		{
			return error::exception_handler($e);
		});

		set_error_handler(function ($severity, $message, $filepath, $line)
		{
			return error::error_handler($severity, $message, $filepath, $line);
		});

		self::$serv = (object)array_change_key_case($_SERVER, CASE_LOWER);

		self::$root = dirname(__FILE__) . '/at_core';

		request::init();
	}

	public static function shutdown_handler()
	{
		if ($last_error = error_get_last())
		{
			error::error($last_error);
		}
	}
}


?>