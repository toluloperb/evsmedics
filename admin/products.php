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
                    <div class="toppings row">
                        <h3>Products</h3>
                        <a href="addnew?task=product"><button class="button main-color">Add New</button></a>
                    </div>

                    <div class="row flex-wrap">
                        <?php
                            $selectprod = "SELECT * FROM products";
                            $selectprod_run = mysqli_query($con, $selectprod);

                            if(mysqli_num_rows($selectprod_run) > 0)
                            {
                                foreach($selectprod_run as $data)
                                {
                                    ?>
                                        

                                        <?php
                                            $status = $data['status'];

                                            if($status == 'active')
                                            {
                                                ?>
                                                    <a href="view?type=products&query=<?= $data['id'] ?>" class="mr-20"><div style="border: 1px solid green;" class="column center mb-20">
                                                        <img class="small" src="../uploads/<?= $data['image'] ?>" alt="">
                                                        <p class="minitext mt-5"><?= $data['name'] ?></p>
                                                    </div></a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <a href="view?type=products&query=<?= $data['id'] ?>" class="mr-20"><div class="column center mb-20">
                                                        <img class="small" src="../uploads/<?= $data['image'] ?>" alt="">
                                                        <p class="minitext mt-5"><?= $data['name'] ?></p>
                                                    </div></a>
                                                <?php
                                            }
                                        ?>
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