<?php

include('connexion_forum.php');

// on vérifie qu'il y ait un mot de passe
// avec 'required' le coté client fait déja le travail

if (isset($_POST['mdp']) AND !empty($_POST['mdp']))
{
		// on empêche l'inclusion de balises HTML
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars($_POST['mail']);
		$mdp1 = htmlspecialchars($_POST['mdp']);
		$mdp2 = htmlspecialchars($_POST['mdp_confirm']);

		// On analyse le nombre de caractères des champs requis
		$pseudoLen = strlen($pseudo);
		$mailLen = strlen($mail);
		$mdp1Len = strlen($mdp1);
		
		if ($pseudoLen <= 225 OR mailLen <= 225  OR mdpLen <= 225)
		{
			if (filter_var($mail, FILTER_VALIDATE_EMAIL))
			{
				$reqmail = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
				$reqmail->execute(array($mail));
				$mailexist = $reqmail->rowCount();
				if ($mailexist == 0)
				{
					if ($mdp1Len > 7)
					{
						if ($mdp1 == $mdp2)
						{
							$pass_hashe = password_hash($mdp1, PASSWORD_DEFAULT);

							$suscribe = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES( :pseudo, :pass, :email, CURDATE())');
							$suscribe->execute(array(
								'pseudo' => $pseudo,
								'email' => $mail,
								'pass' => $pass_hashe));
							header('Location: index.php?suscribe=1');
						}
						else
						{
						header('Location: inscription.php?error_passw=1');
						}
					}
					else
					{
					header('Location: inscription.php?error_passwlen=1');
					}
				}
				else 
				{
				header('Location: inscription.php?error_mailexist=1');	
				}
			}
			else
			{
				header('Location: inscription.php?error_email=1');
			}
		}
		else
		{
		header('Location: inscription.php?error_length=1');
		}
}
?>