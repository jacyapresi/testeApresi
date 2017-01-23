<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Cadastro cliente</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
	<body>
	<div class="container">

		<?php
		include "conecta.php";

		$p = @$_GET['p'];
		if ($p=="" ){
			$p = "home";
		}

		?>

		<?php 
		include "menu.php";
		?>

		<?php
		include $p.".php";

		?>

	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </div>
	</body>
</html>

