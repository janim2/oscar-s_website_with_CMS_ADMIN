<?php
    require_once '../config.php';
    require_once 'manage_blog.php';

    $add = new ManageBlog();
    $add->__construct();
    echo $add->ConfirmPresence($con);