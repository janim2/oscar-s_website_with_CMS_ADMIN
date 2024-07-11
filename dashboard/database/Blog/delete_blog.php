<?php
    require_once '../config.php';

    $del = new RemoveProject();
    echo $del->DeleteProject($con, $_COOKIE['oscar_portfolio_blog_id']);

    class RemoveProject {
        function DeleteProject($con, $id){
            $query = "DELETE FROM blogs WHERE id = :id";
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