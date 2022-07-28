<!DOCTYPE html>
<html>
<head>
	<title>Etudiant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="container">
<?php
/*TP fait par Chaibou Yahaya Illiassou étudiant en L3GL
Certaines syntaxe du programme ci-dessous peuvent être très differentes de celles donné par le professeur
pour mieux optimiser l'affichage des tableau dans ce TP , nous utiliserons le framework bootstrap 
*/



/****************QUESTION 1 ****************************/
//On inclu le fichier contenant les informations de connexion
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


/************QUESTION 2 ********************************/
if (isset($_POST['mati']))
 {
	{
$mati = $cn->query('SELECT * from matiere');
 $info = $mati->fetchAll();
 	echo "<a href=\"index.html\" class=\"btn btn-primary\">Accueil</a>";
echo "<table class = \"table table-bordered table-striped table-condensed\">
<caption><h2>Liste des matière</h2></caption>
		<tr>
			<th>Libelle</th>
			<th>Code matière</th>
			<th>Coefficient</th>
			<th>Action</th>
		</tr>";
 foreach ($info as $value)
  {
 	echo "<tr>" . "<td>" . $value['Libelle'] . "</td>";
 	 	echo "<td> " . $value['CodeMat'] . "</td>";
 	 	echo "<td> " . $value['Coef'] . "</td>";
 	 		echo "<td>"."  "."<a href=\"modif_mati.php?CodeMat=".$value['CodeMat']."\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-edit\"></span> Modifier</a>". "  ". "<a href=\"post_sup_mati.php?CodeMat=".$value['CodeMat']."\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span> Supprimer</a>". "</td>";


 }
}
$mati->closecursor();
} else




/**********************QUESTION 3************************** */
//On récupère toutes les notes de l'etudiant avec notre requete
if(isset($_POST['not']))
{

{
$note = $cn->query('SELECT * From note');
echo "<table class = \"table table-bordered table-striped\">
<br><br>
<caption><h2>Liste des notes</h2></caption>
  	<tr>
  		<th>Nom</th>
  		<th>Note</th>
  		<th>Libelle</th>
  	</tr>";
  	// On parcours toutes les note à travers notre fetch
while ($not = $note->fetch())
 {
//Dans notre boucle pour récuperer les autres informations tels que le nom
//de l'etudiant et le libellé de la matière  on doit recuperer des données dans
//d'autres tables comme etudiant , epreuve et enfin matière
//On fait donc des requettes pour chaque ocuurence

//recupération du nom de l'etudiant
 	$num = $not['NumEtud'];
 	$nom = $cn->prepare('SELECT Nom from etudiant where NumEtud = :num');
 	$nom->bindvalue(':num' , $num);
 	$nom->execute();
	$name = $nom->fetch();
	$nom->closecursor();

 	///recuperation du code de la matière qui nous permettre d'aller dans la table matiere et prendre le libellé
 	
 	$NumEpreuve = $not['NumEpreuve'];
	$codedematiere=$cn->prepare('SELECT CodeMat from epreuve where NumEpreuve = :num');
	$codedematiere->bindvalue(':num' , $NumEpreuve);
	$codedematiere->execute();
	$codemat = $codedematiere->fetch();
	$cod = $codemat['CodeMat'];
	$codedematiere->closecursor();
 	
 	// requette pour le libelle de la matiere
 	$libelle = $cn->prepare('SELECT Libelle from matiere where CodeMat = :cod');
 	$libelle->bindvalue(':cod' , $cod);
 	$libelle->execute();
 	$libel = $libelle->fetch();
 	$libelle->closecursor();
 	$lib = $libel['Libelle'];
	echo "
  	<tr> 
  		<td> ". $name['Nom'] ."</td>" . "<td> " .$not['note'] ."</td>" ."<td>" . $lib ."</td>";
}
echo "</tr></table>";
}$libelle->closecursor();
$codedematiere->closecursor();
$nom->closecursor();
$note->closecursor();
}else









