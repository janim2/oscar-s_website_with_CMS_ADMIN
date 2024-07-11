<?php
    require_once '../config.php';
    require_once 'manage_book.php';

    $edit = new ManageBook();
    $edit->update_construct();
    echo $edit->UpdateInfo($con);