<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Vue ajout produit</title>
		<meta charset="utf-8" />
		<link href="view/css/bootstrap.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<header></header>
		<main>
			<nav>
				<div>
					<img src="view/img/logo.png" alt="logo"/>
				</div>
				<div>
				    <ul>
					  	<li><a href="#">Accueil</a></li>
					    <li><a href="#">Ajouter produit</a></li>
					    <li><a href="#">Catégories produit</a></li>
				    </ul>
				 </div>
				 <div>
				 	Nom Utilisateur
				 </div>
				 <div>
				 	<a href="#">Déconnexion</a>
				 </div>
			</nav>

			<h1>[Ajouter un produit]</h1>

			<aside>
				<section>					
					<table border="1"> 
						<caption>
					  		<h3>PRODUIT</h3>
					  	</caption> 
						<tr> 
							 <th>Nom du produit *</th> 
							 <td>
							 	<input type="text" required="required">
							 </td> 							 
						</tr> 
					  	<tr> 
							<th>Catégorie du produit *</th> 
							<td> 
								<form>
									<select name="nom" size="1">
									<option>Catégorie 1
									<option>Catégorie 2
									<option>Catégorie 3
									<option>Catégorie 4
									<option>Catégorie 5
									</select>
								</form>
							</td>
					  	</tr> 
					</table>
				</section>

				<section>					
					<table border="1"> 
						<caption>
					  		<h3>QUANTITE</h3>
					  	</caption> 
						<tr> 
							 <th>Achats neufs</th> 
							 <td>
							 	<input type="text" value="">
							 </td> 		
							 <th>Achats occasion</th> 
							 <td>
							 	<input type="text" value="">
							 </td> 					 
						</tr> 					  	
					</table>
				</section>

				<section>					
					<table border="1"> 
						<caption>
					  		<h3>FOURNISSEUR</h3>
					  	</caption> 
						<tr> 
							 <th>Nom du fournisseur *</th> 
							 <td>
							 	<input type="text" required="required">
							 </td> 							 
						</tr> 
					  	<tr> 
							<th>Numéro de téléphone *</th> 
							<td> 
								<input type="text" required="required">
							</td>
					  	</tr> 
					</table>
				</section>

				<section>					
					<table border="1"> 
						<caption>
					  		<h3>PARTICULARITE</h3>
					  	</caption> 
						<tr> 
							 <th>Total produits défaillants *</th> 
							 <td>
							 	<input type="text" required="required">
							 </td> 							 
						</tr> 					  	
					</table>
				</section>

				<section>					
					<table border="1"> 
						<caption>
					  		<h3>DESCRIPTIF</h3>
					  	</caption> 
						<tr> 
							 <th>Photo du produit (JPG/PNG) *</th> 
							 <td>
							 	<input type="text" required="required" placeholder="Télécharger une image">
							 </td> 							 
						</tr> 
					  	<tr> 
					  		<th>
					  			<input type="text" placeholder="Descriptif du produit">	
					  		</th>						
					  	</tr> 
					</table>
				</section>

				<h6>* champs obligatoires</h6>
			<aside>
		</main>
		
		<div>
			<button>Valider la fiche produit</button>
			<button>Annuler</button>
			<button>Effacer tous les champs</button>
		</div>

		<footer>
			<h5>crédit : imie 2016 POEC PHP</h5>
		</footer>

	</body>
</html>