 <!DOCTYPE html>
    <html>
    <head>
        <?php 
            include("header.php");
         ?>
   
  
     <link rel="stylesheet" type="text/css" href="../css/einstellungen.css">

    	<title>Lehrverwaltung - Einstellungen</title>
    	
    </head>
    <body>
    <a href="../index.php?user=<?php echo $nameOfUser ?>">home</a><br>

    <div id="userOptions">
    	<form action="../phpAction/changePasswordAction.php?user=<?php echo $nameOfUser ?>" method="post">
        <div id="passwortChange">
            <label for="old">Altes Passwort <input type="password" name="old" value="" placeholder="altes Passwort"></label>
            <label for="new1">Neues Passwort <input type="password" name="new1" value="" placeholder="neues Passwort"></label>
            <label>Passwort bestätigen <input type="password" name="new2" value="" placeholder="Passwort bestätigen"></label>
        </div>
        </form>
    </div>

    <div id="userDelete">
    	
    </div>

	<div id="uebungCreate">
    	
    </div>

	<div id="uebungDelete">
    	
    </div>

    </body>
    </html>   