<?php

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
function afleverPc(object $pdo, int $pcNummer) {

    # Prepares a query that in this case updates the specified data
    $query = "UPDATE lånPc SET bruger = :username, udlåntDato = :date WHERE pcNummer = :pc;";
    
    # These are static because no matter what we want these to replace the previous data
    $a = "afleveret";
    $b = "null";

    # sends in the query seperate from the data preventing an injection
    $stmt = $pdo->prepare($query);

    # binds the value of $ to :
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":username", $a);
    $stmt->bindParam(":date", $b);

    # executes the statement
    $stmt->execute();
}