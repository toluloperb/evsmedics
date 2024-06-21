<?php
    session_start();
    include('../config/dbcon.php');

    if(isset($_POST['login_btn']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM users WHERE username = '$username' OR email = '$username' AND password = '$password' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            foreach($login_query_run as $data)
            {
                $user_id = $data['id'];
                $fullname = $data['fullname'];
                $email = $data['email'];
                $username = $data['username'];
                $phone = $data['phone'];
            }

            $_SESSION['auth'] = true;
            $_SESSION['auth_fullname'] = "$fullname";
            $_SESSION['email'] = "$email";
            $_SESSION['username'] = "$username";
            $_SESSION['phone'] = "$phone";

            if($_SESSION['auth'])
            {
                $_SESSION["status"] = "Welcome to your KayWallet(Kaylawal Wallet)";
                header("Location: ../kaylet");
                exit();
            }
        }
        else
        {
            $_SESSION["status"] = "Username or Password Incorrect";
            header("Location: ../kaylet/login");
            exit();
        }
    }
    else
    {
        $_SESSION["status"] = "Login to continue";
        header("Location: ../kaylet/login");
        exit();
    }
