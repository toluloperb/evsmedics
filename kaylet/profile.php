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
                    <?php
                        if(isset($_SESSION['status']))
                        {
                            ?>
                                <div id="fade" class="sessionMsg">
                                    <p><i class="fa fa-info-circle"></i> <?= $_SESSION['status'] ?></p>
                                </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>

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
                        
                        <div class="" id="biller">
                            <div id="accounts">
                                <div class="infos" id="infos">
                                    <p><i>Active Withdrawal Account (you can add upto 4 accounts)</i></p><br>
                                    <?php
                                        $email = $_SESSION['email'];

                                        $select = "SELECT * FROM withdrawal_banks WHERE holder = '$email'";
                                        $select_run = mysqli_query($con, $select);

                                        if(mysqli_num_rows($select_run) > 0)
                                        {
                                            foreach($select_run as $data)
                                            {
                                                ?>
                                                    <form action="../functions/userfunc" method="post">
                                                        <div class="infotab">
                                                            <label for="">Account Name</label>
                                                            <input type="text" value="<?= $data['account_name'] ?>" disabled>
                                                        </div>

                                                        <div class="infotab row">
                                                            <label for="">Account Number</label>
                                                            <input type="text" value="<?= $data['bank_number'] ?>" disabled>
                                                        </div>

                                                        <input type="text" name="id" value="<?= $data['id'] ?>" hidden>

                                                        <div class="infotab row">
                                                            <label for="">Bank Name</label>
                                                            <input type="text" value=<?= $data['bank_name'] ?> disabled>
                                                        </div>
                                                        <button type="submit" class="button" name="removeBank" style="background-color: red; border: none;">Remove</button>
                                                    </form>
                                                    <hr><br>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <p><i class="fa fa-warning"></i> No bank account attached yet</p>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="infos" id="">
                                <p><i>+ Add a new account</i></p><br>
                                <form action="../functions/userfunc" method="post">
                                    <input type="text" name="holder" value="<?= $_SESSION['email'] ?>" name="holder" hidden>
                                    <div class="infotab row">
                                        <label for="">Account Number</label>
                                        <input name="account_number" type="text">
                                    </div>

                                    <div class="infotab row">
                                        <label for="">Bank Name</label>
                                        <input name="bank_name" type="text">
                                    </div>
                                    
                                    <div class="infotab row">
                                        <label for="">Account Name</label>
                                        <input name="account_name" type="text">
                                    </div>

                                    <button type="submit" class="button" name="submitBank" style="background-color: green; border: none;">+ Add New</button>
                                </form>
                            </div>
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