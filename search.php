<?php
$host = 'localhost'; 
$dbname = 'web_project'; 
$username = 'your_username'; 
$password = 'your_password'; 

try {
  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  echo "Connected to database";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
