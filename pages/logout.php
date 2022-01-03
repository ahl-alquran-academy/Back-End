<?php

session_start(); //to continue my section

session_unset(); // to unset The Data in session

session_destroy(); //destroy the session

header("Location:../index.php");

exit();