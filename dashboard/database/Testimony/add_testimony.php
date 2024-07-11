<?php
    require_once '../config.php';
    require_once 'manage_testimony.php';

    $add = new ManageTestimony();
    $add->__construct();
    echo $add->ConfirmPresence($con);