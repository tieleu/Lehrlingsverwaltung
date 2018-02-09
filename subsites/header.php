<!DOCTYPE html>
<html>
<?php 
session_set_cookie_params(3600*24,"/");
session_start();
session_cache_limiter(3600);
include("../db/db_connection.php");
$nameOfUser = $_GET['user']; 	
$sessionUser =$_SESSION['login_user'];
$rowsuser = mysqli_query($db, "SELECT idUser FROM User WHERE username = '$nameOfUser'");
$idUser = 0;
while($row = mysqli_fetch_object($rowsuser)){
	$idUser = $row -> idUser;
}

if($_SESSION['eingeloggt']== true && $nameOfUser == $sessionUser){ 
	?>
	<head>	
		<meta name="description" content="Free Web tutorials">
		<meta name="author" content="Hege Refsnes">



		<link rel="stylesheet" type="text/css" href="../font/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../font/css/font-awesome.css">

		<link rel="stylesheet" type="text/css" href="../font/scss/_larger.scss">

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="../css/index.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script type="text/javascript" src="../js/keepalive.js"></script>
		<script type="text/javascript" src="../js/mainfunctions.js"></script>

	</head>
	<body >
		<div id="header">
			<div class="indexlogo">
				<a href="https://www.tie.ch"><img src="../image/tie-logo.png"></a>
			</div>

			<div align="right" class="indexlogo">
				<h3 id="leitspuch">LIFE IS A DIGITAL PROCESS</h3>
			</div>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
						<li><a href="../index.php?user=<?php echo $nameOfUser ?>">Home</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Aufgaben<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="aufgaben.php?user=<?php echo $nameOfUser ?>">Übersicht</a></li>
								<li><a href="aufgabenErteilen.php?user=<?php echo $nameOfUser ?>">Erteilen</a></li>
								<li><a href="zurPruefung.php?user=<?php echo $nameOfUser ?>">Prüfen</a></li> 
							</ul>
						</li>
						<li><a href="uebungen.php?user=<?php echo $nameOfUser ?>">Übungen</a></li>
						<?php 
							$user = mysqli_query($db, "SELECT status FROM User WHERE username='$nameOfUser'");
							if(mysqli_fetch_object($user) -> status === 'lehrmeister'){
						?>
								<li><a href="zeitUebersicht.php?user=<?php echo $nameOfUser ?>">Zeiterfassung Übersicht</a></li>	
						<?php
							}else{
						?>
							<li><a href="zeiterfassung.php?user=<?php echo $nameOfUser ?>">Zeiterfassung</a></li>
						<?php
							}
						?> 
						<li><a href="notendossier.php?user=<?php echo $nameOfUser ?>">Notendossier</a></li>  
						<li><a href="patterns.php?user=<?php echo $nameOfUser ?>">Java Patterns</a></li>
						<li><a href="handlungskompetenz.php?user=<?php echo $nameOfUser ?>&sem=all">Handlungskompetenzen</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="einstellungen.php?user=<?php echo $nameOfUser ?>"><span class="glyphicon glyphicon-wrench"></span> Einstellungen</a></li>
						<li><a href="../logout.php?user=<?php echo $nameOfUser ?>"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
					</ul>
				</div>
			</nav>
		</div>

		<footer id="footer">
		</footer>
	</body>

	<script type="text/javascript"> 
		$(window).bind('beforeunload', function() { 
			window.location="../logout.php?user=<?php echo $nameOfUser?>"; 
		});
	</script>

<?php  
	}else {	
		echo "access denied! Please log in";
		sleep(3);
		header("Location:../login.html");
		session_destroy();

	}
?>
</html>