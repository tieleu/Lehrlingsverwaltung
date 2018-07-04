<!DOCTYPE html>
<html>
<head>
    <?php
    include("header.php");
    $user = $_GET['user'];
    ?>

    <link rel="stylesheet" type="text/css" href="../css/test-upload.css">
    <title>Lehrverwaltung - Test hochladen</title>
</head>
<body>
<main>
    <h1 id="title">Test hochladen</h1>
    <hr>
    <form action="http://172.16.44.5:8080/upload" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Test auswählen:</label>
            <select required="true" class="form-control" name="test">
                <option value="-" disabled selected hidden>-</option>

                <?php
                $select = "SELECT * from test";
                $testnames = mysqli_query($db, $select);
                while ($row = mysqli_fetch_object($testnames)) {
                    ?>
                    <option value=<?php echo $row->id; ?>><?php echo $row->testname; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kommentar:</label>
            <input type="text" name="comment" class="form-control" placeholder="Kommentar eingeben">
        </div>
        <input type="file" name="file" id="upload-file">
        <input name="user_id" type="number" value="<?= $idUser ?>" style="display: none">
        <div id="save-button">
            <input type="submit" name="erteilen" class="btn btn-default" value="Testen"/>
        </div>
    </form>
</main>
</body>
</html>