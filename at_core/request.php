<?php
class Request
{
	const GET = 'GET';
	const POST = 'POST';
	const HTTP = 'HTTP';
	const HTTPS = 'HTTPS';
	
	public static $protocol 	= '';
	
	public static $subdomain 	= '';

	public static $domain 		= '';
	
	public static $post 		= '80';
	
	public static $ip 			= '';
	
	public static $agent 		= '';
	
	public static $uri 			= '';
	
	public static $controller 	= 'main';
	
	public static $action 		= 'index';
	
	public static $params 		= '';
	
	/**
	 * Инициализация запроса и определение серверных данных
	 */
	public static function init()
	{
		self::$protocol = (core::$serv->https) ? 
			self::HTTPS:
			self::HTTP;
		
		self::$subdomain = '';
		
		self::$domain = core::$serv->http_host;
		
		self::$post = core::$serv->server_port;
		
		self::$ip = core::$serv->remote_addr;
		
		self::$agent = core::$serv->http_user_agent;
		
		self::$uri = core::$serv->request_uri;
		
		$arr_uri = array_slice(explode('/', self::$uri), 1);
		$arr_uri = array_diff($arr_uri, array(''));
		
		if($arr_uri)
		{
			self::$controller = $arr_uri[0];
			self::$action = $arr_uri[1];
		}
		
		include_once core::$serv->document_root . '/admin/controller/'.self::$controller.'.php';
		
		self::$controller = 'Controller_'.self::$controller;
		
		if(method_exists(self::$controller, 'before'))
		{
			call_user_method('before', self::$controller);
		}
		
		call_user_method(self::$action, self::$controller);
		
		if(method_exists(self::$controller, 'after'))
		{
			call_user_method('after', self::$controller);
		}
	}
}
?>