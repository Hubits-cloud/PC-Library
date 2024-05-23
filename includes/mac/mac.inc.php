<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pcNummer = $_POST["pcNummer"];
    $mac = $_POST["mac"];
    $pcNummer = intval($pcNummer);
    

    try {

        require_once '../dbh.inc.php';
        require_once 'mac_model.inc.php';
        require_once 'mac_contr.inc.php';

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

    tilføjMacAddresse($pdo, $pcNummer, $mac);

    header("Location: ../../itAdmin.php");
    
    die();
} else {
    header("Location: ../../itAdmin.php");

    die();
}