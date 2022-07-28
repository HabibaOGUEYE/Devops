<?php 
include 'connect.inc';
try
 {
		$cn = new PDO('mysql: host=localhost;dbname=tp', $user , $password);
		$cn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} //Test d'erreur
catch (Exception $e)
 {
die('Erreur' .$e->getMessage());	
}
if (isset($_POST['send']))
 {
	if (!empty($_POST['note']))
	 {
		$up = $cn->prepare('UPDATE note set note = ? where NumEtud = ? AND NumEpreuve = ? ');
		$up->execute(array($_POST['note'] , $_POST['matri'] , $_POST['NumE']));
		header('Location:index.html');
		
	}
}

?>