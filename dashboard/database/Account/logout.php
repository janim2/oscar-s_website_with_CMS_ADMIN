<?php
    require_once '../config.php';
    require_once 'manage_account.php';

    // $logout = new ManageAccounts();
    // echo $logout->Logout();
    // session_start();
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy(); 
    echo 1;