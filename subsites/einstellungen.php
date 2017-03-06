 <!DOCTYPE html>
<html>
    <?php 
include("header.php");
$user = $_GET['user'];
?>
    <head>

     <link rel="stylesheet" type="text/css" href="../css/einstellungen.css">
     <script type="text/javascript" href="../jquery/jquery-3.1.1.js"></script>
     <script type="text/javascript" src="../js/einstellungen.js"></script>

    	<title>Lehrverwaltung - Einstellungen</title>
    	
    </head>
    <body>
<div id="wrappSettings">
    <div id="userOptions">
    	<form action="../phpAction/changePasswordAction.php?user=<?php echo $user ?>" method="post">
        <div id="passwortChange">
            <h2 align="center">Passwort ändern</h2>
            <label for="old" class="form-group form-inline labelforPW">Altes Passwort <input class="form-control inputPW" type="password" name="old" value="" placeholder="altes Passwort" required="true"></label>
            <label for="new1" class="form-group form-inline labelforPW">Neues Passwort <input class="form-control inputPW" type="password" name="new1" value="" placeholder="neues Passwort" required="true"></label>
            <label for="new2" class="form-group form-inline labelforPW">Passwort bestätigen <input class="form-control inputPW" type="password" name="new2" value="" placeholder="Passwort bestätigen" required="true"></label><br><br>
        </div>
            <button id="chpwButton" name="chpwButton" class="btn">Passwort ändern</button>
        </form>
    </div>

    <div id="createUser">
    <form action="../phpAction/createUserAction.php?user=<?php echo $user ?>" method="post">
    <div id="createUserWrapper">
        <h2 align="center">Benutzer erstellen</h2>
        <label for="vorname" class="form-group form-inline labelforPW">Vorname <input class="form-control inputPW" type="text" name="vorname" value="" placeholder="Max" required="true"></label>
        <label for="nachname" class="form-group form-inline labelforPW">Nachname <input class="form-control inputPW" type="text" name="nachname" value="" placeholder="Muster" required="true"></label>
        <label for="benutzername" class="form-group form-inline labelforPW">Benutzername <input class="form-control inputPW" type="text" name="benutzername" value="" placeholder="tiemus" required="true"></label>
        <div class="selectwrapper">
        <label for="status" class="form-group form-inline labelforPW">Status </label>
        <select  class="form-control labelforPW" name="status">
            <option selected>select Status</option>
            <option value="lehrling">Lehrling</option>
            <option value="lehrmeister">Lehrmeister</option>
        </select>
        </div>
        <label for="new1" class="form-group form-inline labelforPW">Neues Passwort <input class="form-control inputPW" type="password" name="new1" value="" placeholder="neues Passwort" required="true"></label>
            <label for="new2" class="form-group form-inline labelforPW">Passwort bestätigen <input class="form-control inputPW" type="password" name="new2" value="" placeholder="Passwort bestätigen" required="true"></label><br><br>
            </div>
            <button id="createUserButton" name="creaUsrBtn" class="btn">Benutzer erstellen</button>

            </form>
    </div>

	<!--<div id="uebungCreate">
    <form action="../phpAction/createUebung.php?user=--><?php #echo $user?><!--" method="post" enctype="multipart/form-data">
    <div id= createUebungWrapp>
        <h2 align="center">Übung erstellen</h2>
        <label for="uebungsname" class="form-group form-inline labelforPW">Übungs Name <input class="form-control inputPW" type="text" name="uebungsname" value="" placeholder="name" required="true"></label>
        <div class="selectwrapper">
        <label for="thema" class="form-group form-inline labelforPW">Thema </label>
        <select  class="form-control labelforPW" name="thema">
            <option selected>select Thema</option>
            <option value="java">Java</option>
            <option value="html">HTML</option>
            <option value="php">PHP</option>
            <option value="sonstiges">Sonstiges</option>
        </select>
        </div>
        <label for="voraussetzung" class="form-group form-inline labelforPW">Voraussetzung <input class="form-control inputPW" type="text" name="voraussetzung" value="" placeholder="name" required="true"></label>
        <div id="wrappfileinput"><label for="fileToUpload" class="form-group labelforPW">File zur Übung </label><input class="form-control inputPW" type="file" name="fileToUpload" id="fileToUpload" required="true"></div>
    </div>
    <button id="createUebungButton" name="creaUebungBtn" class="btn">Übung erstellen</button>
    </form>	
    </div>-->
    <!--<div id="userDelete">
        
    </div>


	<div id="uebungDelete">
    	
    </div>-->
</div>

    </body>
    </html>   