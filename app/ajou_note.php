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

$req1 = $cn->query('SELECT NumEtud from etudiant');
$req2 = $cn->query('SELECT NumEpreuve from epreuve');

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter notes</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Ajouter note</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="ajou_note.php">	
<div class="form-group">
					<label name="matricule">Matricule :</label>
					<select class="form-control" name="matri">
						<?php
						while ($data=$req1->fetch()) 
						{
							?><option><?php echo $data['NumEtud']; ?></option>
						<?php
					}
						  ?>
						 
					</select>
				</div>
				<div class="form-group">
					<label name="epreuve">Num Epreuve :</label>
					<select class="form-control" name="epreuve">
						<?php
						while ($data=$req2->fetch()) 
						{
							?><option><?php echo $data['NumEpreuve']; ?></option>
						<?php
					}
						  ?>
						 
					</select>
				</div>
					<div class="form-group">
					<label name="note" >Note :</label>
					<input type="text" name="note" maxlength="2" class="form-control">
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
		if (!empty($_POST['matri']))
		 {
			if(!empty($_POST['epreuve']))
			{
				if (!empty($_POST['note']))
				 {
					$ins = $cn->prepare('INSERT INTO note(NumEtud,NumEpreuve,note) VALUES (?,?,?)');
					$ins->execute(array($_POST['matri'],$_POST['epreuve'],$_POST['note']));
					header('Location:index.html');	
				} else 
				echo "<script>
	alert('Le champs note est vide veuillez renseigner');
</script>";
			} else 
			echo "<script>
	alert('Le champs Num Epreuve est vide veuillez renseigner');
</script>";
		}else
		echo "<script>
	alert('Le champs rue est vide veuillez renseigner');
</script>";
	}

?>