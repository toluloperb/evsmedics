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