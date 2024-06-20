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
                    <div class="toppings balanceContainer">
                        <div class="part-a">
                            <p>Welcome <strong><?= $_SESSION['auth_fullname'] ?></strong></p>
                            <p>Wallet Balance</p>
                            <h1>N200,000,000.00</h1>
                            <a href=""><button class="button" style="margin-top: 15px; background: var(--white); color: var(--main-color); float: right;">Withdraw</button></a>
                        </div>

                        <div class="part-b">
                            <h1>Convert your Cards & Cryptocurrencies into Instant cash</h1>
                            <a href="transact"><button class="button" style="margin-top: 15px; background: var(--transparent); border: 1px solid var(--transparent); color: var(--main-color);">Start trading</button></a>
                        </div>
                    </div>

                    <div class="services">
                        <p>What will you like to transact today?</p>
                        <div class="servicesrow servicesCardContainer">
                            <a href="transact"><div class="eachservices servicesCard">
                                <img src="assets/images/bitcoin.png" alt="">
                                <p>Convert Bitcoin to Cash</p>
                            </div></a>

                            <a href="transact"><div class="eachservices servicesCard">
                                <img src="assets/images/card.png" alt="">
                                <p>Convert Giftcards to Cash</p>
                            </div></a>

                            <a href=""><div class="eachservices servicesCard">
                                <img src="assets/images/receipt.png" alt="">
                                <p>Bill Payments</p>
                            </div></a>
                        </div>
                    </div>

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
                            <p class="this">Transaction history</p>
                            <p class="worth">Worth</p>
                            <p class="amount">Expected amount</p>
                            <p class="status">Status</p>
                        </div>
                    </div>
                    <a href="transactions"><button class="button morehistory">More</button></a>
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