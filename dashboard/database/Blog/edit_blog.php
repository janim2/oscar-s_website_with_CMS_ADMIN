<?php
    require_once '../config.php';
    require_once 'manage_blog.php';

    $edit = new ManageBlog();
    $edit->update_construct();
    echo $edit->UpdateInfo($con);