<?php
	//if (isset($_SERVER['HTTP_REFERER']) && (preg_match('/(.*)apicodes.com(.*)/', $_SERVER['HTTP_REFERER'])))
	//{
		include_once 'library.php';
		if (isset($_GET['data'])) 
		{
			if(!empty($_GET['data']))
			{
				$data = trim(decode($_GET['data']));
				header('Location:' . $data);
			} else echo 'Error Empty!';
		} else echo 'Error Isset!';
	//}
	//else echo 'Nothing to do here!';
?>
