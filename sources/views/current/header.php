<style>
<?php include "assets/css/header.css";?>
</style>

<header>
	<nav class="navbar navbar-expand">
		<a class="navbar-brand" href="index.php?tab=accueil"><img class="ps-5" src="assets/img/together.png"/></a>
		<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
			<ul class="navbar-nav">

			<?php if($_SESSION['utilisateur']->getRole() == 'admin'):?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=accueil">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=user">Clients</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=project">Projets</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=delivery">Livraisons</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=invoice">Factures</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=prospect">Prospects</a>
				</li>
				<?php elseif($_SESSION['utilisateur']->getRole() == 'customer'): ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=accueil">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?tab=project">Mes projets</a>
				</li>
				<?php endif ?>
				</ul>
		</div>
		<div class="nav-user pe-2">
			<?= $_SESSION['utilisateur']->getFirstname(); ?>
			<?= $_SESSION['utilisateur']->getLastname(); ?>
		</div>
		<div class="log-out ml-auto px-4 text-center">
			<a href="index.php?tab=accueil&action=logout" class="logout-link">
				<i class="fa-solid fa-right-from-bracket logout-logo"></i><br>
				<span class="d-none d-sm-inline title-logout">Déconnexion</span>
			</a>
		</div>
	</nav>
</header>