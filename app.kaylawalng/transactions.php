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
                    <h1>Transactions</h1>
                    <p>Keep tabs on your inflow and outflow.</p>

                    <div class="history">
                        <div class="historyrow">
                            <p class="this">Transaction history</p>
                            <p class="worth">Worth</p>
                            <p class="amount">Expected amount</p>
                            <p class="status">Status</p>
                        </div>
                        <hr>
                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
                        </div>

                        <div class="historyrow eachreport">
                            <p class="this">22nd June 2024 - 09:40am <strong><span>Type of Card Transaction</span></strong></p>
                            <p class="worth">$20</p>
                            <p class="amount">N20,000</p>
                            <p class="status">pending</p>
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