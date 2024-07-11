<?php
    require_once '../config.php';

    $del = new RemoveTestimony();
    echo $del->DeleteTestimony($con, $_COOKIE['oscar_portfolio_testimony_id']);

    class RemoveTestimony {
        function DeleteTestimony($con, $id){
            $query = "DELETE FROM testimony WHERE id = :id";
            $statement = $con->prepare($query);

            $has_added = $statement->execute(
                array(
                    ":id"   => $id,
                )
            );

            if($has_added){
                echo 1;
            }
            else{
                echo "Something went wrong";
            }
        }
    }