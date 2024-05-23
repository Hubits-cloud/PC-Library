<?php 
echo "AFAS";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pcNummer = $_POST["pcNummer"];
    $pcNummer = intval($pcNummer);

    try {

        require_once '../dbh.inc.php';
        require_once 'winUpdate_model.inc.php';
        require_once 'winUpdate_contr.inc.php';

        $errors = [];

        if (isInputEmpty($pcNummer)) {
            $errors["emptyInput"] = "Fyld alle felter!";
        }

        $results = getPC($pdo, $pcNummer);

        if (isPcNumberWrong($results)) {
            $errors["pcNumberIncorrect"] = "PC'en er ikke registreret";
        }

        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_winUpdate"] = $errors;

            header("Location: ../../itAdmin.php");

            die();
        }


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    afleverPc($pdo, $pcNummer);

    header("Location: ../../itAdmin.php");
    
    die();
} else {
    header("Location: ../../itAdmin.php");

    die();
}