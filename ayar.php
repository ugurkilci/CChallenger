<?php

	try{
		$vt = new PDO("mysql:host=localhost;dbname=0cc;charset=utf8;","root","");
	}catch(PDOExeption $ugur){
		echo $ugur->getMessage();
	}

?>