<?php

class test
{
	private static $lock = NULL;

	static public function &checklock($fpoint)
	{
		//$fpoint = fopen("./lock.txt","w+");
		return filelock::write($fpoint);
		//USE LOCK_EX|LOCK_NB so it will not be blocked.
	}
 	
//	static public function dolock()
//	{
//	}

	static public function subtractBooknum($value = 1){
		//TODO: new mysqli() or PDO,use OO operate
		//PHP 5.5<=
		/*
		$user = 'root';
		$password = 'root';
		$db = 'test';
		$host = '127.0.0.1';
		$port = 8889;
		$link = mysqli_connect(
			"$host:$port", 
			$user, 
			$password
			);
		mysqli_select_db($db);
		
		$result = mysqli_query($link,"UPDATE test.goods set stock_num = stock_num - 1 where name = 'book' ");
		mysqli_close($link);
		return true;
		*/

		//PHP 5.6>
		$user = 'root';
		$password = 'root';
		$db = 'test';
		$host = '127.0.0.1';
		$port = 8889;
		
		$link = mysqli_init();
		$success = mysqli_real_connect(
		$link, 
		$host, 
		$user, 
		$password, 
		$db,
		$port
		);

		$result = mysqli_query($link,"UPDATE test.goods set stock_num = stock_num - 1 where name = 'book' ");
		mysqli_close($link);
		return true;

	}

	static public function getStocknum()
	{
		//TODO: new mysqli() or PDO,use OO operate
		//PHP 5.5<=
		/*
		$user = 'root';
		$password = 'root';
		$db = 'test';
		$host = '127.0.0.1';
		$port = 8889;
		$link = mysqli_connect(
			"$host:$port", 
			$user, 
			$password
			);
		mysqli_select_db($db);

		$result = mysqli_query($link,"SELECT * FROM goods where name='book'");
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		mysqli_close($link);
		return $row;
		*/

		//PHP 5.6>
		$user = 'root';
		$password = 'root';
		$db = 'test';
		$host = '127.0.0.1';
		$port = 8889;
		
		$link = mysqli_init();
		$success = mysqli_real_connect(
		$link, 
		$host, 
		$user, 
		$password, 
		$db,
		$port
		);
		$result = mysqli_query($link,"SELECT * FROM goods where name='book'");
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		mysqli_close($link);
		return $row;
	}

	static public function getConnnectionsnum()
	{
		//TODO:cause apache/nginx only gives all connections but not just from 'this' url, it can be improved if get users' connnections from the same urls。Or set different port when access qianggou.
		//ps -ef | grep nginx | wc -l --shows the connection of server
		$cmd = "ps -ef | grep httpd | wc -l";
		$connections = (int)shell_exec ($cmd);
		return $connections;
	}

}
	//----

?>