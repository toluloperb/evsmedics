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
                <?php
                    if(isset($_GET['q']))
                    {
                        ?>
                            <div class="mainContainer">
                                <h1>Trade <?= $_GET['q'] ?></h1>
                                <p class="bigMiniText">for Instant Cash</p>
                                <img src="assets/images/card.png" alt="">                                
                            </div>
                        <?php
                    }
                ?>
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