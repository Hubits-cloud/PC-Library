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

function updateInfo(object $pdo, int $pcNummer, string $pcInfo) {
    $query = "UPDATE lånPc SET bærbarInfo = :info WHERE pcNummer = :pc;";
    
    
    $a = $pcInfo;

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":info", $a);
    $stmt->execute();
}