<!DOCTYPE html>

<html>

  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shards.min.css">
    <title>Inscrition sur le forum</title>
  </head>

  <body data-gr-c-s-loaded="true" class="bg-light">
  
	<section class="container mt-5">
		<div class="row justify-content-sm-center">
			<div class="col-sm-4 wrapper mt-5 mb-6">
				
				<div class="card">
					<div class="card-body">
							<form class="form-signin" action="inscription_post.php" method="post">
								<fieldset>
									<legend class="text-center"><b>Inscrivez-vous ici :</b></legend>
									
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="bas"><i class="fa fa-user"></i></span>
												</div>
												<input type="text" id="bas" class="form-control" name="pseudo" placeholder="Pseudo" aria-label="Username" aria-describedby="basic-addon1" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="">@</span>
												</div>
												<input type="mail" name="mail" id="mail" class="form-control" placeholder="Adresse e-mail" aria-label="Username" aria-describedby="" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group .input-group-seamless">
												<input type="password" name="mdp" id="mdp" class="form-control" placeholder="Mot de passe" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input type="password" name="mdp_confirm" id="mdp_confirm" class="form-control" placeholder="Confirmation du mot de passe" required>
											</div>
										</div>
										
										<?php
											if (isset($_GET['error_length']))
											{
												echo '<p class="text-danger">Veuillez ne pas dépasser 225 caractères</p>';
											}
											
											if (isset($_GET['error_email']))
											{
												echo '<p class="text-danger">Veuillez rentrer une adresse email valide</p>';
											}
											
											if (isset($_GET['error_mailexist']))
											{
												echo '<p class="text-danger">Cette adresse email est déja utilisée</p>';
											}
											
											if (isset($_GET['error_passwlen']))
											{
												echo '<p class="text-danger">Choisissez un mot de passe de 8 caractères minimum</p>';
											}
											
											if (isset($_GET['error_passw']))
											{
												echo '<p class="text-danger">Les deux mots de passe ne sont pas identiques !</p>';
											}

										?>
									
									<input type="submit"  name="inscription" value="valider" class="btn btn-primary btn-pill btn-block">
									
									<?php
									
									if (isset($_GET['suscribe']))
											{
												echo '<p class="text-success mt-1">Vous êtes bien inscrit !</p>';
											}
											
									?>
								</fieldset>
							</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col text-center">
				<p>Pour revenir à l'accueil : <a href="index.php" class="btn btn-outline-dark btn-pill m-2">cliquez ici</a> </p>
			</div>
		</div>
	</section>
	
	<script src="https://use.fontawesome.com/a4796e67aa.js"></script>
	
  </body>
</html>