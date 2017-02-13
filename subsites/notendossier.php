<!DOCTYPE html>
<html>
<head>
	<?php 
	include("header.php");
	$servername = "172.16.44.5";
	$username = "lehrling";
	$password = "sec1.01";

	$conn =mysql_connect($servername, $username, $password)
		or die("Fehler im System");
		mysql_select_db("Lehrverwaltung");
	$select ="SELECT * from Noten where User_idUser=1";
	?>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/noten.css">
	<script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
	<script  type="text/javascript" src="../js/notendossier.js" defer></script>
  

	<title>Lehrverwaltung - Noten Dossier</title>

</head>
<body>
	<div id="container1">
		<div id="heading" class="accordion"><h1>Schul-Unterricht  <i class="fa fa-caret-square-o-down" aria-hidden="true"></i></h1>
		</div>
		    <div class="panel" id="scroll">
				<ul class="nav nav-tabs">
					<li role="presentation"><a href="#1">Lehrjahr1 Sem.1</a></li>
					<li role="presentation"><a href="#2">Lehrjahr1 Sem.2</a></li>
					<li role="presentation"><a href="#3">Lehrjahr2 Sem.1</a></li>
					<li role="presentation"><a href="#4">Lehrjahr2 Sem.2</a></li>
					<li role="presentation"><a href="#5">Lehrjahr3 Sem.1</a></li>
					<li role="presentation"><a href="#6">Lehrjahr3 Sem.2</a></li>
					<li role="presentation"><a href="#7">Lehrjahr4 Sem.1</a></li>
					<li role="presentation"><a href="#8">Lehrjahr4 Sem.2</a></li>
				</ul>

				<div class="tab-content ">
					<div class="tab-pane active" id="1">
						<h3>Standard tab panel created on bootstrap using nav-tabs</h3>
					</div>
					<div class="tab-pane" id="2">
						<h3>Notice the gap between the content and tab after applying a background color</h3>
					</div>
					<div class="tab-pane" id="3">
						<h3>add clearfix to tab-content (see the css)</h3>
					</div>
				</div>
				<br>
				<br>


		 <button id="Eingabe">Eingabe</button>
				
 				<div id="schulfach"><br>
 				
				</div>

				</div>


   
    		</div>
		</div>

	</div>
	<br>
	<div id="container2">
		<div id="heading" class="accordion">	<h1>Modul-Unterricht  <i class="fa fa-caret-square-o-down" aria-hidden="true"></i></h1>
		</div>
		    <div class="panel">
				<ul class="nav nav-tabs">
					<li role="presentation"><a href="#">Lehrjahr1 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr1 Sem.2</a></li>
					<li role="presentation"><a href="#">Lehrjahr2 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr2 Sem.2</a></li>
					<li role="presentation"><a href="#">Lehrjahr3 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr3 Sem.2</a></li>
					<li role="presentation"><a href="#">Lehrjahr4 Sem.1</a></li>
					<li role="presentation"><a href="#">Lehrjahr4 Sem.2</a></li>
					<button id="lapButton" type="button" style="width: 95px; height: 50px;">LAP Stand</button>
				</ul>
				<br>
				<br>

				<button id="Eingabe1">Eingabe</button>

				<div id="modulfach"><br>
				</div>

			</div>
  			<br>
  		</div>
	<footer id="footer">
</footer>


</body>
</html>