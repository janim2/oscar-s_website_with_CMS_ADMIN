<?php

    require_once('../config.php');

    if(isset($_POST['id'])){
        $id  = $_POST['id'];
    
        $query = "SELECT * FROM books WHERE id = :id";
        $statement = $con->prepare($query);

        $statement->execute(
            array(
                ":id" => $id,
            )
        );

        $results = $statement->fetch();

        $_array = array();
        $_array['title']        = $results['title'];
        $_array['content']      = $results['description'];
 
        echo json_encode($_array);
    }
    else{
        header('location: ../../403.php');
    }
    
?>