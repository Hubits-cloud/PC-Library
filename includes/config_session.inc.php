<?php 

# FOR NOTES GO TO CONFIG.PHP

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();
if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regen"])) {

        regen_session_id_loggedIn();
    
    } else {
    
        $interval = 60 * 30;
    
        if (time() - $_SESSION["last_regen"] >= $interval) {
    
            regen_session_id_loggedIn();
        }
    }
} else {
    if (!isset($_SESSION["last_regen"])) {

        regen_session_id();
    
    } else {
    
        $interval = 60 * 30;
    
        if (time() - $_SESSION["last_regen"] >= $interval) {
    
            regen_session_id();
        }
    }
}


function regen_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regen"] = time();
}

function regen_session_id_loggedIn() {
    session_regenerate_id(true);


    $user_id = $_SESSION["user_id"];
    # creates a new session id containing the logged in users user id.
    $newSessionId = session_create_id();
    $sessionID = $newSessionId. "_" . $user_id;
    session_id($sessionID);

    $_SESSION["last_regen"] = time();
}