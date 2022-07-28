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
			<h1 class="text-center">Ajout matière</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="ajou_mat.php">	
			<div class="form-group">
					<label name="matricule">Code matière :</label>
					<input type="text" name="code" class="form-control">
				</div>
				<div class="form-group">
					<label name="nom" >Libelle :</label>
					<input type="text" name="lib" maxlength="50" class="form-control">
				</div>
				<div class="form-group">
					<label name="prenom">Coefficient :</label>
					<input type="text" name="coef" maxlength="1" class="form-control">
				</div>
				<button class="btn btn-success" name="send">Ajouter</button>
			</form>
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
	if (!empty($_POST['code']))
	 {
	 	if (!empty($_POST['lib']))
	 {
if (!empty($_POST['coef']))
	 {
	 	$ajou = $cn->prepare('INSERT into matiere(CodeMat,Libelle,Coef) VALUES(?,?,?)');
								$ajou->execute(array($_POST['code'],$_POST['lib'],$_POST['coef']));
								header('Location:index.html');	
	 } 
	 else
echo "case vide";
	 } 
	 else
echo "case vide";
	 }
	 else echo "Case vide";
	
		
		
}
 ?>