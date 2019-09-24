<?php
session_start();

include('connexion_forum.php');

if (isset($_GET['id']) AND $_GET['id'] > 0)
{
	$intId = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($intId));
	$userInfo = $requser->fetch();
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
		<div class="row ">
			
			<div class="col-sm-4">
				<h2>Mon profil</h2>
				
				<div class="card">
					<div class="card-body">
						<p>Pseudo : <?=$userInfo['pseudo'];?> </br>
						Adresse email : <?=$userInfo['email'];?></p>
						<?php if (isset($_SESSION['id']) AND $intId == $_SESSION['id'])
						{
							echo '<a href="#" class="btn btn-success m-2">Editer mon profil</a>';
							/*echo '<a href="deconnexion.php" class="btn btn-danger m-2">Déconnexion</a>';*/
						}
						?>
					
					</div>
				</div>
			</div>
		</div>	
	</section>
	
	<script src="https://use.fontawesome.com/a4796e67aa.js"></script>
	
  </body>
</html>
<?php
}

else {
	echo 'personne n\'est connecté';
	header('Location: index.php');
}