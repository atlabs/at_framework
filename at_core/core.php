<?php

class Core
{
	/**
	 * ���� � ���� ����������
	 */
	public static $root = '';
	
	public static $serv = '';
	
	public static $init = false;
	
	/**
	 * ������������� ����������
	 */
	public static function init()
	{
		if(self::$init)
		{
			return true;
		}
		
		self::$serv = (object) array_change_key_case($_SERVER, CASE_LOWER);
		
		self::$root = dirname(__FILE__) . '/at_core';
		
		request::init();
	}
}


?>