<?php
	$host = 'localhost';
		$dbname ='web_project';
		$login = 'root';
		$pass = '' ;

	try{
			$bdd = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
			} catch(PDOException $e) {
				die ($e->getMessage()); 
			}