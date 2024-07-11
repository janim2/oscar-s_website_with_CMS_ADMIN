<?php
    session_start();
    require_once '../../helpers/functions.php';
    class ManageBook{
        public $book_id;
        public $title;
        public $image;
        public $description;
        public $link;
        public $date_published;

        function __construct(){
            $this->title             = $_POST['title'];
            $this->description       = $_POST['description'];
            $this->link              = $_POST['link'];
            $this->date_published    = $_POST['date_published'];
        }

        function update_construct(){
            $this->book_id              = $_COOKIE['oscar_portfolio_book_id'];
            $this->title                = $_POST['title'];
            $this->description          = $_POST['description'];
            $this->link                 = $_POST['link'];
            $this->date_published       = $_POST['date_published'];
        }

        function ConfirmPresence($con){
            $query = "SELECT * FROM books WHERE title = :ti AND description = :d AND amazon_link = :link
                AND date_published = :dp";
            $statement = $con->prepare($query);
            $statement->execute(
                array(
                    ":ti"   => $this->title,
                    ":d"    => $this->description, 
                    ":link" => $this->link,
                    ":dp"   => $this->date_published, 
                )
            );

            $count = $statement->rowCount();
            if($count > 0){
                echo "Book already exists";
            }
            else{
                //add new user
                $this->SaveInfo($con);
            }
        }

        function SaveInfo($con){
            $temp_img_upload_id = random_int(10, 999999);

            $query = "INSERT INTO books(title, description, date_published, amazon_link, 
                tmp_image_upload_id)
                VALUES(:ti, :d, :dp, :link, :tmp)";
            $statement = $con->prepare($query);

            $has_added = $statement->execute(
                array(
                    ":ti"   => $this->title,
                    ":d"    => $this->description, 
                    ":dp"   => $this->date_published,
                    ":link" => $this->link, 
                    ":tmp"  => $temp_img_upload_id,
                )
            );

            if($has_added){
                $this->upload_images($con, fetchBookPostIdUsingTempImgUploadID($con, $temp_img_upload_id));
                echo 1;
            }
            else{
                echo "Something went wrong";
            }
        }

        function UpdateInfo($con){
            $query = "UPDATE books SET title = :ti, description = :d, amazon_link = :link, 
                    date_published = :dp WHERE id = :id";
            $statement = $con->prepare($query);

            $has_added = $statement->execute(
                array(
                    ":ti"   => $this->title,
                    ":d"    => $this->description, 
                    ":link" => $this->link,
                    ":dp"   => $this->date_published, 
                    ":id"   => $this->book_id,
                )
            );

            if($has_added){
                echo 1;
            }
            else{
                echo "Something went wrong";
            }
        }


        function upload_images($con, $post_id){
            extract($_POST);
            $error=array();

            $txtGalleryName = "books";
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
            $query = "INSERT INTO book_images(book_id, image_url) VALUES(:book_id, :image_url)";
                $statement = $con->prepare($query);
                $result = $statement->execute(
                    array(
                        ":book_id"      => $id,
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