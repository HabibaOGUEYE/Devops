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
	$code=$_POST['code'];
	$re = $cn->prepare('SELECT Libelle from matiere where CodeMat = :code');
	$re->bindvalue(':code',$code);
	$re->execute();
}
if (isset($_GET['CodeMat'])) 
{
		$code=$_GET['CodeMat'];
	$re = $cn->prepare('SELECT Libelle from matiere where CodeMat = :code');
	$re->bindvalue(':code',$code);
	$re->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Supprimer Matière</title>
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
	<p>Vous voulez supprimer la matière
 <?php 
 while ($info = $re->fetch())
  {
 	echo '<h1>'. $info['Libelle'] .'</h1>';
 }
  ?>

</p>
		</div>
		<div class="row col-md-12">
			<form method="POST" action="valid_sup_mati.php" class="col-md-offset-4">
				<button class="btn btn-success col-md-2" name="oui">Oui</button>
				<button class="btn btn-danger col-md-offset-1 col-md-2" name="non">Non</button>
				<input type="text" name="code" hidden="true" value="<?php echo $code ;?>">
			</form>
		</div>
	</div>
</body>
</html>	
<?php 

 ?>