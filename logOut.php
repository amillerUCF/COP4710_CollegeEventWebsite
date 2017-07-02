<?php

// Begin the session
session_start();

// unset session vars.
session_unset();

// destroy session.
session_destroy();


// return home.
header('Location: loginPage.php');
?>