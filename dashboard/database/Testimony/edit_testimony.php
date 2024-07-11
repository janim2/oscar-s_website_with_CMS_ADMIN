<?php
    require_once '../config.php';
    require_once 'manage_testimony.php';

    $edit = new ManageTestimony();
    $edit->update_construct();
    echo $edit->UpdateInfo($con);