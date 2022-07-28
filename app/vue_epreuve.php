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

if (isset($_GET['NumEpreuve']))
 {
	$re = $cn->query('SELECT * from epreuve where NumEpreuve = ' .$_GET['NumEpreuve']);
	$data = $re->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Info Epreuve</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Info epreuve</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="epreuve.php" class="well">	
			<div class="form-group">
					<label name="matricule">Num Epreuve :</label>
					 <?php  echo $data['NumEpreuve'] ; ?>
					</div>
				<div class="form-group">
					<label name="nom" >Code Matière :</label>
					 <?php  echo $data['CodeMat'] ; ?>
				</div>
				<div class="form-group">
					<label name="prenom">Date :</label>
					 <?php  echo $data['Date_Epreuve'] ; ?>
				</div>
			
				<div class="form-group">
					<label name="date">Lieu:</label>
					<?php  echo $data['Lieu'] ; ?>
				</div>
				<button class="btn btn-success" name="send">Retour</button>
			</form>
		</div>
	</div>
</body>
</html>