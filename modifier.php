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
$re= $cn->query('SELECT * from etudiant where NumEtud = ' .$_POST['mati']);
while($data = $re->fetch())
{
   $num=$data['NumEtud'];
   $nom =$data['Nom'];
   $prenom =$data['Prenom'];
   $date_nai = $data['Date_de_naissance'];
   $cp = $data['Cp'];
   $ville = $data['Ville'];
   $rue = $data['Rue'];
}	
}

if (isset($_GET['NumEtud']))
{
$re= $cn->query('SELECT * from etudiant where NumEtud = ' .$_GET['NumEtud']);
while($data = $re->fetch())
{
   $num=$data['NumEtud'];
   $nom =$data['Nom'];
   $prenom =$data['Prenom'];
   $date_nai = $data['Date_de_naissance'];
   $cp = $data['Cp'];
   $ville = $data['Ville'];
   $rue = $data['Rue'];
}

}


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
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="postmodif.php">	
			<div class="form-group">
					<label name="matricule">Ancien matricule :</label>
					<select class="form-control" name="mati">
					
					<option><?php echo $num ; ?></option>
						 
					</select>
				</div>
			<div class="form-group">
					<label name="matri">Matricule :</label>
					<input type="text" name="matri" maxlength="50" class="form-control" value="<?php echo $num ;?>">
				</div>
				<div class="form-group">
					<label name="nom" >Nom :</label>
					<input type="text" name="nom" maxlength="50" class="form-control" value="<?php echo $nom ;?>">
				</div>
				<div class="form-group">
					<label name="prenom">Prenom :</label>
					<input type="text" name="prenom" maxlength="50" class="form-control" value="<?php echo $prenom ;?>">
				</div>
			
				<div class="form-group">
					<label name="date">Date de naissance :</label>
					<input type="date" name="date" class="form-control" value="<?php echo $date_nai ;?>">
				</div>
				<div class="form-group">
					<label name="ville">Ville :</label>
					<input type="text" name="ville" maxlength="50" class="form-control" value="<?php echo $ville ;?>">
				</div>
				<div class="form-group">
					<label name="cp">CP :</label>
					<input type="text" name="cp" class="form-control" value="<?php echo $cp ;?>">
				</div>
				<div class="form-group">
					<label name="rue">Rue :</label>
					<input type="text" name="rue" class="form-control" value="<?php echo $rue ;?>">
				</div>
				<button class="btn btn-success" name="modif">Modifier</button>
			</form>
		</div>
	</div>
</body>
</html>
