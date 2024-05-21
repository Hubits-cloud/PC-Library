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
    $query = "UPDATE lånPc SET sidsteWinUpdate = :date WHERE pcNummer = :pc;";
    
    
    $b = date("Y-m-d");

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":date", $b);
    $stmt->execute();
}