<?php
session_start();

if (isset($_GET['id_article']))
{
$_SESSION['id_billet'] = $_GET['id_article'];
}
?>
<!DOCTYPE html>

<html>

  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shards.min.css">
    <title>Accueil</title>
  </head>

	<body data-gr-c-s-loaded="true" class="">


	<?php include('header.php');

	include('connexion_forum.php');
						
	$reqArticles = $bdd->prepare('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_crea, \'%d/%m/%Y\') AS date_fr, tag, img FROM articles WHERE id = ?');
	$reqArticles->execute(array($_SESSION['id_billet']));

	$article_select = $reqArticles->fetch()
	?>
	
		<div class="container mt-5">

			<div class="row">
				<div class="col-sm-8">
				
						<!-- AFFIXHAGE DE L'ARTICLE DEMANDE PAR L'URL -->
						
							<div class="card">
							<!--<img class="img-articles card-img-top" src="<?//=$article_select['img'];?>" alt="Card image cap">-->
							  <div class="card-body">
							  <p><span class="badge badge-success"><?=$article_select['tag'];?></span>  publié le <?=$article_select['date_fr'];?></p>
								<h4 class="card-title mt-2"><?=$article_select['titre'];?></h4>
								<p class="card-text"><?=$article_select['contenu'];?></p>
							  </div>
							</div>
						<?php ; ?>
						
						<!-- FORMULAIRE POUR LES COMMENTAIRES -->
						
						<div class="mt-5">
							<h4>Ecrire un commentaire</h4>
							
							<?php 
							
							if (isset($_SESSION['id']))
							{
							?>
							
							<form action="article_post.php?id=<?=$_SESSION['id'];?>" method="post">
								<fieldset>
									<div class="form-group">
										<label class="col-sm-3" for="">Votre message :</label><textarea row="3" col="" name="commentaire" class="form-control"></textarea>
									<div>
								</fieldset>
								<input type="submit" class="btn btn-success" value="valider"/>
							</form>
							
							<?php
							}
							else
							{
								echo '<p>Veuillez vous connecter pour pouvoir laisser un commentaire</p>';
							}
							?>
						</div>
						
						<!-- LISTE DES COMMENTAIRES -->
						
						<div class="mt-5 mb-5">
							<h4>Voir les commentaires</h4>
							
							<?php
							
							$comm = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire DESC LIMIT 0,10');
							$comm->execute(array('id_billet' => $_SESSION['id_billet']));
							$nbre_comm = $comm->rowCount();
							if ($nbre_comm >=1)
							{
								while ($commentaire = $comm->fetch())
								{
									
									echo '<div class="card mt-4"><div class="card-body ><span class="badge badge-secondary float-right">' . $commentaire['date_commentaire_fr'] . ' </span>

								  <strong>' . $commentaire['auteur'] . ' </strong> : ' . $commentaire['commentaire'] . '</div></div>';
									
								}
							}
							else
							{
								echo '<p>Pas de commentaires pour cet article</p>';
							}
							?>
						</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body ">
							<h4 class="card-title mb-3">Autres articles</h4>
							
							<?php
							
							$reqArticles_autres = $bdd->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_crea, \'%d/%m/%Y\') AS date_fr, tag, img FROM articles ORDER BY date_crea DESC LIMIT 4,10');
							
							while ($articles_autres = $reqArticles_autres->fetch())
							{
								echo 
								'<p><span class="text-primary"><b>' . $articles_autres['tag'] .'</b></span>  ' . $articles_autres['date_fr'] . '</p>
								<h6>' . $articles_autres['titre'] .'</h6>'
								;
							}
								
							?>
						</div>
					</div>
				</div>
			</row>
		</div>
		<script src="https://use.fontawesome.com/a4796e67aa.js"></script>
	</body>
</html>