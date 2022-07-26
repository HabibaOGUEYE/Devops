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
	<title>Ajouter epreuve</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Ajout Epreuve</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="ajou_epreuve.php">	
			<div class="form-group">
					<label name="nume" >Num Epreuve :</label>
					<input type="text" name="nume" maxlength="5" class="form-control">
				</div>
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
				
				<div class="form-group">
					<label name="date">Date :</label>
					<input type="date" name="date"  class="form-control">
				</div>
				<div class="form-group">
					<label name="lieu" >Lieu :</label>
					<input type="text" name="lieu" class="form-control">
				</div>
				<button class="btn btn-success" name="send">Ajouter</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php 
if (isset($_POST['send']))
 {
	if (!empty($_POST['nume']))
	 {
	 	if (!empty($_POST['code']))
	 {
if (!empty($_POST['date']))
	 {
	 	if (!empty($_POST['lieu'])) 
	 	{
	 			$ajou = $cn->prepare('INSERT into epreuve(NumEpreuve,CodeMat,Date_Epreuve,Lieu) VALUES(?,?,?,?)');
								$ajou->execute(array($_POST['nume'],$_POST['code'],$_POST['date'],$_POST['lieu']));
								header('Location:index.html');
	 	}
	 } 
	 else
echo "case vide";
	 } 
	 else
echo "case vide";
	 }
	 else echo "Case vide";
	
}
