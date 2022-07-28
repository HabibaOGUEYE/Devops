<!DOCTYPE html>
<html>
<head>
	<title>Liste des etudiants</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
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
$list = $cn->query('SELECT NumEtud,Nom,Prenom from etudiant');
 $info = $list->fetchAll();
echo "<table class = \"table table-bordered table-striped table-condensed\">
<caption><h2>Liste des etudiants</h2></caption>
		<tr>
			<th>Matricule</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Action</th>
		</tr>";
 foreach ($info as $value)
  {
 	echo "<tr>" . "<td>" . $value['NumEtud'] . "</td>";
 	 	echo "<td> " . $value['Nom'] . "</td>";
 	 	echo "<td> " . $value['Prenom'] . "</td>";
 	 	echo "<td>" . "<a href=\"vue.php?NumEtud=".$value['NumEtud']."\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-eye-open\"></span> Voir plus</a>" ."   ". "<a href=\"Modifier.php?NumEtud=".$value['NumEtud']."\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-edit\"></span> Modifier</a>". "  ". "<a href=\"confirm.php?NumEtud=".$value['NumEtud']."\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span> Supprimer</a>". "</td>";

 }
}
$list->closecursor();

?>

<a href="index.html" class="btn btn-primary">Accueil</a>
</body>

</html>