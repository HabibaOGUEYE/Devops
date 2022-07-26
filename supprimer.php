<!DOCTYPE html>
<html>
<head>
	<title>Supprimer etudiant</title>
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Supprimer des éudiants</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="confirm.php">	
			<div class="form-group">
					<label name="matricule">Matricule :</label>
					<input type="text" name="matricule" class="form-control">
				</div>
			
				<button class="btn btn-danger" name="send">Supprimer</button>
			</form>
		</div>
	</div>
</body>
</html>