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
$re= $cn->query('SELECT NumEpreuve from note where NumEtud = ' .$_POST['num']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier note</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Modification de la note</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="modif_note.php">	
			<div class="form-group">
					<label name="numE">Num Epreuve :</label>
					<select class="form-control" name="numE">
						<?php
						while ($data=$re->fetch()) 
						{
							?><option><?php echo $data['NumEpreuve']; ?></option>
						<?php
					}
						  ?>
						 
					</select>
				</div>
				<input type="text" name="matri" hidden="" value="<?php echo $_POST['num']; ?>">
				<button class="btn btn-success" name="send">Chercher</button>
			</form>
		</div>
	</div>
</body>
</html>