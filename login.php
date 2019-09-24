<?php
session_start();

include('connexion_forum.php');

if (isset($_POST['login_form']) AND isset($_POST['mailConnect']) AND isset($_POST['passConnect']))
{
	
	$mailConnect = htmlspecialchars($_POST['mailConnect']);
	$passConnect = password_hash($_POST['passConnect'], PASSWORD_DEFAULT /* PASSWORD_BCRYPT */);
	if (!empty($_POST['mailConnect']) AND !empty($_POST['passConnect']))
	{
		// on cherche les lignes correspondant à la requete de l'utilisateur
		$requser = $bdd->prepare('SELECT * FROM membres WHERE email = :email');
		$requser->execute(array(
			'email' => $mailConnect));
		$userexist = $requser->rowCount();
		if ($userexist == 1)
		{
			$userInfo = $requser->fetch();
			if (password_verify($_POST['passConnect'], $userInfo['pass']))
			{
				$_SESSION['id'] = $userInfo['id'];
				$_SESSION['pass'] = $userInfo['pass'];
				$_SESSION['pseudo'] = $userInfo['pseudo'];
				$_SESSION['mail'] = $userInfo['email'];
				header('Location: profil.php?id='. $_SESSION['id']);
			}
			else
			{
				$error = 'Adresse e-mail ou mot de passe incorrect';
			}
		} 
		else 
		{
			$error = 'Nous ne connaissons pas cette adresse e-mail';
			$userInfo = $requser->fetch();
			echo  $userInfo['email'];
		}
	}
	else
	{
		$error = 'Tous les champs doivent être remplis !';
	}
} 
?>

<!DOCTYPE html>

<html>

  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shards.min.css">
    <title>Login</title>
  </head>

  <body data-gr-c-s-loaded="true" class="bg-light">
  
	<?php include('header.php'); ?>
	
	<section class="container mt-5">
		<div class="row justify-content-sm-center">
			<div class="col-sm-8 mt-5">
				<div class="card mt-5">
					<div class="card-body">
						<form class="" action="" method="POST">
							<fieldset>
								<legend class="text-center m-4"><b>Connectez-vous</b></legend>
							</fieldset>
							<div class="form-inline justify-content-sm-center">
							<div class="form-group">
								<input type="mail" name="mailConnect" class="form-control mx-sm-2" placeholder="Adresse e-mail">
							</div>
							<div class="form-group">
								<input type="password" name="passConnect" class="form-control mx-sm-2"placeholder="Mot de passe">
							</div>
							<input type="submit" name="login_form" class="btn btn-success mx-sm-2" value="valider">
							</div>
							<?php
							if (isset($error)) { 
							echo '<span class="text-danger text-center mt-2">' . $error . '</span></br>' ;
							}
							if (isset($succed)) { echo '<div><span class="text-success text-center mt-2">' . $succed . '</span></div>' ; 
							} ?>
							
						</form>
					</div>
				</div>
			</div>
		</div>	
	</section>
	
	<script src="https://use.fontawesome.com/a4796e67aa.js"></script>
	
  </body>
</html>