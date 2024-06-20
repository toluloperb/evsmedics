<?php
    session_start();
    include('includes/header.php');
    include('../config/dbcon.php');
?>
<!-- Page title -->
<title>Create an account | Kaylet</title>

<section class="loginContainer">
    <div class="formContainer">
        <a href="../."><img src="assets/images/kayl logo red&black.png" alt=""></a>
        <?php
            if(isset($_POST['continue']))
            {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $vcode = rand(000000, 999999);

                $insert = "INSERT into users (fullname, email, username, vcode) VALUES ('$fullname','$email','$username','$vcode')";
                $insert_run = mysqli_query($con, $insert);

                if($insert_run)
                {
                    $to = "$email";
                    $subject = "Almost done! Your Verification code is delivered.";

                    $message = "
                        <html>
                        <body style=\"@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap'); font-family: 'Rubik', 'San-serif';\">
                            <div style=\"width: 100%; height: 100%;margin: 0;
                                padding: 10%;
                                -moz-box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                box-sizing: border-box;
                                justify-content: center;\">
                                <div style=\"width: 100%; height: auto; border-radius: 10px;\">
                                    <img style=\"width: 100%;\" src=\"https://kaylawalng.com/assets/images/img2.png\" alt=\"\">
                                </div>

                                <div style=\"width: 100%;\">
                                    <p style=\"font-size: 12pt; margin: 5%\">Hello $fullname</p>
                                </div>

                                <div style=\"width: 100%; margin: 5%\">
                                    <p style=\"font-size: 12pt; \">You are almost done! One more step and you're onboard.</p>
                                </div>

                                <div style=\"width: 100%;margin: 5%\">
                                    <p style=\"font-size: 12pt; \">Kindly copy the verification code below</p>
                                    <p style=\"font-size: 12pt;\">Verification code is $vcode.</p>
                                </div>

                                <div style=\"width: 100%; text-align: center\">
                                    <h1 style=\"font-size: 25pt; margin: 5%; color: #8e0000\">$vcode</h1>
                                </div>
                                <hr>
                                <div style=\"width: 100%; margin: 5%;\">
                                    <p style=\"font-size: 12pt;\">With KAYLET (Kaylawal Wallet) you can now:</p>
                                    <div style=\"width: 70%; display: flex; flex-direction: row; flex-wrap: no-wrap; align-items: center; margin-bottom: 10px;\">
                                        <img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"https://kaylawalng.com/assets/images/bitcoinMail.png\" alt=\"\">
                                        <p style=\"font-size: 10pt;\">Convert your bitcoin and all other crypto currencies to instant cash.</p>
                                    </div>

                                    <div style=\"width: 70%; display: flex; flex-direction: row; flex-wrap: no-wrap; align-items: center; margin-bottom: 10px;\">
                                        <img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"https://kaylawalng.com/assets/images/gift-voucher.png\">
                                        <p style=\"font-size: 10pt;\">Convert your gift cards to cash.</p>
                                    </div>

                                    <div style=\"width: 70%; display: flex; flex-direction: row; flex-wrap: no-wrap; align-items: center; margin-bottom: 10px;\">
                                        <img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"https://ci3.googleusercontent.com/meips/ADKq_NZeND5jKEBkWbaKegrpz1eUzC-llu-zTPGUrdX3ie3WTQmemDZmoVLRtnjTlCojW4SfOyj5OAu92hSuRyGRrHEkgc5l-kvdFcWr6EEzUwsAzBzRhNEJDT2253xckETvgBXRQTlf3bXBlu-bG4Ar3Rvys0aun6xHc47c-3pdCXucCLbvqE_GC_Fk_Q=s0-d-e1-ft#http://cdn.mcauto-images-production.sendgrid.net/2d4f01da7927a96a/0a282ae3-ccf1-4bd0-8164-4165bc929362/2160x2160.jpg\" alt=\"\">
                                        <p style=\"font-size: 10pt;\">Pay your Utility bills with ease.</p>
                                    </div>

                                    <div style=\"width: 70%; display: flex; flex-direction: row; flex-wrap: no-wrap; align-items: center; margin-bottom: 10px;\">
                                        <img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"https://kaylawalng.com/assets/images/iphone.png\">
                                        <p style=\"font-size: 10pt;\">Top up your airtime and renew your internet subscription.</p>
                                    </div>
                                </div>

                                <hr>

                                <div style=\"width: 100%; border-radius: 10px; padding-top: 5px; padding-bottom: 1px; margin-top: 5%; background: #ffeded;\">
                                    <p style=\"margin: 2%; font-size: 9pt;\">To learn more about our products and services, <a href=\"https://kaylawalng.com\">click here</a> or contact us 
                                        at <a href=\"mailto: support@kaylawalng.com\">support@kaylawalng.com</a> or send us a WhatsApp message at <a href=\"http://wa.me/08145033094\">+234 814 5033 094</a></p>
                                </div><br>
                                
                                <div style=\"display: flex; flex-direction: row;\">
                                    <a href=\"\"><img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"assets/images/facebook.png\"></a>
                                    <a href=\"\"><img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"assets/images/instagram.png\"></a>
                                    <a href=\"\"><img style=\"width: 40px; height: 40px; margin-right: 20px;\" src=\"assets/images/twitter.png\"></a>
                                </div><br><br><br><br><br>
                            </div>
                        </body>
                        </html>
                    ";

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

                    // More headers
                    $headers .= 'From: KaylawalNG <register@kaylawalng.com>' . "\r\n";
                    $headers .= 'Cc: admin@kaylawalng.com' . "\r\n";

                    $mailprocess = mail($to,$subject,$message,$headers);
            
                    if($mailprocess)
                    {
                        ?>
                            <h5>A verification code has been sent to your email</h5>
                            <form action="" method="post">
                                <input type="text" name="fullname" value="<?= $fullname ?>" hidden>
                                <input type="text" name="email" value="<?= $email ?>" hidden>
                                <input type="text" name="username" value="<?= $username ?>" hidden>
                                <div>
                                    <label for="">Verification code</label>
                                    <input type="text" name="vcode" required>
                                </div>
                                <button class="button" name="verify" type="submit">Continue</button>
                                <p style="margin-bottom: 0;" class="signup">Already have an account? <a href="login"><span>Login</span></a></p>
                            </form>
                        <?php
                    }
                    else
                    {
                        ?>
                            <style>
                                    body{
                                        padding: 0;
                                        margin: 0;
                                        font-family: 'Sora', sans-serif;
                                    }
                                    .registerationContainer {
                                        width: 100%;
                                        height: 100%;
                                        position: absolute;
                                        background-color: #2222;
                                        display: flex;
                                        align-items: center;
                                        justify-content: space-around;
                                    }
                                    .formContainer {
                                        width: 400px;
                                        height: auto;
                                        background-color: var(--main-color);
                                        /* margin-left: 25%; */
                                        padding: 3%;
                                        border-radius: 10px;
                                        text-align: center;
                                    }
                                    h3 {
                                        color: #fff;
                                        margin: 0;
                                    }
                                    .formContainer button {
                                        padding: 8px 16px 8px 16px;
                                        border: none;
                                        margin-top: 15px;
                                        border-radius: 5px;
                                        background: #fff;
                                    }
                                </style>
                                <div class="registerationContainer">
                                    <div class="formContainer">
                                        <h3>Error</h3>
                                        <br>
                                        <button onclick="history.back()">Go back</button>
                                    </div>
                                </div>
                        <?php
                    }
                }
            }

            else if(isset($_POST['verify']))
            {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $vcode = $_POST['vcode'];

                // Check Vcode
                $check_vcode = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                $check_vcode_run = mysqli_query($con, $check_vcode);

                if($check_vcode_run)
                {
                    foreach($check_vcode_run as $item)
                    {
                        $existing_vcode = $item['vcode'];

                        if($vcode == $existing_vcode)
                        {
                            ?>
                                <h5>Almost done! Secure your account</h5>
                                <form action="" method="post">
                                    <input type="text" name="email" value="<?= $email ?>" hidden>
                                    <div>
                                        <label for="">New password</label>
                                        <input type="password" name="password" id="password" required onkeyup='check()'>
                                    </div>

                                    <div>
                                        <label for="">Confirm new password</label>
                                        <input type="password" name="cpassword" id="checkPassword" required onkeyup='check()'>
                                    </div>
                                    <p id="alertPassword"></p>
                                    <button class="button" name="register" id="myButton" type="submit">Complete</button>
                                    <p style="margin-bottom: 0;" class="signup">Already have an account? <a href="login"><span>Login</span></a></p>
                                </form>
                            <?php
                        }
                    }
                }
            }
            else if(isset($_POST['register']))
            {
                $password = $_POST['password'];
                $email = $_POST['email'];
                $cpassword = $_POST['cpassword'];

                if($cpassword == $password)
                {
                    $check_password = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                    $check_password_run = mysqli_query($con, $check_password);

                    if($check_password_run)
                    {
                        foreach($check_password_run as $item)
                        {
                            $pass = $item['password'];

                            if($pass == '')
                            {
                                $update = "UPDATE users SET password = '$password' WHERE email = '$email'";
                                $update_run = mysqli_query($con, $update);

                                if($update_run)
                                {
                                    header("Location: login");
                                }
                            }
                            else
                            {
                                header("Location: recovery");
                            }
                        }
                    }
                }
            }

            else
            {
                ?>
                    <h5>Create an account in just 1 minute</h5>
                    <form action="" method="post">
                        <div>
                            <label for="">Full name</label>
                            <input type="text" name="fullname" required>
                        </div>

                        <div>
                            <label for="">Email</label>
                            <input type="text" name="email" required>
                        </div>

                        <div>
                            <label for="">Username</label>
                            <input type="text" name="username" required>
                        </div>
                        <button class="button" name="continue" type="submit">Continue</button>
                        <p style="margin-bottom: 0;" class="signup">Already have an account? <a href="login"><span>Login</span></a></p>
                    </form>
                <?php
            }
        ?>
    </div>
    <div class="illustrationContainer">
        <?php
            $time = date("H");
            $timezone = date("e");
            if ($time < "12") 
            {
                ?>
                    <div class="text" style="background: url(assets/images/morning.jpg);">
                        <div style="opacity: 80%;">
                            <p>Hello Chief,</p>
                            <h5 class="bigtext">Good morning</h5>
                        </div>
                    </div>
                <?php
            } 
            else if ($time >= "12" && $time < "17") 
            {
                ?>
                    <div class="text">
                        <div>
                            <p>Hello Chief,</p>
                            <h5 class="bigtext">Good afternoon</h5>
                        </div>
                    </div>
                <?php
            } 
            else if ($time >= "17" && $time < "23") 
            {
                ?>
                    <div class="text">
                        <div>
                            <p>Hello Chief,</p>
                            <h5 class="bigtext">Good evening</h5>
                        </div>
                    </div>
                <?php
            } 
            else if ($time >= "23") 
            {
                ?>
                    <div class="text">
                        <div>
                            <p>Hello Chief,</p>
                            <h5 class="bigtext">Good night</h5>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</section>

<?php include('includes/footer.php'); ?>