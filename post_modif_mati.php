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
if(isset($_POST['modif']))
{
	if (!empty($_POST['code']))
	 {
		if (!empty($_POST['lib']))
	 {
		if (!empty($_POST['coef']))
	 {
			
							$up = $cn->prepare('UPDATE matiere set CodeMat = ? , Libelle = ? , Coef = ? where CodeMat = ?' );
							$up->execute(array($_POST['code'],$_POST['lib'],$_POST['coef'],$_POST['cod']));
							header('Location:index.html');
	}
	 else
	echo "Une case vide";
	} else
	echo "Une case vide";
	} else
	echo "Une case vide";
}

?>