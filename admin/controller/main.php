<?php
class Controller_Main
{
	public static function before()
	{
		
	}
	
	public static function index()
	{
		echo string::translit('привет123');
	}
	
	public static function after()
	{
		
	}
}