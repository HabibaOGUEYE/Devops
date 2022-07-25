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
$re= $cn->query('SELECT CodeMat from matiere');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier etudiants</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Modification</h1>
		</div>
	</div>
	<div class="row">
		<p class="col-md-12">
			Selectionner le matricule de l'etudiant à modifier
		</p>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="modif_mati.php">	
			<div class="form-group">
					<label name="code">Code matière :</label>
					<select class="form-control" name="code">
						<?php
						while ($data=$re->fetch()) 
						{
							?><option><?php echo $data['CodeMat']; ?></option>
						<?php
					}
						  ?>
						 
					</select>
				</div>
				<button class="btn btn-success" name="send">Chercher</button>
			</form>
		</div>
	</div>
</body>
</html>