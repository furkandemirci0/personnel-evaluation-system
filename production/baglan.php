<?php 

try {
	$db=new PDO("mysql:host=localhost;dbname=personeldegerlendirmedb;charset=utf8",'root','root');
	//echo "Başarılı";
} catch (Exception $e) {
	echo $e->getMessage();
}

?>