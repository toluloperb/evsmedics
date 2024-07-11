<?php
    session_start();
    include('includes/header.php');
?>
<!-- Page title -->
<title>Login | Kaylet</title>

<section class="loginContainer">
    <div class="formContainer">
        <a href="../."><img src="assets/images/kayl logo red&black.png" alt=""></a>
        <h5>Sign in to your account</h5>
        <?php
            if(isset($_SESSION['status']))
            {
                ?>
                    <div id="message_div" class="sessionMsg">
                        <p><i class="fa fa-warning"></i> <?= $_SESSION['status'] ?></p>
                    </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>
        <form action="../functions/adminauth.php" method="post">
            <div>
                <label for="">Username</label>
                <input type="text" name="username" required>
            </div>

            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <a href="recovery"><p>Forgot your password?</p></a>
            <button class="button" name="login_btn" type="submit">Login</button>
            <p class="signup">Don't have an account yet? <a href="register"><span>Sign Up Now</span></a></p>
        </form>
    </div>
    <div class="illustrationContainer">
    <?php
            $time = date("H");
            $timezone = date("e");
            if ($time < "12") 
            {
                ?>
                    <div class="text" style="background: url(assets/images/morning.jpg);">
                        <div>
                            <p>Hello Chief,</p>
                            <h5 class="bigtext">Good morning</h5>
                        </div>
                    </div>
                <?php
            } 
            else if ($time >= "12" && $time < "17") 
            {
                ?>
                    <div class="text" style="background: url(assets/images/afternoon.avif);">
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

<?php include("includes/footer.php") ?>