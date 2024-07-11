<?php
    function upComingAppointments($con){
        $count = 0;
        $query = "SELECT * FROM appointments";
        $statement = $con->prepare($query);

        $statement->execute();
        $counter = $statement->rowCount();

        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($counter > 0 && !empty($rows)){
            foreach($rows as $results){
                // echo verifyDate($results['date']);
                if(verifyDate($results['date']) != 1){
                    $count;
                }
            }
            return $count;
        }
        else{
            return $count;
        }
    }
?>