<?php

    require_once('../config.php');

    if(isset($_POST['id'])){
        $id  = $_POST['id'];
    
        $query = "SELECT * FROM testimony WHERE id = :id";
        $statement = $con->prepare($query);

        $statement->execute(
            array(
                ":id" => $id,
            )
        );

        $results = $statement->fetch();

        $_array = array();
        $_array['title']        = $results['speaker'];
        $_array['content']      = $results['testimony'];
 
        echo json_encode($_array);
    }
    else{
        header('location: ../../403.php');
    }
    
?>