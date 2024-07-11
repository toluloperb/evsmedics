<?php 
    session_start();
    include('../config/dbcon.php');

    if(isset($_POST['AddCat']))
    {
        $name = $_POST['name'];
        $status = $_POST['status'];

        $path = "../uploads/";

        $imageName = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $insert = "INSERT into categories (name, images, status) VALUES ('$name','$imageName','$status')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            move_uploaded_file($tmp_name, $path.$imageName);

            $_SESSION["status"] = "Added Successfully!";
            header('Location: ../admin/');
            exit();
        }
    }

    else if(isset($_POST['AddCatNew']))
    {
        $name = $_POST['name'];
        $status = $_POST['status'];

        $path = "../uploads/";

        $imageName = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $insert = "INSERT into categories (name, images, status) VALUES ('$name','$imageName','$status')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            move_uploaded_file($tmp_name, $path.$imageName);

            $_SESSION["status"] = "Added Successfully!";
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    else if(isset($_POST['AddProd']))
    {
        $name = $_POST['name'];
        $selling_rate = $_POST['selling_rate'];
        $buying_rate = $_POST['buying_rate'];
        $categories = $_POST['categories'];
        $mode = $_POST['mode'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        $path = "../uploads/";

        $imageName = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $insert = "INSERT into products (name, image, status, selling_rate, buying_rate, categories, mode, type) 
                    VALUES ('$name','$imageName','$status','$selling_rate','$buying_rate','$categories', '$mode', '$type')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            move_uploaded_file($tmp_name, $path.$imageName);

            $_SESSION["status"] = "Added Successfully!";
            header('Location: ../admin/');
            exit();
        }
    }

    else if(isset($_POST['AddProdNew']))
    {
        $name = $_POST['name'];
        $selling_rate = $_POST['selling_rate'];
        $buying_rate = $_POST['buying_rate'];
        $categories = $_POST['categories'];
        $mode = $_POST['mode'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        $path = "../uploads/";

        $imageName = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $insert = "INSERT into products (name, image, status, selling_rate, buying_rate, categories, mode, type) 
                    VALUES ('$name','$imageName','$status','$selling_rate','$buying_rate','$categories', '$mode', '$type')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            move_uploaded_file($tmp_name, $path.$imageName);

            $_SESSION["status"] = "Added Successfully!";
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    else if(isset($_POST['Update']))
    {
        $type = $_POST['type'];
        $id = $_POST['id'];

        $status = $_POST['status'];

        $selling_rate = $_POST['selling_rate'];
        $buying_rate = $_POST['buying_rate'];

        if($type == 'products')
        {
            $updatetype = "UPDATE $type SET status = '$status', selling_rate = '$selling_rate', buying_rate = '$buying_rate' WHERE id = '$id'";
            $updatetypeRun = mysqli_query($con, $updatetype);

            if($updatetypeRun)
            {
                $_SESSION["status"] = "Updated Successfully!";
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        else
        {
            $updatetype = "UPDATE $type SET status = '$status' WHERE id = '$id'";
            $updatetypeRun = mysqli_query($con, $updatetype);

            if($updatetypeRun)
            {
                $_SESSION["status"] = "Updated Successfully!";
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
?>