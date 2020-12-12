<?php

    include "dbconnect.php";
    session_start();

    if ($_SESSION['user'] != NULL) {
        # code...
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE user_id = '$user'";
        $query = mysqli_query($conn, $sql);

        $user_row = mysqli_fetch_array($query);

        $user_id = $user_row['user_id'];
        $text_post = $_POST['inputText'];
        $image_post = $_FILES['profile']['name'];
        @$temp_name = $_FILES['profile']['tmp_name'];

        $filext = pathinfo($image_post, PATHINFO_EXTENSION);
        $ext = strtoupper($filext);
        #echo $ext;
        #echo $image_post;

        if ($ext == 'PNG' || $ext == 'JPG' || $ext == "JPEG") {
            # code...
            $location = 'uploads/';
            #echo ' '.$tmp_name.$location.$image_post;
            if (move_uploaded_file($temp_name, $location.$image_post)) {
                #echo "Uploaded";
                # code...
                $sql_1 = "INSERT INTO posts(user_id, text_post, image_post) VALUES('$user_id', '$text_post', '$image_post')";
                $query_1 = mysqli_query($conn, $sql_1);

                if ($query_1) {
                    # code...
                    #echo "<script>alert('Uploaded Successfully.....');</script>";
                    header('location: home.php');
                }
            }
            else {
                # code...
                #echo "<script type='text/javascript'>window.alert('Image size is too large!!!');toastr.success('Size is too large!!!');</script>";
                header('location: home.php');
            }
        }
        else {
            echo "<script type='text/javascript'>window.alert('Please Upload png or jpg or jpeg');</script>";
            header('location: home.php');
        }
    }

?>