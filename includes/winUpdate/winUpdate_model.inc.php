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
function winUpdate(object $pdo, int $pcNummer) {

    # Prepares a query that in this case updates the specified data
    $query = "UPDATE lånPc SET sidsteWinUpdate = :date WHERE pcNummer = :pc;";
    
    # the current date
    $b = date("Y-m-d");

    # Sends in the query seperate from the data preventing an injection
    $stmt = $pdo->prepare($query);

    # Binds the value of $ to :
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":date", $b);

    # Executes the statement
    $stmt->execute();
}