<!DOCTYPE html>
<html>
<head>
	<title>Ajouter etudiants</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Ajout des éudiants</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">Ajout étudiant</div>
				<div class="panel-body">
		<form method="POST" action="ajouter.php" class="well">	
			<div class="form-group">
					<label name="matricule" for="matricule">Matricule :</label>
					<input type="text" name="matricule" id="matricule" class="form-control">
				</div>
				<div class="form-group">
					<label name="nom" >Nom :</label>
					<input type="text" name="nom" maxlength="50" class="form-control">
				</div>
				<div class="form-group">
					<label name="prenom">Prenom :</label>
					<input type="text" name="prenom" maxlength="50" class="form-control">
				</div>
			
				<div class="form-group">
					<label name="date">Date de naissance :</label>
					<input type="date" name="date" class="form-control">
				</div>
				<div class="form-group">
					<label name="ville">Ville :</label>
					<input type="text" name="ville" maxlength="50" class="form-control" >
				</div>
				<div class="form-group">
					<label name="cp">CP :</label>
					<input type="text" name="cp" class="form-control">
				</div>
				<div class="form-group">
					<label name="rue">Rue :</label>
					<input type="text" name="rue" class="form-control">
				</div>
				<button class="btn btn-success" name="send">Ajouter</button>
			</form>
		</div>
	</div>
		</div>
	</div>
</body>
</html>
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
	if (!empty($_POST['matricule']))
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
								$req = $cn->query('SELECT NumEtud from etudiant where NumEtud =' .$_POST['matricule']);
								$num = $req->fetch();
								if ($num == false)
								 {
									$ajou = $cn->prepare('INSERT into etudiant(NumEtud,Nom,Prenom,Date_de_naissance,Rue,Cp,Ville) VALUES(?,?,?,?,?,?,?)');
								$ajou->execute(array($_POST['matricule'],$_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['rue'],$_POST['cp'],$_POST['ville']));
								echo "<script>
	alert('Ajout reuissi !');
</script>";
	header('Location:index.html');	
								}else echo "<script>
	alert('Le matricule est deja pris');
</script>";
							

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