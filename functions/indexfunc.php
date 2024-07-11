<?php 
    session_start();
    include('../config/dbcon.php');

    $asset = $_POST['asset'];
    $amount = $_POST['amount'];

    $selectasset = "SELECT * FROM products WHERE id = '$asset' LIMIT 1";
    $selectasset_run = mysqli_query($con, $selectasset);

    if($selectasset_run)
    {
        foreach($selectasset_run as $data)
        {
            $rate = $data['buying_rate'];

            $estimate = $amount*$rate;
        }

        echo $_SESSION["status"] = "$estimate";
    }
    
?>