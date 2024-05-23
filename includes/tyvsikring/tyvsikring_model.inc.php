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

function tilføjTyvsikringsNummer(object $pdo, int $pcNummer, int $tyvNummer) {
    $query = "UPDATE lånPc SET tyveriNummer = :tyvNummer WHERE pcNummer = :pc;";
    
    


    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":tyvNummer", $tyvNummer);
    $stmt->execute();
}