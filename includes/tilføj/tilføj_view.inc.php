<?php 

declare(strict_types=1);

# saves what the user typed for a more streamlined experience
function signupInput () {

    # checks for stored signup data named username, and checks if it's taken. See more in signup.inc
    if (isset($_SESSION['signup_data']["username"]) && !isset($_SESSION["errors_signup"]["takenUsername"])) {

        # if the username isn't taken it'll be automaticly typed in the field.
        echo '<div class="txt-field">
        <input type="text" name="username" required value="' . $_SESSION['signup_data']["username"] . '">
        <span></span>
        <label>Username</label>
        </div>';
    } else {
        echo '<div class="txt-field">
        <input type="text" name="username" required>
        <span></span>
        <label>Username</label>
        </div>';
    }

    # for safety reasons, the user will have to type the password again, even if it was valid
    echo '<div class="txt-field">
    <input type="password" name="pwd" required>
    <span></span>
    <label>Password</label>
    </div>';

    # checks for stored signup data named email, and checks if it's registered and valid. See more in signup.inc
    if (isset($_SESSION['signup_data']["email"]) && !isset($_SESSION["errors_signup"]["registeredEmail"])  && !isset($_SESSION["errors_signup"]["invalidEmail"])) {

        # if the email isn't taken or invalid it'll be automaticly typed in the field.
        echo '<div class="txt-field">
        <input type="text" name="email" required value="' . $_SESSION['signup_data']["email"] . '">
        <span></span>
        <label>E-Mail</label>
        </div>';
    } else {
        echo '<div class="txt-field">
        <input type="text" name="email" required>
        <span></span>
        <label>E-Mail</label>
        </div>';
    }
}


# shows the signup error, if there is any
function checkSignupErrors() {

    # checks if the session var errors_signup is created
    if (isset($_SESSION['errors_signup'])){

        # if errors_signup exist, it's data will be placed in errors
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
           echo '<p class="txt-field">' . $error . '</p>'; 
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p class="txt-field">Signup success!</p>';
    }
}