/*************QUESTION  4 **********************/
if(isset($_POST['moyy']))
{
		echo "<a href=\"index.html\" class=\"btn btn-primary\">Accueil</a>";
	{
	$liste = $cn->query('SELECT * FROM etudiant');
	echo "<table class = \"table table-bordered table-striped table-striped table-condensed\">
	<caption><h2>Moyenne</h2></caption>
	<tr>
		<th>Numéro étudiant</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Moyenne</th>
	</tr><br><br>
";
	while ($req = $liste->fetch()) 
 {
	$num = $req['NumEtud'];
	//verifier si la note de l'etudiant existe et afficher la moyenne
	$nbr = $cn->query('SELECT COUNT(note) as nbr from note where NumEtud = \''. $num .'\'');
	$nombre = $nbr->fetch();
	if ($nombre['nbr'] != 0)
	 {
	$li = $cn->query('SELECT NumEtud , AVG(note)as note from note where NumEtud = \''.$num.' \'');
	
	while ($list = $li->fetch())
	 {
	 	echo "<tr>";
		echo "<td>" . $list['NumEtud'] . "</td>";
		echo "<td>" . $req['Nom'] . "</td>";
		echo "<td>" . $req['Prenom'] . "</td>";
		echo "<td>" . $list['note'] . "</td>";
		
		$li->closecursor();
	}
	}
}
echo "</tr></table>";
} 
$liste->closecursor();
$nbr->closecursor();
} else










/**************************Question 5**********************/
if (isset($_POST['q5']))
 	{
{
		$n=32000;
	$liste = $cn->query('SELECT * FROM etudiant where NumEtud = \''.$n.'\'');
	echo "<table class = \"table table-bordered table-striped table-striped table-condensed\">
	<caption><h2>Moyenne</h2></caption>
	<tr>
		<th>Numéro étudiant</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Moyenne</th>
	</tr><br><br>
";
	while ($req = $liste->fetch()) 
 {
	$num = $req['NumEtud'];
	//verifier si la note de l'etudiant existe et afficher la moyenne
	$nbr = $cn->query('SELECT COUNT(note) as nbr from note where NumEtud = \''. $num .'\'');
	$nombre = $nbr->fetch();
	if ($nombre['nbr'] != 0)
	 {
	$li = $cn->query('SELECT NumEtud , AVG(note)as note from note where NumEtud = \''.$num.' \'');
	
	while ($list = $li->fetch())
	 {
	 	echo "<tr>";
		echo "<td>" . $list['NumEtud'] . "</td>";
		echo "<td>" . $req['Nom'] . "</td>";
		echo "<td>" . $req['Prenom'] . "</td>";
		echo "<td>" . $list['note'] . "</td>";
		
		$li->closecursor();
	}
	}
}
echo "</tr></table>";
} 
	$liste->closecursor();
	$nbr->closecursor();
	}else








	/***************Question 6 *************************/
	if(isset($_GET['num']))
	{
		{
		
	$liste = $cn->prepare('SELECT * FROM etudiant where NumEtud = ?');
	$liste->execute(array($_GET['nummm']));
	echo "<table class = \"table table-bordered table-striped table-striped table-condensed\">
	<caption><h2>Moyenne</h2></caption>
	<tr>
		<th>Numéro étudiant</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Moyenne</th>
	</tr><br><br>
";
	while ($req = $liste->fetch()) 
 {
	$num = $req['NumEtud'];
	//verifier si la note de l'etudiant existe et afficher la moyenne
	$nbr = $cn->query('SELECT COUNT(note) as nbr from note where NumEtud = \''. $num .'\'');
	$nombre = $nbr->fetch();
	if ($nombre['nbr'] != 0)
	 {
	$li = $cn->query('SELECT NumEtud , AVG(note)as note from note where NumEtud = \''.$num.' \'');
	
	while ($list = $li->fetch())
	 {
	 	echo "<tr>";
		echo "<td>" . $list['NumEtud'] . "</td>";
		echo "<td>" . $req['Nom'] . "</td>";
		echo "<td>" . $req['Prenom'] . "</td>";
		echo "<td>" . $list['note'] . "</td>";
		
		$li->closecursor();
	}
	}
}
echo "</tr></table>";
} 	

	}
  ?>	
</body>
</html>