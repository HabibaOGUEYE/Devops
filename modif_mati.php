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
	$re= $cn->prepare('SELECT * from matiere where CodeMat = ?');
$re->execute(array($_POST['code']));
while($data = $re->fetch())
{
   $code=$data['CodeMat'];
   $lib =$data['Libelle'];
   $coef =$data['Coef'];
}
}

if (isset($_GET['CodeMat']))

 {
	$re= $cn->prepare('SELECT * from matiere where CodeMat = ?');
$re->execute(array($_GET['CodeMat']));
while($data = $re->fetch())
{
   $code=$data['CodeMat'];
   $lib =$data['Libelle'];
   $coef =$data['Coef'];
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier matière</title>
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
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="post_modif_mati.php">	
			<div class="form-group">
					<label name="matricule">Ancien Code :</label>
					<select class="form-control" name="cod">
					
					<option><?php echo $code ; ?></option>
						 
					</select>
				</div>
			<div class="form-group">
					<label name="code">Code matière :</label>
					<input type="text" name="code" maxlength="50" class="form-control" value="<?php echo $code ;?>">
				</div>
				<div class="form-group">
					<label name="nom" >Libelle :</label>
					<input type="text" name="lib" maxlength="50" class="form-control" value="<?php echo $lib ;?>">
				</div>
				<div class="form-group">
					<label name="coef">Coefficient :</label>
					<input type="text" name="coef" maxlength="1" class="form-control" value="<?php echo $coef ;?>">
				</div>
				<button class="btn btn-success" name="modif">Modifier</button>
			</form>
		</div>
	</div>
</body>
</html>
