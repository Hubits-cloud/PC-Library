<?php

/**
 * @author Tobias Madsen Belling <tobiasbell.dev@outlook.com>
 */

# Makes the code strict instead of dynamic
declare (strict_types=1);

# Makes a function that takes an object and an int
function getPC(object $pdo, int $pcNummer) {

    # Prepares an sql query in this case gettin all info about a relative pc
    $query = "SELECT * FROM LånPc WHERE pcNummer = :pc;";

    # sends in the query seperate from the data preventing an injection
    $stmt = $pdo->prepare($query);

    # binds the value of $pcNummer to :pc
    $stmt->bindParam(":pc", $pcNummer);

    # executes the statement
    $stmt->execute();

    # fetches the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

# Makes a function that takes and object and an int
function tilføjPC(object $pdo, int $pcNummer, $tyvNummer) {

    # Prepares a query that in this case updates the specified data
    $query = "INSERT INTO lånpc (pcNummer, tyveriNummer) VALUES (:pc, :tyvNummer);";
    
    # Sends in the query seperate from the data preventing an injection
    $stmt = $pdo->prepare($query);

    # Binds the value of $ to :
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":tyvNummer", $tyvNummer);

    # Executes the statement
    $stmt->execute();
}