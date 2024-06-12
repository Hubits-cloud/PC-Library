<?php

/**
 * @author Tobias Madsen Belling <tobiasbell.dev@outlook.com>
 */

# Allows the code from config to run here 
include_once "../config_session.inc.php";

# If you got here through a post method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Assign the value pcNummer to the var pc
    $pc = $_POST["pcNummer"];

    # Assign the value brugernavn to the var user
    $user = $_POST["brugernavn"];

    # Assign the current date to the var date
    $date = date("Y-m-d");

    try {

        # Allows me to reference code from these sources
        require_once "../dbh.inc.php";

        # Prepares a query that in this case inserts the specified data
        $query = "INSERT INTO lånPc (pcNummer, bruger, udlåntDato) VALUES (:pc, :user, :date);";

        # Sends in the query seperate from the data preventing an injection
        $stmt = $pdo->prepare($query);

        # Binds the value of $ to :
        $stmt->bindParam(":pc", $pc);
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":date", $date);

        # Executes the statement
        $stmt->execute();

        # Sets pdo to null to save space
        $pdo = null;

        # Sets stmt to null to save space
        $stmt = null;

        # Returns to index
        header("Location: ../../index.php");

        # Kills the script
        die();

    # If any error appears in the try block
    } catch (PDOException $e) {
        try {

            # Prepares a query that in this case updates the specified data
            $query = "UPDATE lånPc SET bruger = :user, udlåntDato = :date WHERE pcNummer = :pc;";

            # Sends in the query seperate from the data preventing an injection
            $stmt = $pdo->prepare($query);

            # Binds the value of $ to :
            $stmt->bindParam(":pc", $pc);
            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":date", $date);

            # Executes the statement
            $stmt->execute();

            # Sets pdo to null to save space
            $pdo = null;

            # Sets stmt to null to save space
            $stmt = null;

            # Returns to index
            header("Location: ../../index.php");

            # Kills the script
            die();
            
        # If any error appears in the try block, catch the error and display it before it kills the script
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
        
    }
} else {
    # Returns to index
    header("Location: ../../index.php");

    die();
}