<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kaylawal";

    // $host = "localhost";
    // $username = "alphonzt_fibe";
    // $password = "Trodpen2022*";
    // $database = "alphonzt_fibe";

    $con = mysqli_connect($host, $username, $password, $database);

    if(!$con)
	{
		die("Connection failed: ". mysqli_connect_error());
	}
?>