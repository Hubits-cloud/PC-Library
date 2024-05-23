<?php
require_once 'includes/config_session.inc.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        
        <div class="login-page">
            <h1>Manage PC's</h1>
            <form>
                <div class="admin-link">
                    Sidste win opdatering <a href="winUpdate.php">Klik her</a>
                </div>
                <div class="admin-link">
                    Bærbar info <a href="gul.php">Klik her</a>
                </div>
                <div class="admin-link">
                    Tilføj PC <a href="tilføjPc.php">Klik her</a>
                </div>
                <div class="admin-link">
                    Registrer tyvsikrings nummer <a href="tyvsikring.php">Klik her</a>
                </div>
                <div class="admin-link">
                    Register MAC addresse <a href="macAddresse.php">Klik her</a>
                </div>
                <div class="admin-link">
                    Tilbage til forside? <a href="index.php">Klik her</a>
                </div>
            </form>
        </div>
    </body>
</html>