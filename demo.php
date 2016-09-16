<?php 

class cls
{
	private static $foo = 'abc';

	function __construct()
	{
		// echo $this::$foo;
		// $this::func();
		// echo static::$foo;
	}

	static function func()
	{
		echo self::$foo;
	}
}

class clsa extends cls
{
	function __construct()
	{
		echo parent::$foo;
	}
}

(new clsa);