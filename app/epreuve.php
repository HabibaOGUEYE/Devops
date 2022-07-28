<!DOCTYPE html>
<html>
<head>
	<title>Liste des epreuves</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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

{
$list = $cn->query('SELECT NumEpreuve,CodeMat from epreuve');
 $info = $list->fetchAll();
echo "<table class = \"table table-bordered table-striped table-condensed\">
<caption><h2>Liste des epreuves</h2></caption>
		<tr>
			<th>Num Epreuve</th>
			<th>Code Matière</th>
			<th>Action</th>
		</tr>";
 foreach ($info as $value)
  {
 	echo "<tr>" . "<td>" . $value['NumEpreuve'] . "</td>";
 	 	echo "<td> " . $value['CodeMat'] . "</td>";
 	 	/*echo "<td> " . $value['Prenom'] . "</td>";*/
 	 	echo "<td>" . "<a href=\"vue_epreuve.php?NumEpreuve=".$value['NumEpreuve']."\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-eye-open\"></span> Voir plus</a>" ."   ". "<a href=\"modif_epreuve.php?NumEpreuve=".$value['NumEpreuve']."\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-edit\"></span> Modifier</a>". "  ". "<a href=\"post_sup_epreuve.php?NumEpreuve=".$value['NumEpreuve']."\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span> Supprimer</a>". "</td>";

 }
}
$list->closecursor();

?>
<a href="index.html" class="btn btn-primary">Accueil</a>
</body>

</html>