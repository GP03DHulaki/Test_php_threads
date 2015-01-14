<?php
	class test_controller
	{

		public function rushpurchase(){
			//$leftarray = test::getStocknum();
			$leftnum = $this->booknum();
			if ($leftnum <= 0)
				{return false;}
			else
			{
				$connum = test::getConnnectionsnum();
				if ($connum < $leftnum)
				{
					test::subtractBooknum();
					return true;
				}
				else{
					$fpoint = fopen("./lock.txt","w+");
					$getaccess = false;
					$trytimes = 3;
					while ($timeout>0 && $getaccess =false){
						$filelock = &test::checklock($fpoint);
						if ($filelock)
							{
								$getaccess = true;
								test::subtractBooknum();
							}
						$trytimes = $trytimes -1;
					}
					unset($filelock);
					fclose($fpoint);
				}
				return $getaccess;
			}
		}

		public function booknum()
		{
			$i = test::getStocknum();
			$res = (int)$i['stock_num'];
			return $res;
		}

	}
?>