<?php 

# If you got here through a post method
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    # Assign the value pcNummer to the var pcNummer
    $pcNummer = $_POST["pcNummer"];

    # Assign the value tyvNummer to the var tyvNummer
    $tyvNummer = $_POST["tyvNummer"];

    # Makes pcNummer an int
    $pcNummer = intval($pcNummer);

    # Makes tyvNummer an int
    $tyvNummer = intval($tyvNummer);

    try {

        # Allows me to reference code from these sources
        require_once '../dbh.inc.php';
        require_once 'tyvsikring_model.inc.php';
        require_once 'tyvsikring_contr.inc.php';

        # Makes an array called errors
        $errors = [];

        # Checks for missing input
        if (isInputEmpty($pcNummer)) {
            $errors["emptyInput"] = "Fyld alle felter!";
        }

        # gets the results of get pc
        $results = getPC($pdo, $pcNummer);

        # Checks if the pc number is wrong
        if (isPcNumberWrong($results)) {
            $errors["pcNumberIncorrect"] = "PC'en er ikke registreret";
        }

        # Allows the code from config to run here
        require_once '../config_session.inc.php';

        # Catches the errors and places them into the session
        if ($errors) {
            $_SESSION["errors_aflevering"] = $errors;

            # Returns to index
            header("Location: ../../itAdmin.php");

            die();
        }

    # If any error appears in the try block, catch the error and display it before it kills the script
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    # Runs the function
    tilføjTyvsikringsNummer($pdo, $pcNummer, $tyvNummer);

    # Returns to index
    header("Location: ../../itAdmin.php");
    
    die();
} else {
    # Returns to index
    header("Location: ../../itAdmin.php");

    die();
}