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
if (isset($_POST['oui']))
 {
$sup = $cn->prepare('DELETE from matiere where CodeMat = ?');
$sup->execute(array($_POST['code']));
header('Location:index.html');
}
if (isset($_POST['non']))
 {
	header('Location:index.php');
}
 ?>