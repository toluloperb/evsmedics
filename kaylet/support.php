<?php
    session_start();
    include('../config/dbcon.php');
    include('includes/header.php');
    include('includes/navbar.php');

    if (isset($_SESSION['auth']))
    {
        ?>
            <main>
                <?php include('includes/sidebar.php'); ?>
                <div class="mainContainer">
                    <h1>Customer Support</h1>
                    <p>We’ve got your back 24/7. Get in touch using any of the means below.</p>

                    <div class="supportContainer">
                        <p class="button"><i class="fa fa-phone"></i> Phone Call</p>
                        <p class="button"><i class="fa fa-inbox"></i> Send a mail to support</p>
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