<html>
<head>
</head>
<body>
	<h1>We offer you these for free!</h1>
	<img src=""/>
	<p>
		<?php
			//echo phpinfo();
			require_once "./core_inc.php";

			$ctl = new test_controller;
			$n = $ctl->booknum();
			if($n>0)
			{
				echo "There are $n books left";
			}
			else {
				echo "There are no books left";
			}
		?>
	</p>

		<input type="button" id="b1" onclick="location.href='rushpurchase.php'"
value="点击抢购" /> 

</body>
</html>
