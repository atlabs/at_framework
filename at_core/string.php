<?php
class String
{
	public static function translit($str) 
	{
		$tr = array(
			"�"=>"a","�"=>"b","�"=>"v","�"=>"g",
			"�"=>"d","�"=>"e","�"=>"j","�"=>"z","�"=>"i",
	        "�"=>"y","�"=>"k","�"=>"l","�"=>"m","�"=>"n",
	        "�"=>"o","�"=>"p","�"=>"r","�"=>"s","�"=>"t",
	        "�"=>"u","�"=>"f","�"=>"h","�"=>"ts","�"=>"ch",
	        "�"=>"sh","�"=>"sch","�"=>"","�"=>"yi","�"=>"",
	        "�"=>"e","�"=>"yu","�"=>"ya","�"=>"a","�"=>"b",
	        "�"=>"v","�"=>"g","�"=>"d","�"=>"e","�"=>"j",
	        "�"=>"z","�"=>"i","�"=>"y","�"=>"k","�"=>"l",
	        "�"=>"m","�"=>"n","�"=>"o","�"=>"p","�"=>"r",
	        "�"=>"s","�"=>"t","�"=>"u","�"=>"f","�"=>"h",
	        "�"=>"ts","�"=>"ch","�"=>"sh","�"=>"sch","�"=>"y",
	        "�"=>"yi","�"=>"","�"=>"e","�"=>"yu","�"=>"ya", 
	        " "=> "_", "."=> "", "/"=> "_"
	    );
	    
	    $complete = strtr(trim($str), $tr);
	    
		if (preg_match('/[^A-Za-z0-9_\-]/', $complete))
		    $complete = preg_replace('/[^A-Za-z0-9_\-]/', '', $complete);
	    
	    return $complete;
	}
}
?>