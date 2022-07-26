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
$matri = $_POST['matri'] ;
$numE = $_POST['numE'] ;
$re= $cn->prepare('SELECT note from note where NumEtud = ? AND NumEpreuve = ?');
$re->execute(array($_POST['matri'],$_POST['numE']));
while($data = $re->fetch())
{ 
   $note =$data['note'];
}
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
		<form method="POST" action="post_modif_note.php">	
			<div class="form-group">
					<label name="note">Note :</label>
					<input type="text" name="note" value="<?php echo $note; ?>" class="form-control" maxlength="2">
				</div>
				<input type="text" name="matri" hidden="" value="<?php echo $matri; ?>">
				<input type="text" name="NumE" hidden="" value="<?php echo $numE; ?>">
				<button class="btn btn-success" name="send">Modifier</button>
			</form>
		</div>
	</div>
</body>
</html>