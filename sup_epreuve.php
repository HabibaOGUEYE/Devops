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
			<h1 class="text-center">Supprimer matière</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		<form method="POST" action="post_sup_epreuve.php">	
			<div class="form-group">
					<label name="code">Num epreuve :</label>
					<input type="text" name="numE" class="form-control">
				</div>
			
				<button class="btn btn-danger" name="send">Supprimer</button>
			</form>
		</div>
	</div>
</body>
</html>