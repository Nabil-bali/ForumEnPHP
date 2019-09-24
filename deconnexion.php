<?php
session_start();
$_SESSION = array();
session_destroy();
session_unset();

if (isset($_SESSION['id'])) { echo $_SESSION['id']; }
header('Location:index.php');

?>

<html>

  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shards.min.css">
    <title>deconnexion</title>
  </head>
  <body>
	<h2>Mince...</h2>
  </body>