<?php 

declare (strict_types=1);

function isPcNumberWrong( bool | array $result) {
    if (!$result) {

        return true;
    } else {
        return false;
    }
}

function isInputEmpty (int $pcNummer) {
    if (empty($pcNummer)) {

        return true;
    } else {
        return false;
    }
}