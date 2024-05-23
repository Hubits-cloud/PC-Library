<?php 

include_once "../config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pc = $_POST["pcNummer"];
    $user = $_POST["brugernavn"];
    $date = date("Y-m-d");

    try {
        require_once "../dbh.inc.php";

        $query = "INSERT INTO lånPc (pcNummer, bruger, udlåntDato) VALUES (:pc, :user, :date);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":pc", $pc);
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":date", $date);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../../index.php");

        die();


    } catch (PDOException $e) {
        try {
            $query = "UPDATE lånPc SET bruger = :user, udlåntDato = :date WHERE pcNummer = :pc;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":pc", $pc);
            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":date", $date);

            $stmt->execute();

            $pdo = null;
            $stmt = null;

            header("Location: ../../index.php");

            die();
            
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
        
    }
} else {
    header("Location: ../../index.php");
}