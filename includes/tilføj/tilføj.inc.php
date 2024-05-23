<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pcNummer = $_POST["pcNummer"];
    $tyvNummer = $_POST["tyvNummer"];
    $pcNummer = intval($pcNummer);
    $tyvNummer = intval($tyvNummer);

    try {

        require_once '../dbh.inc.php';
        require_once 'tilføj_model.inc.php';
        require_once 'tilføj_contr.inc.php';

        $errors = [];

        if (isInputEmpty($pcNummer)) {
            $errors["emptyInput"] = "Fyld alle felter!";
        }

        $results = getPC($pdo, $pcNummer);


        require_once '../config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_tilføj"] = $errors;

            $tilføjData = [
                "PC Nummer" => $pcNummer,
                "Tyvsikrings nummer" => $tyvNummer
            ];

            $_SESSION["tilføj_data"] = "tilføjData";

            header("Location: ../../itAdmin.php");

            echo("Unexpected Error");


            die();
        };


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    };

    tilføjPC($pdo, $pcNummer, $tyvNummer);

    header("Location: ../../itAdmin.php");

    
    die();
} else {
    header("Location: ../../itAdmin.php");

    die();
};