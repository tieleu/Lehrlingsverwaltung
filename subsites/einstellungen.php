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
            <label for="old" class="labelforPW">Altes Passwort </label><input type="password" name="old" value="" placeholder="altes Passwort">
            <label for="new1" class="labelforPW">Neues Passwort </label><input type="password" name="new1" value="" placeholder="neues Passwort">
            <label for="new2" class="labelforPW">Passwort bestätigen </label><input type="password" name="new2" value="" placeholder="Passwort bestätigen">
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