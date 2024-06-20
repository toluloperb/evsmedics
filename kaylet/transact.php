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
                    <h1>Products</h1>
                    <p>Select any of our available products and transact.</p>

                    <div class="history">
                        <div class="historyrow menurow">
                            <p id="cardsBtn" class="active">Cards</p>
                            <p id="btcBtn" class="">Crypto Currencies</p>
                            <p id="billBtn" class="">Bill Payment</p>
                        </div>
                        <hr>
                        <div class="services products" id="cards">
                            <div class="servicesrow" >
                                <a href="product?q=Vanilla Gift Card"><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>Vanilla Gift Card</p>
                                </div></a>

                                <a href="product?q=iTunes Gift Card"><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>iTunes Gift Card</p>
                                </div></a>

                                <a href="product?q=Google Card"><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>Google Card</p>
                                </div></a>

                                <a href="product?q=Nike Card"><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>Nike Card</p>
                                </div></a>

                                <a href="product?q=Amazon Gift Card"><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>Amazon Gift Cards</p>
                                </div></a>

                                <a href="product?q=XBox Gift Card"><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>XBox Gift Card</p>
                                </div></a>
                            </div>
                        </div>

                        <div class="services products" id="btc">
                            <div class="servicesrow" >
                                <a href="product?q=Bitcoin"><div class="eachservices">
                                    <img src="assets/images/bitcoin.png" alt="">
                                    <p>Bitcoin</p>
                                </div></a>

                                <a href="product?q=Sabicoin"><div class="eachservices">
                                    <img src="assets/images/bitcoin.png" alt="">
                                    <p>Sabicoin</p>
                                </div></a>
                            </div>
                        </div>

                        <div class="services products" id="biller">
                            <div class="servicesrow" >
                                <a href=""><div class="eachservices">
                                    <img src="assets/images/card.png" alt="">
                                    <p>IKEDC</p>
                                </div></a>
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