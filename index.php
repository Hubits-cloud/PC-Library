<?php
require_once 'includes/config_session.inc.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Tobias Madsen Belling">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <title>Home</title>
    </head>
    <body>
        
        <div class="login-page">
            <h1>Home</h1>
            <form>
                <div class="admin-link">
                    Lån pc? <a href="lån.php">Klik her</a>
                </div>
                <div class="admin-link">
                    Aflever pc? <a href="afleveret.php">Klik her</a>
                </div>
                <div class="admin-link">
                    IT Admin. <a href="itAdmin.php">Klik her</a>
                </div>
            </form>
        </div>
    </body>
</html>