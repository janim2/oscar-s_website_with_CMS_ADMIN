<?php
    session_start();
    class ManageAccounts{
        public $username;
        public $password;

        function __construct(){
            $this->username     = $_POST['username'];
            $this->password     = $_POST['password'];
        }

        function Login($con){
            $query = "SELECT * FROM admin_login WHERE username = :un AND password = :password";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":un" => $this->username,
                    ":password" => $this->password
                )
            );

            $count = $statement->rowCount();
            if($count > 0){
               // user is present
               $result = $statement->fetch();
            //    session_start();
               $_SESSION['oscar_portfolio_admin_id']      = $result['id'];
               $_SESSION['oscar_portfolio_admin_name']    = $result['fullname'];
               return 1;

            }else{
                echo "Invalid user credentials";
            }
        }

        function Logout(){
            // unset($_SESSION['name']);
            // session_start();
            session_unset();     // unset $_SESSION variable for the run-time 
            session_destroy(); 
            return 1;
        }
    }
?>