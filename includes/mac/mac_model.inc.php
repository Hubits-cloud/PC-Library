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

function tilføjMacAddresse(object $pdo, int $pcNummer, string $mac) {
    $query = "UPDATE lånPc SET mac = :mac WHERE pcNummer = :pc;";
    
    


    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":mac", $mac);
    $stmt->execute();
}