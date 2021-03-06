<?php
class ATCore_Request
{
	const GET = 'GET';
	const POST = 'POST';
	const HTTP = 'HTTP';
	const HTTPS = 'HTTPS';

	public static $protocol = '';

	public static $subdomain = '';

	public static $domain = '';

	public static $post = '80';

	public static $ip = '';

	public static $agent = '';

	public static $uri = '';

	public static $controller = 'main';

	public static $action = 'index';

	public static $params = '';

	public static function init()
	{
		self::$protocol = (isset(ATCore::$serv->https)) ? self::HTTPS : self::HTTP;

		self::$subdomain = '';

		self::$domain = ATCore::$serv->http_host;

		self::$post = ATCore::$serv->server_port;

		self::$ip = ATCore::$serv->remote_addr;

		self::$agent = ATCore::$serv->http_user_agent;

		self::$uri = ATCore::$serv->request_uri;

		$arr_uri = array_slice(explode('/', self::$uri), 1);
		$arr_uri = array_diff($arr_uri, array(''));

		if($arr_uri)
		{
			self::$controller = $arr_uri[0];
			self::$action = $arr_uri[1];
		}

		include_once ATCore::$serv->document_root . '/admin/controller/' . self::$controller . '.php';

		self::$controller = 'Controller_' . self::$controller;

		if(method_exists(self::$controller, 'before'))
		{
			call_user_func(self::$controller . '::before');
		}

		call_user_func(self::$controller . '::' . self::$action);

		if(method_exists(self::$controller, 'after'))
		{
			call_user_func(self::$controller . '::after');
		}
	}
}

?>