<?php

declare (strict_types=1);

function getPC(object $pdo, int $pcNummer) {
    $query = "SELECT * FROM LånPc WHERE pcNummer = :pc;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function afleverPc(object $pdo, int $pcNummer) {
    $query = "UPDATE lånPc SET bruger = :username, udlåntDato = :date WHERE pcNummer = :pc;";
    
    $a = "afleveret";
    $b = "null";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":username", $a);
    $stmt->bindParam(":date", $b);
    $stmt->execute();
}