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
	if (!empty($_POST['numE']))
	 {
		if (!empty($_POST['code']))
	 {
		if (!empty($_POST['date']))
	 {
			if (!empty($_POST['lieu']))
	 {
			
							$up = $cn->prepare('UPDATE epreuve set NumEpreuve = ? , CodeMat = ? , Date_Epreuve = ? , Lieu = ? where NumEpreuve = ?' );
							$up->execute(array($_POST['numE'],$_POST['code'],$_POST['date'],$_POST['lieu'] ,$_POST['num']));
							header('Location:index.html');
	}
	 else
	echo "Une case vide";	
	}
	 else
	echo "Une case vide";
	} else
	echo "Une case vide";
	} else
	echo "Une case vide";
}

?>
