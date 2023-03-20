<?php
session_start();

//Remove all session variables
session_unset();

//destroy the session
session_destroy();

echo "<script type = 'text/javascript'>
    alert('Logout success!');
    window.location.replace('main.php');</script>";
