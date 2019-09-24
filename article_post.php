<?php

session_start();

include('connexion_forum.php');
		
$envoi_formulaire = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(:id_billet, :auteur, :commentaire, NOW())');
$envoi_formulaire->execute(array(
	'id_billet' => $_SESSION['id_billet'],
	'auteur' => $_SESSION['pseudo'],
	'commentaire' => $_POST['commentaire']
));

header('Location: article.php?id=' . $_SESSION['id_billet'] .'');			

echo 'Test';
?>