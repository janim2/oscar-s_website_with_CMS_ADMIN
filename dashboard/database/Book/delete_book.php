<?php
    require_once '../config.php';

    $del = new RemoveBook();
    echo $del->DeleteBook($con, $_COOKIE['oscar_portfolio_book_id']);

    class RemoveBook {
        function DeleteBook($con, $id){
            $query = "DELETE FROM books WHERE id = :id";
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