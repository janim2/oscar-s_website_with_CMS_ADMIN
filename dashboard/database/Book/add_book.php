<?php
    require_once '../config.php';
    require_once 'manage_book.php';

    $add = new ManageBook();
    $add->__construct();
    echo $add->ConfirmPresence($con);