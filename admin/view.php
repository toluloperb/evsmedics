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
                    <?php
                        if(isset($_GET['type']) && ($_GET['query']))
                        {
                            $type = $_GET['type'];
                            $query = $_GET['query'];
                            ?>
                                <h3>View and Update <?= $type ?></h3>
                                <?php
                                    $selectprod = "SELECT * FROM $type WHERE id = '$query'";
                                    $selectprod_run = mysqli_query($con, $selectprod);

                                    if(mysqli_num_rows($selectprod_run) > 0)
                                    {
                                        foreach($selectprod_run as $data)
                                        {
                                            ?>
                                                <div class="mt-20 padding-20">
                                                    <p>Update information for <?= $data['name'] ?></p>
                                                    <form action="../functions/adminfunc" method="post" enctype="multipart/form-data" class="mt-20">
                                                        <div class="row">
                                                            <div class="column no-padding w-100 mr-20">
                                                                <label class="label">Name of <?= $type ?></label>
                                                                <input type="text" name="name" readonly value="<?= $data['name'] ?>" class="w-100 input min-height" required>
                                                            </div>

                                                            <div class="column no-padding w-100 mr-20">
                                                                <label class="label">Set Status</label>
                                                                <select name="status" id="" class="w-100 input min-height">
                                                                    <option value="<?= $data['status'] ?>" selected>Select <i class="mini-text">-- <?= $data['status'] ?></i></option>
                                                                    <option value="active">Active</option>
                                                                    <option value="not-active">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <?php
                                                            if($type == 'products')
                                                            {
                                                                ?>
                                                                    <div class="row">
                                                                        <div class="column no-padding w-100 mr-20">
                                                                            <label class="label">Selling Rate</label>
                                                                            <input name="selling_rate" type="text" value="<?= $data['selling_rate'] ?>" class="w-100 input min-height" required>
                                                                        </div>

                                                                        <div class="column no-padding w-100 mr-20">
                                                                            <label class="label">Buying Rate</label>
                                                                            <input name="buying_rate" type="text" value="<?= $data['buying_rate'] ?>" class="w-100 input min-height" required>
                                                                        </div>                      
                                                                    </div>
                                                                <?php
                                                            }
                                                        ?>
                                                        <input type="text" name="id" value="<?= $data['id'] ?>" readonly hidden>
                                                        <input type="text" name="type" value="<?= $type ?>" readonly hidden>
                                                        <button type="submit" name="Update" class="button mt-20">Update</button>
                                                        <button type="submit" name="Delete" class="button mt-20" style="background-color: red; border: 1px solid red">Delete</button>
                                                    </form>
                                                </div>
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
                            <?php
                        }
                        else
                        {
                            header("Location:". $_SERVER['HTTP_REFERER']);
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