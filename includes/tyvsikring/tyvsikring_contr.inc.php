<?php

/**
 * @author Tobias Madsen Belling <tobiasbell.dev@outlook.com>
 */

# Makes the code strict instead of dynamic
declare (strict_types=1);

# Makes a function that either takes a bool or an array that is then placed in the var $result
function isPcNumberWrong( bool | array $result) {
    if (!$result) {

        return true;
    } else {
        return false;
    }
}

# Makes a function that takes an int
function isInputEmpty (int $pcNummer) {
    if (empty($pcNummer)) {

        return true;
    } else {
        return false;
    }
}  