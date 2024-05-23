<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pcNummer = $_POST["pcNummer"];
    $tyvNummer = $_POST["tyvNummer"];
    $pcNummer = intval($pcNummer);
    $tyvNummer = intval($tyvNummer);

    try {

        require_once '../dbh.inc.php';
        require_once 'tyvsikring_model.inc.php';
        require_once 'tyvsikring_contr.inc.php';

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

    tilføjTyvsikringsNummer($pdo, $pcNummer, $tyvNummer);

    header("Location: ../../itAdmin.php");
    
    die();
} else {
    header("Location: ../../itAdmin.php");

    die();
}