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
                        <h3>Categories</h3>
                        <a href="addnew?task=category"><button class="button main-color">Add New</button></a>
                    </div>

                    <div class="row flex-wrap">
                        <?php
                            $selectcate = "SELECT * FROM categories";
                            $selectcate_run = mysqli_query($con, $selectcate);

                            if(mysqli_num_rows($selectcate_run) > 0)
                            {
                                foreach($selectcate_run as $data)
                                {
                                    ?>
                                        <?php
                                            $status = $data['status'];

                                            if($status == 'active')
                                            {
                                                ?>
                                                    <a href="view?type=categories&query=<?= $data['id'] ?>" class="mr-20"><div style="border: 1px solid green;" class="column center mb-20">                                            
                                                        <img class="small" src="../uploads/<?= $data['images'] ?>" alt="">
                                                        <p class="minitext mt-5"><?= $data['name'] ?></p>
                                                    </div></a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <a href="view?type=categories&query=<?= $data['id'] ?>" class="mr-20"><div class="column center mb-20">                                            
                                                        <img class="small" src="../uploads/<?= $data['images'] ?>" alt="">
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