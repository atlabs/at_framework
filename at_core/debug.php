<?php

class AT_Debug
{
	public static $data = array();

	public static $group = array();

	public static function start($group = 'pub', array $params = array())
	{
		$token = 'debug/'.md5($group.implode(',', $params));

		static::$group[$token] = $group;
		static::$data[$token][$group] = array(
			"start_time" 	=> microtime(true),
			"start_memory" 	=> memory_get_usage(),
			"params" 		=> $params
		);

		return $token;
	}

	public static function stop($token, array $result = array())
	{
		$end_data = array(
			'end_time' 		=> microtime(true),
			'end_memory' 	=> memory_get_usage(),
			'result' 		=> $result
		);

		static::$data[$token][static::$group[$token]] = array_merge(static::$data[$token][static::$group[$token]], $end_data);
	}
}