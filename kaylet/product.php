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

                                <?php
                                    if(isset($_POST['step1']))
                                    {
                                        $mode_of_transaction = $_POST['mode_of_transaction'];
                                        $quantity = $_POST['quantity'];
                                        
                                        if($mode_of_transaction == 'e-pin' && $quantity > 1)
                                        {
                                            ?>         
                                                <form class="product-form" action="" method="post">           
                                                    <div>
                                                        <label for="">Select Transaction Type</label>
                                                        <select name="transaction_type" onchange="yesnoCheck();">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="with">With Receipt</option>
                                                            <option value="without">Without Receipt</option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label for="">Select Value tag</label>
                                                        <select name="vtag" id="">
                                                            <option value="" selected disabled>$0</option>
                                                            <option value="e-pin">$25</option>
                                                            <option value="physical card">$50</option>
                                                            <option value="physical card">$75</option>
                                                            <option value="physical card">$100</option>
                                                            <option value="physical card">$200</option>
                                                            <option value="physical card">$500</option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label for="">Input your E-Pins(<i>Seperate with comma</i>)</label>
                                                        <input type="text" name="quantity">
                                                    </div>

                                                    <div id="ifYes" style="display: none;">
                                                        <label for="">Upload Receipt</label>
                                                        <input type="file" name="recipt" id="">
                                                    </div>
                                                </form>   
                                            <?php
                                        }
                                        else if($mode_of_transaction == 'e-pin' && $quantity = 1)
                                        {
                                            ?>         
                                                <form class="product-form" action="" method="post"> 
                                                    <div>
                                                        <label for="">Select Mode of Card transaction</label>
                                                        <select name="mode_of_transaction" id="">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="e-pin">E-Pin</option>
                                                            <option value="physical card">Physical Card</option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label for="">Input your E-Pin</label>
                                                        <input type="text" name="quantity">
                                                    </div>
                                                </form>   
                                            <?php   
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <form class="product-form" action="" method="post">
                                                <div>
                                                    <label for="">Select Mode of Card transaction</label>
                                                    <select name="mode_of_transaction" id="">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="e-pin">E-Pin</option>
                                                        <option value="physical card">Physical Card</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="">Quantity</label>
                                                    <input type="number" name="quantity">
                                                </div>
                                                <button type="submit" name="step1" class="button">Continue</button>
                                            </form>
                                        <?php
                                    }
                                ?>
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