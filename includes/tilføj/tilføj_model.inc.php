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

function tilføjPC(object $pdo, int $pcNummer, $tyvNummer) {
    $query = "INSERT INTO lånpc (pcNummer, tyveriNummer) VALUES (:pc, :tyvNummer);";
    
    
    $a = $pcNummer;
    $b = $tyvNummer;

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $a);
    $stmt->bindParam(":tyvNummer", $b);
    $stmt->execute();
}