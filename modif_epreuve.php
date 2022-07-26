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
	$re= $cn->prepare('SELECT * from epreuve where NumEpreuve = ?');
$re1= $cn->query('SELECT CodeMat from matiere');
$re->execute(array($_POST['NumE']));
while($data = $re->fetch())
{
   $num=$data['NumEpreuve'];
   $code =$data['CodeMat'];
   $date =$data['Date_Epreuve'];
   $lieu =$data['Lieu'];
}
}

if (isset($_GET['NumEpreuve']))
 {
	$re= $cn->prepare('SELECT * from epreuve where NumEpreuve = ?');
$re1= $cn->query('SELECT CodeMat from matiere');
$re->execute(array($_GET['NumEpreuve']));
while($data = $re->fetch())
{
   $num=$data['NumEpreuve'];
   $code =$data['CodeMat'];
   $date =$data['Date_Epreuve'];
   $lieu =$data['Lieu'];
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier Epreuve</title>
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
		<form method="POST" action="post_modif_epreuve.php">	
			<div class="form-group">
					<label name="num">Ancien Numepreuve :</label>
					<select class="form-control" name="num">
					
					<option><?php echo $num; ?></option>
						 
					</select>
				</div>
				<div class="form-group">
					<label name="numE">Num Epreuve :</label>
					<input type="text" name="numE" class="form-control" value="<?php echo $num ;?>">
				</div>
			<div class="form-group">
					<label name="code">Code matière :</label>
					<select class="form-control" name="code">
						<?php
						while ($dat=$re1->fetch()) 
						{ if($code == $dat['CodeMat'])
							{
								echo "<option selected=\"selected\">".$dat['CodeMat']."</option>";
							}
							else
								echo "<option>".$dat['CodeMat']."</option>";
						}
						  ?>
						 
					</select>
				</div>
				<div class="form-group">
					<label name="date" >Date :</label>
					<input type="text" name="date"  class="form-control" value="<?php echo $date ;?>">
				</div>
				<div class="form-group">
					<label name="lieu">Lieu :</label>
					<input type="text" name="lieu"  class="form-control" value="<?php echo $lieu ;?>">
				</div>
				<button class="btn btn-success" name="modif">Modifier</button>
			</form>
		</div>
	</div>
</body>
</html>
