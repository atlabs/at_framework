<?php

class ATCore_Db
{
	public static $_link = '';

	public static $_host = '';

	public static $_login = '';

	public static $_password = '';

	public static $_db = '';

	public static function connect()
	{
		static::$_link = mysql_connect(static::$_host, static::$_login, static::$_password);
		mysql_select_db(static::$_db);
	}

	public static function query($sql)
	{
		$result = mysql_query($sql, static::$_link);

		return $result;

	}
}