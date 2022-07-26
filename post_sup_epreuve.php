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
	$num=$_POST['numE'];
	$re = $cn->prepare('SELECT CodeMat from epreuve where NumEpreuve = :code');
	$re->bindvalue(':code',$num);
	$re->execute();
}
if (isset($_GET['NumEpreuve'])) 
{
	$num=$_GET['NumEpreuve'];
	$re = $cn->prepare('SELECT CodeMat from epreuve where NumEpreuve = :code');
	$re->bindvalue(':code',$num);
	$re->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Supprimer Epreuve</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Confirmer suppression</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
	<p>Vous voulez supprimer l'epreuve de
 <?php 
 while ($info = $re->fetch())
  {
 	echo '<h1>'. $info['CodeMat'] .'</h1>';
 }
  ?>

</p>
		</div>
		<div class="row col-md-12">
			<form method="POST" action="valid_sup_epreuve.php" class="col-md-offset-4">
				<button class="btn btn-success col-md-2" name="oui">Oui</button>
				<button class="btn btn-danger col-md-offset-1 col-md-2" name="non">Non</button>
				<input type="text" name="numE" hidden="true" value="<?php echo $num ;?>">
			</form>
		</div>
	</div>
</body>
</html>	
<?php 

 ?>