<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy session data on server
session_destroy();

// Delete the session cookie in browser
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

echo "Session reset! <a href='index.php'>Go back</a>";
