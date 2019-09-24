<?php
session_start();
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
	
	<style>
	
	.img-articles {  
	max-height : 70%;
    
	}
	</style>
  
	<?php include('header.php'); ?>
	
		<div class="container mt-5">
			<div class="row">
				<div class="col-sm-8">
					<div class="row">
					<?php
					
					include('connexion_forum.php');
					
					$reqArticles = $bdd->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_crea, \'%d/%m/%Y\') AS date_fr, tag, img FROM articles ORDER BY date_crea DESC LIMIT 0,4');
					
					while ($infoArticles = $reqArticles->fetch())
					{
					 ?>
						
						
						  <div class="col-sm-6 mb-4">
							<div class="card">
							<img class="img-articles card-img-top" src="<?=$infoArticles['img'];?>" alt="Card image cap">
							  <div class="card-body">
							  <p><span class="badge badge-success"><?=$infoArticles['tag'];?></span>  publié le <?=$infoArticles['date_fr'];?></p>
								<h4 class="card-title mt-2"><?=$infoArticles['titre'];?></h4>
								<!-- <p class="card-text"><?=$infoArticles['contenu'];?></p>-->
								<a href="article.php?id_article=<?=$infoArticles['id'];?>" class="btn btn-primary btn-squared">Lire l'article &rarr;</a>
							  </div>
							</div>
						  </div>
						
						<?php
						
						;
					}
					?>
					</div>
				</div>
				<div class="col-sm-4">
				<div class="card">
						<div class="card-body ">
							<h4 class="card-title mb-3">les derniers articles</h4>
							
							<?php
							
							$reqArticles_autres = $bdd->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date_crea, \'%d/%m/%Y\') AS date_fr, tag, img FROM articles ORDER BY date_crea DESC LIMIT 4,10');
							
							while ($articles_autres = $reqArticles_autres->fetch())
							{
								echo 
								'<a href="article.php?id_article=' . $articles_autres['id'] . '"><p><span class="text-primary"><b>' . $articles_autres['tag'] .'</b></span>  ' . $articles_autres['date_fr'] . '</p>
								<h6>' . $articles_autres['titre'] .'</h6></a>'
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