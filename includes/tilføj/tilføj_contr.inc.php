<?php 

declare (strict_types=1);



function isInputEmpty (int $pcNummer) {
    if (empty($pcNummer)) {

        return true;
    } else {
        return false;
    }
}