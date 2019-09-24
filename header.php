<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MyForum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-atom"></i> Accueil <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Go">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
	  <?php if (isset($_SESSION['id']))
	  {
		 ?> 
	<a href="deconnexion.php" class="btn btn-danger m-2">Déconnexion</a>
	<?php
	  }
	  else
	  {
	?>
	<a href="inscription.php" class="btn btn-primary ml-2 my-2 my-sm-0">S'inscrire  <i class="fa fa-user"></i></a>
	<a href="login.php" class="btn btn-success ml-2 my-2 my-sm-0">Se connecter   <i class="fa fa-lock"></i></a>
	<?php
	  }
	  
	  ?>
    </form>
  </div>
</nav>
