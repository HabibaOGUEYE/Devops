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

if (isset($_POST['sup']))
{
$sup = $cn->prepare('DELETE from note where NumEtud = ? AND NumEpreuve = ? AND note = ?');
$sup->execute(array($_POST['matri'] , $_POST['NumE'], $_POST['note']));
header('Location:index.html');	
}

?>
