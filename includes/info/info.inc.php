<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pcNummer = $_POST["pcNummer"];
    $pcInfo = $_POST["pcInfo"];
    $pcNummer = intval($pcNummer);
    $pcInfo = strval($pcInfo);

    try {

        require_once '../dbh.inc.php';
        require_once 'info_model.inc.php';
        require_once 'info_contr.inc.php';

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
            $_SESSION["errors_aflevering"] = $errors;

            header("Location: ../../itAdmin.php");

            die();
        }


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    updateInfo($pdo, $pcNummer, $pcInfo);

    header("Location: ../../itAdmin.php");
    
    die();
} else {
    header("Location: ../../itAdmin.php");

    die();
}