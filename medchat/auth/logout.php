<?php
session_start();
require('../includes/dbconn.php');
//logout.php

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
?>