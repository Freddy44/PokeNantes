<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
			<h1>Bienvenue sur</h1>
			<img src="img/logo.png" alt="logo"/>		
		</header>

		<main>
			<h2>Zone de connexion</h2>
			<form class="" action="traitement.php" method="">
				<div>
					<label for="login">Nom d'utilisateur</label>
					<input class="form-control" type="text" id="login" name="login" placeholder="Saisissez votre nom d'utilisateur"/>
				</div>
				<div class="form-group">						
					<label for="pwd">Mot de passe</label>
					<input class="form-control" type="password" id="pwd" name="pwd" placeholder = "Saisissez votre mot de passe"/>
				</div>
				<div>
					<input class="btn btn-primary" type="submit" value="Connexion"/>
				</div>
					<a href="#">J'ai perdu mon identifiant et/ou mon mot de passe</a>
				</div>
				<div>
					<input type="checkbox" name="check"><span class="">&nbsp</span> Mémoriser mon mot de passe
				</div>
			</form>
		</main>

		<footer>
			<h5>crédit : imie 2016 POEC PHP</h5>
		</footer>

	</body>
</html>