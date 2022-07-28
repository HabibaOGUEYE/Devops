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


 if (isset($_POST['modif']))
 {
	if (!empty($_POST['matri']))
	 {
	
		if (!empty($_POST['nom']))
		 {
			if(!empty($_POST['prenom']))
			{
				if (!empty($_POST['date']))
				 {
					if(!empty($_POST['ville']))
					{
						if (!empty($_POST['cp'])) 
						{
							if (!empty($_POST['rue'])) 
							{
							$up = $cn->prepare('UPDATE etudiant set NumEtud = ? , Nom = ? , Prenom = ? , Date_de_naissance = ? , Rue = ? , Cp = ? , Ville = ? where NumEtud = ' .$_POST['mati']);
							$up->execute(array($_POST['matri'],$_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['rue'],$_POST['cp'],$_POST['ville']));
							header('Location:index.html');	
							} else
	echo "<script>
	alert('Le champs rue est vide veuillez renseigner');
</script>";
						} else
echo "<script>
	alert('Le champs CP est vide veuillez renseigner');
</script>";
					} else
					echo "<script>
	alert('Le champs ville est vide veuillez renseigner');
</script>";
				}else
				echo "<script>
	alert('Le champs date est vide veuillez renseigner');
</script>";
			}else
			echo "<script>
	alert('Le champs prenom est vide veuillez renseigner');
</script>";
		}else 
		echo "<script>
	alert('Le champs nom est vide veuillez renseigner');
</script>";
	}
		else
		echo "<script>
	alert('Le champs matricule est vide veuillez renseigner');
</script>";
}
 ?>

