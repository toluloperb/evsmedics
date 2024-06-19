<?php
    session_start();
    include('includes/header.php');
    include('../config/dbcon.php');
?>
<!-- Page title -->
<title>Login | Kaylet</title>

<section class="loginContainer">
    <div class="formContainer">
        <a href="../."><img src="assets/images/kayl logo red&black.png" alt=""></a>
        <?php
            if(isset($_POST['recover']))
            {
                $email = $_POST['email'];
                $vcode = rand(000000, 999999);

                $update = "UPDATE users SET vcode = '$vcode' WHERE email = '$email'";
                $update_run = mysqli_query($con, $update);

                if($update_run)
                {
                    ?>
                        <h5>A verification code has been sent to your email</h5>
                        <form action="" method="post">
                            <input type="text" name="email" value="<?= $email ?>" hidden>
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
                $vcode = $_POST['vcode'];
                $email = $_POST['email'];

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
                                    <button class="button" name="retrieve" id="myButton" type="submit">Complete</button>
                                    <p style="margin-bottom: 0;" class="signup">Already have an account? <a href="login"><span>Login</span></a></p>
                                </form>
                            <?php
                        }
                        else if($existing_vcode == '')
                        {
                            ?>
                                <p><i class="fa fa-exclamation-triangle"></i> Session Ended</p>
                            <?php
                        }
                    }
                }
            }
            else if(isset($_POST['retrieve']))
            {
                $password = $_POST['password'];
                $email = $_POST['email'];
                $cpassword = $_POST['cpassword'];

                if($cpassword == $password)
                {
                    $update = "UPDATE users SET password = '$password', vcode = '' WHERE email = '$email'";
                    $update_run = mysqli_query($con, $update);

                    if($update_run)
                    {
                        header("Location: login");
                    }
                }
            }
            else 
            {
                ?>
                    <h5>Password Recovery</h5>
                    <form action="" method="post">
                        <p style="color: var(--dark); font-size: 11pt;">Enter your email address to recover your password</p>
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <button class="button" name="recover" type="submit">Recover My Password</button>
                        <p class="signup">Don't have an account yet? <a href="register"><span>Sign Up Now</span></a></p>
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
                    <div class="text">
                        <p>Hello Chief,</p>
                        <h5 class="bigtext">Good morning</h5>
                    </div>
                <?php
            } 
            else if ($time >= "12" && $time < "17") 
            {
                ?>
                    <div class="text">
                        <p>Hello Chief,</p>
                        <h5 class="bigtext">Good afternoon</h5>
                    </div>
                <?php
            } 
            else if ($time >= "17" && $time < "23") 
            {
                ?>
                    <div class="text">
                        <p>Hello Chief,</p>
                        <h5 class="bigtext">Good evening</h5>
                    </div>
                <?php
            } 
            else if ($time >= "23") 
            {
                ?>
                    <div class="text">
                        <div class="text">
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