<?php
    include('includes/header.php');
    include('includes/navbar.php');
?>

<main>
    <section class="introview">
        <div class="bigtextandmini">
            <h1>Convert your <span>Giftcards & Bitcoin</span> to Instant Cash</h1>
            <div class="tradebtns">
                <a href=""><p><i class="fa fa-globe" aria-hidden="true"></i> Trade on Web</p></a>
                <a href=""><p class="whatsapptradebtn"><i class="fa fa-whatsapp" aria-hidden="true"></i> Trade via WhatsApp</p></a>
            </div>
            <div class="tradebtns">
                <p><i class="fa fa-spinner" aria-hidden="true"></i> Coming soon to Apple store & Google playstore</p>
            </div>
        </div>

        <div class="illustration">
            <img src="assets/images/screenimg.png" alt="">
        </div>
    </section>

    <section class="welcome-note" id="rates">
        <div class="part-a">
            <p class="big-text">Welcome!</p>
            <p>Trade your gift cards and cryptocurrencies at reasonable rates. Instant payment, no stress, no stories.</p>
        </div>

        <div class="part-b">
            <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
        </div>
    </section>

    <div class="rateContainer" id="">
        <h1>Amazing rates today. <span>Just for you!</span></h1>
        <div class="rowdisplay">
            <div class="part-a">
                <table>
                    <tr>
                        <th>Products</th>
                        <th>Buy</th>
                        <th>Sell</th>
                    </tr>
                    <tr>
                        <td>Bitcoin</td>
                        <td>850/$</td>
                        <td>2000/$</td>
                    </tr>

                    <tr>
                        <td>Bitcoin</td>
                        <td>850/$</td>
                        <td>2000/$</td>
                    </tr>

                    <tr>
                        <td>Bitcoin</td>
                        <td>850/$</td>
                        <td>2000/$</td>
                    </tr>

                    <tr>
                        <td>Bitcoin</td>
                        <td>850/$</td>
                        <td>2000/$</td>
                    </tr>

                    <tr>
                        <td>Bitcoin</td>
                        <td>850/$</td>
                        <td>2000/$</td>
                    </tr>
                </table>
            </div>
            <div class="part-b">
                <form action="" method="post">
                    <div class="doubleInput">
                        <div>
                            <label for="">Select a digital asset</label>
                            <select name="" id="" required>
                                <option value="" selected>Select</option>
                                <option value="">Bitcoin</option>
                            </select>
                        </div>

                        <div>
                            <label for="">How much will you like to convert?</label>
                            <input type="text" required>
                        </div>
                    </div>
                    <div>
                        <label for="">Expected amount</label>
                        <input type="text" value="NGN20,000,000" readonly>
                    </div>
                    <button class="button" id="how-it-works" type="submit">Quick Calculate</button>
                </form>
            </div>
        </div>
    </div>

    <div class="how-it-works">
        <p class="tags">How it works</p>
        <h1>Our system is fast, safe, reliable & easy to use</h1>

        <div class="how-menu">
            <div class="steps">
                <h2>Onboarding</h2>
                <div class="each-steps">
                    <p class="nos">Step 1</p>
                    <div class="step-details">
                        <h3 class="step-title">Register an account</h3>
                        <p>You can click on the 'Create account' button or 'Get started' button below to register, 
                            fill in your information details in less than 2mins to get on board.</p>
                    </div>
                </div>

                <div class="each-steps">
                    <p class="nos">Step 2</p>
                    <div class="step-details">
                        <h3 class="step-title">Request to trade</h3>
                        <p>Navigate to the transact page to easily make request on what you want to sell. <i>We only 
                            accept Giftcards & Bitcoin at the moment</i></p>
                    </div>
                </div>

                <div class="each-steps">
                    <p class="nos">Step 3</p>
                    <div class="step-details">
                        <h3 class="step-title">Admin Verification</h3>
                        <p>Administrators are always on standby to approve your products. An admin verifies whether 
                            your product is authentic before approving the release of funds into your kaylet (Kaylawal Wallet).</p>
                    </div>
                </div>

                <div class="each-steps">
                    <p class="nos">Step 4</p>
                    <div class="step-details">
                        <h3 class="step-title">Make Withdrawal</h3>
                        <p>You can make withdrawal to your bank account or any designated bank. It's instant.</p>
                    </div>
                </div>
            </div>

            <div class="illustration phone">

            </div>
        </div>
    </div>

    <div id="testimonials"></div>

    <div class="how-it-works testimonials">
        <p class="tags">Testimonials</p>
        <h1>See what people are saying about us.</h1>

        <div class="rateContainer">
            <div class="rateContainerCover">
                <h1 class="big-text">"</h1>
                <p>Kaylawal is a trusted brand that I can recommed to as many as possible.</p>
                <i>- Honorable Dammy</i>
            </div>
        </div>
    </div>
</main>

<?php
    include('includes/footer.php');
?>