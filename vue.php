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

if (isset($_GET['NumEtud']))
 {
	$re = $cn->query('SELECT * from etudiant where NumEtud = ' .$_GET['NumEtud']);
	$data = $re->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Info etudiant</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Info éudiant</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="etudiant.php" class="well">	
			<div class="form-group">
					<label name="matricule">Matricule :</label>
					 <?php  echo $data['NumEtud'] ; ?>
					</div>
				<div class="form-group">
					<label name="nom" >Nom :</label>
					 <?php  echo $data['Nom'] ; ?>
				</div>
				<div class="form-group">
					<label name="prenom">Prenom :</label>
					 <?php  echo $data['Prenom'] ; ?>
				</div>
			
				<div class="form-group">
					<label name="date">Date de naissance :</label>
					<?php  echo $data['Date_de_naissance'] ; ?>
				</div>
				<div class="form-group">
					<label name="ville">Ville :</label>
				<?php  echo $data['Ville'] ; ?>
				</div>
				<div class="form-group">
					<label name="cp">CP :</label>
					<?php  echo $data['Cp'] ; ?>
				</div>
				<div class="form-group">
					<label name="rue">Rue :</label>
					<?php  echo $data['Ville'] ; ?>
				</div>
				<button class="btn btn-success" name="send">Retour</button>
			</form>
		</div>
	</div>
</body>
</html>