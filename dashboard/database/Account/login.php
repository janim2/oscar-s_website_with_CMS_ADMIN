<?php
    require_once '../config.php';
    require_once 'manage_account.php';

    $login = new ManageAccounts();
    $login->__construct();
    echo $login->Login($con);