<?php
    session_start();
    include('../config/dbcon.php');
    include('includes/header.php');
    include('includes/navbar.php');

    if (isset($_SESSION['auth']))
    {
        if(isset($_POST['saveBtn']))
        {
            $phone = $_POST['phone'];
            $email =$_SESSION["email"];

            $update = "UPDATE users SET phone = '$phone' WHERE email = '$email'";
            $update_run = mysqli_query($con, $update);
        }

        ?>
            <main>
                <?php include('includes/sidebar.php'); ?>
                <div class="mainContainer">
                    <h1>Profile</h1>
                    <p>Personal information. KYC Details.</p>

                    <div class="history">
                        <div class="historyrow menurow">
                            <p id="cardsBtn" class="active">Personal Details</p>
                            <p id="btcBtn" class="">Security</p>
                            <p id="billBtn" class="">Withdrawals</p>
                        </div>
                        <hr>
                        <div class="infos" id="cards">
                            <?php
                                $email = $_SESSION['email'];
                                $details = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
                                $details_run = mysqli_query($con, $details);

                                if($details_run)
                                {
                                    foreach($details_run as $items)
                                    {
                                        ?>
                                            <form action="" method="post">
                                                <div class="infotab row">
                                                    <label for="">Full Name</label>
                                                    <input type="text" value="<?= $items['fullname'] ?>" disabled>
                                                </div>

                                                <div class="infotab row">
                                                    <label for="">Email</label>
                                                    <input type="text" value="<?= $items['email'] ?>" disabled>
                                                </div>

                                                <div class="infotab row">
                                                    <label for="">Username</label>
                                                    <input type="text" value="<?= $items['username'] ?>" disabled>
                                                </div>

                                                <div class="infotab row">
                                                    <label for="">Phone/Contact Number</label>
                                                    <input type="text" class="theInput" name="phone" id="phoneEdit" value="<?= $items['phone'] ?>">
                                                    <p id="makeChanges" class="button">Edit</p>
                                                    <button id="saveBtn" type="submit" name="saveBtn" class="button" style="background-color: green; border: none; display: none;">Save</button>
                                                </div>
                                            </form>
                                        <?php
                                    }
                                }
                            ?>
                        </div>

                        <div class="infos" id="btc">
                            <form action="" method="post">
                                <div class="infotab row">
                                    <label for="">Set New Password</label>
                                    <input type="password" required>
                                </div>

                                <div class="infotab row">
                                    <label for="">Confirm Password</label>
                                    <input type="password" required>
                                </div>

                                <button type="submit" class="button" style="background-color: green; border: none;">Save</button>
                            </form>
                        </div>

                        <div class="infos" id="biller">
                            <p><i>Active Withdrawal Account</i></p><br>
                            <form action="" method="post">
                                <div class="infotab row">
                                    <label for="">Account Name</label>
                                    <input type="text" value="OKON IMOLE OMOLILE" disabled>
                                </div>

                                <div class="infotab row">
                                    <label for="">Account Number</label>
                                    <input type="text" value="2126376251" disabled>
                                </div>

                                <div class="infotab row">
                                    <label for="">Bank Name</label>
                                    <input type="text" value="ZENITH BANK" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        <?php
    }
    else
    {
        header("Location: login");
        exit();
    }
?>

<?php include('includes/footer.php'); ?>