<?php
// Start Session for Persistance
session_start();

// Destroy the Session
session_destroy();

// Redirect User Back to Home Page After Logout
header('Location: index.php');
exit;
?>