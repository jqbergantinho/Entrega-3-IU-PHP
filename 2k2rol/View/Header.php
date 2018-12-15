<?php
/*
Autor: Javier Quintas Bergantiño
Alias: 2k2rol
Fecha: 17/11/2018
Funcion: Header de la página web.
*/
    include_once'../Functions/Authentication.php';
    if(!isset($_SESSION['idioma'])){
        $_SESSION['idioma'] = 'SPANISH';
    }
    else{

    }
    include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../View/css/ET1_IU.css">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|IBM+Plex+Sans|IBM+Plex+Sans+Condensed|IBM+Plex+Serif" rel="stylesheet">
    <script type="text/javascript" src="../View/JavaScript/script.js"></script>
	    <!--bootstrap js-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	 crossorigin="anonymous"></script>
	<title><?php echo $strings['Loteria']; ?></title>
</head>

<body>
		<header>
			<nav id="cabecera">
				<!-- Cabecera en la que se encuentra el logo de la página con 3 botones (usuario, cerrar sesión y cambiar idioma) y un menú superior con diversos campos que deberían redirigir a otras secciones de la página que no se encuentra implementadas. !-->
				<img src="../View/logo/logo3.png" id="logo">
				<?php if(isset($_SESSION['login'])){
                ?>
				<button class="header" id="user"><i class="fas fa-user-check"></i><?php echo $_SESSION['login']; ?></button>
				<button class="header" id="desconexion" onclick="window.location='../Functions/Desconectar.php'"><i class="fas fa-user-times"></i></button>
			<?php
            }
            ?>
			<!--	<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="idioma">
					<i class="material-icons">language</i>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a href="../Functions/CambioIdioma.php?idioma=SPANISH" class="dropdown-item"><?= $strings['Español'] ?></a>
					<div class="dropdown-divider"></div>
					<a href="../Functions/CambioIdioma.php?idioma=ENGLISH" class="dropdown-item"><?= $strings['Inglés'] ?></a>
					<div class="dropdown-divider"></div>
					<a href="../Functions/CambioIdioma.php?idioma=GALICIAN" class="dropdown-item"><?= $strings['Gallego'] ?></a>
				</div>
			</div>
!-->
			<div class="dropdown">
				<button class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="idioma">
					<i class="material-icons">language</i>
				</button>
				<div class="dropdown-menu" aria-labelledby="idioma">
					<a href="../Functions/CambioIdioma.php?idioma=SPANISH" class="dropdown-item"><?= $strings['Español'] ?></a>
					<div class="dropdown-divider"></div>
					<a href="../Functions/CambioIdioma.php?idioma=ENGLISH" class="dropdown-item"><?= $strings['Inglés'] ?></a>
					<div class="dropdown-divider"></div>
					<a href="../Functions/CambioIdioma.php?idioma=GALLAECIAN" class="dropdown-item"><?= $strings['Gallego'] ?></a>
				</div>
			</div>

                <nav id="menu">
					<ul>
						<li><a href="../index.php"><?php echo $strings['Inicio']; ?></a></li>
						<li><a href="#"><?php echo $strings['Noticias']; ?></a></li>
						<li><a href="#"><?php echo $strings['Productos']; ?></a></li>
						<!--<li><a href="#"><?php echo $strings['Sobre MobileStore']; ?></a></li>!-->
						<li id="ultimoNav"><a href="#"><?php echo $strings['Contacto']; ?></a></li>
					</ul>
				</nav>
			</nav>
		</header>