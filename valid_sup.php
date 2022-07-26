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
$sup = $cn->query('DELETE from etudiant where NumEtud = '.$_POST['matri']);
header('Location:etudiant.php');
}
if (isset($_POST['non']))
 {
	header('Location:etudiant.php');
}
 ?>