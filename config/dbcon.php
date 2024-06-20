<?php

    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "kaylawal";

    $host = "localhost";
    $username = "kaylxpdy_kaylawalUserbility";
    $password = "Trodpen2022*";
    $database = "kaylxpdy_kaylawal";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
	{
		die("Connection failed: ". mysqli_connect_error());
	}
?>