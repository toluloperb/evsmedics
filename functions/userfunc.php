<?php 
    include('../config/dbcon.php');

    if(isset($_POST['submitBank']))
    {
        $account_number = $_POST['account_number'];
        $bank_name = $_POST['bank_name'];
        $holder = $_POST['holder'];
        $account_name = $_POST['account_name'];

        $insert = "INSERT INTO withdrawal_banks (bank_number,bank_name,holder,account_name) 
                VALUES ('$account_number','$bank_name','$holder','$account_name')";
        $insert_run = mysqli_query($con, $insert);

        if($insert_run)
        {
            header('Location:' .$_SERVER['HTTP_REFERER']);
        }
    }

    else if(isset($_POST['removeBank']))
    {
        $id = $_POST['id'];

        $delete = "DELETE FROM withdrawal_banks WHERE id = '$id'";
        $delete_run = mysqli_query($con, $delete);

        if($delete_run)
        {
            $_SESSION["status"] = "Deleted Successfully!";
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
?>