<?php
    session_start();
    require_once '../../helpers/functions.php';
    class ManageTestimony{
        public $testimony_id;
        public $testimony;
        public $speaker;
        public $position;

        function __construct(){
            $this->testimony    = $_POST['testimony'];
            $this->speaker      = $_POST['speaker'];
            $this->position     = $_POST['position'];
        }

        function update_construct(){
            $this->testimony_id   = $_COOKIE['oscar_portfolio_testimony_id'];
            $this->testimony      = $_POST['testimony'];
            $this->speaker        = $_POST['speaker'];
            $this->position       = $_POST['position'];
        }

        function ConfirmPresence($con){
            $query = "SELECT * FROM testimony WHERE testimony = :t AND speaker = :s
                AND position = :p";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":t"   => $this->testimony,
                    ":s"   => $this->speaker, 
                    ":p"   => $this->position, 
                )
            );

            $count = $statement->rowCount();
            if($count > 0){
                echo "Testimony already exists";
            }
            else{
                //add new user
                $this->SaveInfo($con);
            }
        }

        function SaveInfo($con){
            $temp_img_upload_id = random_int(10, 999999);
            $query = "INSERT INTO testimony(testimony, speaker, position, tmp_image_upload_id)
                VALUES(:t, :s, :p, :tmp)";
            $statement = $con->prepare($query);

            $has_added = $statement->execute(
                array(
                    ":t"   => $this->testimony,
                    ":s"   => $this->speaker, 
                    ":p"   => $this->position, 
                    ":tmp" => $temp_img_upload_id,
                )
            );

            if($has_added){
                $this->upload_images($con, fetchTestimonyIdUsingTempImgUploadID($con, $temp_img_upload_id));
                echo 1;
            }
            else{
                echo "Something went wrong";
            }
        }

        function UpdateInfo($con){
            $query = "UPDATE testimony SET testimony = :t, speaker = :s, 
                    position = :p WHERE id = :id";
            $statement = $con->prepare($query);

            $has_added = $statement->execute(
                array(
                    ":t"   => $this->testimony,
                    ":s"   => $this->speaker, 
                    ":p"   => $this->position,  
                    ":id"  => $this->testimony_id,
                )
            );

            if($has_added){
                $this->upload_images($con, fetchBlogPostIdUsingTempImgUploadID($con, $temp_img_upload_id));
                echo 1;
            }
            else{
                echo "Something went wrong";
            }
        }


        function upload_images($con, $post_id){
            extract($_POST);
            $error=array();

            $txtGalleryName = "speakers";
            $images_array = array();

            $img_path = "../../../../Website/img/";

            $extension=array("jpeg","jpg","png","gif");
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                if(in_array($ext,$extension)) {
                    if(!file_exists($img_path.$txtGalleryName."/".$file_name)) {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$img_path.$txtGalleryName."/".$file_name);
                        // echo $file_name;
                        // array_push($images_array, $file_name);
                        $this->SaveToImagesDatabase($con, $post_id, $file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$img_path.$txtGalleryName."/".$newFileName);
                        // echo $file_name;
                        // array_push($images_array, $file_name);
                        $this->SaveToImagesDatabase($con, $post_id, $file_name);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
        }

        function SaveToImagesDatabase($con, $id, $file_name){
            $query = "INSERT INTO speaker_images(testimony_id, image_url) VALUES(:testimony_id, :image_url)";
                $statement = $con->prepare($query);
                $result = $statement->execute(
                    array(
                        ":testimony_id" => $id,
                        ":image_url"    => $file_name,
                    )
                );

                if($result){
                    // echo "success";
                }
                else{
                    echo "Something went wrong";
                }
        }

    }
?>