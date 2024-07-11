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
                    <h3>Admin Dashboard</h3>
                    <div class="row">
                        <div class="button">
                            <?php
                                $count = "SELECT * FROM users";
                                $count_run = mysqli_query($con, $count);

                                if(mysqli_num_rows($count_run) > 0)
                                {
                                    $total = mysqli_num_rows($count_run);
                                }
                                else
                                {
                                    $total = 0;
                                }

                                $counttime = "SELECT * FROM users WHERE date(date) = DATE(CAST(NOW() - INTERVAL 0 DAY AS DATE))";
                                $counttime_run = mysqli_query($con, $counttime);

                                if(mysqli_num_rows($counttime_run) > 0)
                                {
                                    $today = mysqli_num_rows($counttime_run);
                                }
                                else
                                {
                                    $today = 0;
                                }

                                $countweek = "SELECT * FROM users WHERE date(date) = DATE(CAST(NOW() - INTERVAL 1 DAY AS DATE))";
                                $countweek_run = mysqli_query($con, $countweek);

                                if(mysqli_num_rows($countweek_run) > 0)
                                {
                                    $thisweek = mysqli_num_rows($countweek_run);
                                }
                                else
                                {
                                    $thisweek = 0;
                                }
                            ?>
                            <p>Users</p>
                            <h3><?= $total ?></h3>
                            <div class="row no-top">
                                <p class="minitext">&#9679; Today - <?= $today ?></p>
                                <p class="minitext">&#9679; This Week - <?= $thisweek ?></p>
                            </div>
                        </div>

                        <div class="button">
                            <?php
                                $count = "SELECT * FROM transactions";
                                $count_run = mysqli_query($con, $count);

                                if(mysqli_num_rows($count_run) > 0)
                                {
                                    $total = mysqli_num_rows($count_run);
                                }
                                else
                                {
                                    $total = 0;
                                }

                                $counttime = "SELECT * FROM transactions WHERE date(date) = DATE(CAST(NOW() - INTERVAL 0 DAY AS DATE))";
                                $counttime_run = mysqli_query($con, $counttime);

                                if(mysqli_num_rows($counttime_run) > 0)
                                {
                                    $today = mysqli_num_rows($counttime_run);
                                }
                                else
                                {
                                    $today = 0;
                                }
                            ?>
                            <p>Total Transactions</p>
                            <h3><?= $total ?></h3>
                            <div class="row no-top">
                                <p class="minitext">&#9679; New - <?= $today ?></p>
                                <p class="minitext">&#9679; Pending - -</p>
                                <p class="minitext">&#9679; Approved - -</p>
                                <p class="minitext">&#9679; Declined - -</p>
                            </div>
                        </div>

                        <div class="button">
                            <?php
                                $count = "SELECT * FROM complaints";
                                $count_run = mysqli_query($con, $count);

                                if(mysqli_num_rows($count_run) > 0)
                                {
                                    $total = mysqli_num_rows($count_run);
                                }
                                else
                                {
                                    $total = 0;
                                }

                                $counttime = "SELECT * FROM complaints WHERE date(date) = DATE(CAST(NOW() - INTERVAL 0 DAY AS DATE))";
                                $counttime_run = mysqli_query($con, $counttime);

                                if(mysqli_num_rows($counttime_run) > 0)
                                {
                                    $today = mysqli_num_rows($counttime_run);
                                }
                                else
                                {
                                    $today = 0;
                                }
                            ?>
                            <p>Total Complaints</p>
                            <h3><?= $total ?></h3>
                            <div class="row no-top">
                                <p class="minitext">&#9679; Today - <?= $today ?></p>
                                <p class="minitext">&#9679; This Week - -</p>
                            </div>
                        </div>
                    </div>
                    <div class="toppings row mt-20 mb-20">
                        <h4>Available Categories</h4>
                        <?php
                            $selectprod = "SELECT * FROM categories";
                            $selectprod_run = mysqli_query($con, $selectprod);

                            if(mysqli_num_rows($selectprod_run) > 0)
                            {
                                ?>
                                    <a href="categories"><button class="main-color button">See all Categories</button></a>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <a href="addnew?task=category"><button class="main-color button">Add New Categories</button></a>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="row flex-wrap">
                        <?php
                            $selectcate = "SELECT * FROM categories WHERE status='active'";
                            $selectcate_run = mysqli_query($con, $selectcate);

                            if(mysqli_num_rows($selectcate_run) > 0)
                            {
                                foreach($selectcate_run as $data)
                                {
                                    ?>
                                        <a href="view?type=categories&query=<?= $data['id'] ?>" class="mr-20"><div class="column center mb-20">
                                            <img class="small" src="../uploads/<?= $data['images'] ?>" alt="">
                                            <p class="minitext mt-5"><?= $data['name'] ?></p>
                                        </div></a>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <div class="button">
                                        <p>No record!</p>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>

                    <br>

                    <div class="toppings mt-20 mb-20">
                        <h4>Available Products</h4>
                        <?php
                            $selectprod = "SELECT * FROM products";
                            $selectprod_run = mysqli_query($con, $selectprod);

                            if(mysqli_num_rows($selectprod_run) > 0)
                            {
                                ?>
                                    <a href="products"><button class="button">See all Products</button></a>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <a href="addnew?task=product"><button class="button">Add New Products</button></a>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="row flex-wrap">
                        <?php
                            $selectprod = "SELECT * FROM products WHERE status='active'";
                            $selectprod_run = mysqli_query($con, $selectprod);

                            if(mysqli_num_rows($selectprod_run) > 0)
                            {
                                foreach($selectprod_run as $data)
                                {
                                    ?>
                                        <a href="view?type=products&query=<?= $data['id'] ?>" class="mr-20"><div class="column center mb-20">
                                            <img class="small" src="../uploads/<?= $data['image'] ?>" alt="">
                                            <p class="minitext mt-5"><?= $data['name'] ?></p>
                                        </div></a>
                                    <?php

                                }
                            }
                            else
                            {
                                ?>
                                    <div class="button">
                                        <p>No record!</p>
                                    </div>
                                <?php
                            }
                        ?>
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