<?php
include 'connect.inc';
try 
{
	$cn = new PDO('mysql: host = $host ; dbname = $dbname ', $user , $password);
	echo "succes";
} 
catch (Exception $e)
 {
die("Erreur :".$e->getMessage());	
 } 
  ?>