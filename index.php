
<html>
<?php
session_set_cookie_params(3600*24,"/");	
session_start();
session_cache_limiter(3600);
include("db/db_connection.php");

$nameOfUser = $_GET['user'];
$sessionUser =$_SESSION['login_user'];
if($_SESSION['eingeloggt']== true && $nameOfUser == $sessionUser){ 
	?>
	
	<head>
		
		<meta name="description" content="Free Web tutorials">
		<meta name="author" content="Hege Refsnes">
		

		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">

		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="animation/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="animation/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="animation/css/component.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/keepalive.js"></script>

		<title>Lehrlingsverwaltung - Home</title>
	</head>
	<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<div class="indexlogo">
						<img src="image/tie-logo.png">
					</div>
					<div  align="right" class="indexlogo">
						<h3 id="leitspuch">LIFE IS A DIGITAL PROCESS</h3>
					</div>

					<nav class="navbar navbar-inverse">
						<div class="container-fluid">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#">Home</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Aufgaben<span class="caret"></span></a>
									<ul class="dropdown-menu">

										<li><a href="subsites/aufgaben.php?user=<?php echo $nameOfUser ?>">Übersicht</a></li>
										



										<li><a href="subsites/aufgabenErteilen.php?user=<?php echo $nameOfUser ?>">Erteilen</a></li>
										<li><a href="subsites/zurPruefung.php?user=<?php echo $nameOfUser ?>">Prüfen</a></li> 
									</ul>
								</li>
								<li><a href="subsites/uebungen.php?user=<?php echo $nameOfUser ?>">Übungen</a></li>
								<?php 
								if($nameOfUser=="tiefri"){
									?>

									<li><a href="subsites/zeitUebersicht.php?user=<?php echo $nameOfUser ?>">Zeiterfassung Übersicht</a></li>	
									<?php
								}else{
									?>
									
									<li><a href="subsites/zeiterfassung.php?user=<?php echo $nameOfUser ?>">Zeiterfassung</a></li>
									<?php
								}
								?> 
								<li><a href="subsites/notendossier.php?user=<?php echo $nameOfUser ?>">Notendossier</a></li>  
								<li><a href="subsites/patterns.php?user=<?php echo $nameOfUser ?>">Java Patterns</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="subsites/einstellungen.php?user=<?php echo $nameOfUser ?>"><span class="glyphicon glyphicon-wrench"></span> Einstellungen</a></li>
								<li><a href="logout.php?user=<?php echo $nameOfUser ?>"><span class="glyphicon glyphicon-log-out"></span> logout</a></li>
							</ul>
						</div>
					</nav>

					<canvas id="demo-canvas"></canvas>
					<h1 class="main-title">Welcome <span class="thin"><?php echo $nameOfUser ?></span></h1>
				</div>
				<script src="animation/js/TweenLite.min.js"></script>
				<script src="animation/js/EasePack.min.js"></script>
				<script src="animation/js/rAF.js"></script>
				<script src="animation/js/demo-1.js"></script>
			</div>
		</div>
	</body>

	<?php 

}else {		 
	echo "access denied! Please log in";

	sleep(3);
	header("Location:login.html");
	session_destroy();

}

?>
</html>


