<?php
	require_once "./core_inc.php";
	$ctl = new test_controller;
	$res = $ctl->rushpurchase();
	//$URL_pref = 'http://'. $_SERVER[‘HTTP_HOST’]
	$res = true;
	if ($res)
	{	//echo "ok";
		header("Refresh: 0; URL='success.html'");
	}
	else
	{	//echo "fail";
		//header("Refresh: 0; URL='".$URL_pref."index.php'");
	}
	
?>
