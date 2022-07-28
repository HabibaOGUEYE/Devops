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
 	if (!empty($_POST['matri']))
 	 {
 		if (!empty($_POST['numE']))
 		 {
 		$matri = $_POST['matri'] ;
 		$numE = $_POST['numE'] ;
 		$re = $cn->prepare('SELECT note from note where NumEtud = ? AND NumEpreuve = ?');
 		$re->execute(array($matri,$numE));
 		}
 	}
 }
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">

		<form method="POST" action="sup_note.php">	
			<div class="form-group">
					<label name="note">Note :</label>
					<select class="form-control" name="note">
						<?php
						while ($data=$re->fetch()) 
						{
							?><option><?php echo $data['note']; ?></option>
						<?php
					}
						  ?>
						 
					</select>
				</div>
				<input type="text" name="matri" hidden="" value="<?php echo $matri; ?>">
				<input type="text" name="NumE" hidden="" value="<?php echo $numE; ?>">
				<button class="btn btn-danger" name="sup">Supprimer</button>
			</form>
</body>
</html>
<?php

if (isset($_POST['sup']))
{
$sup = $cn->prepare('DELETE from note NumEtud = ? AND NumEpreuve = ? AND note = ?');
$sup->execute(array($_POST['matri'] , $_POST['NumE'], $_POST['note']));
header('Location:index.html');	
}

?>