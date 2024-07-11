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
                        if(isset($_GET['task']))
                        {
                            $task = $_GET["task"];
                        }
                    ?>
                    <h3>Add New <?= $task ?></h3>

                    <?php
                        if($task == "category")
                        {
                            ?>
                                <div class="mt-20 padding-20">
                                    <p>Provide information of your new <?= $task ?> in the field below</p>
                                    <form action="../functions/adminfunc" method="post" enctype="multipart/form-data" class="mt-20">
                                        <div class="row">
                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Name of <?= $task ?></label>
                                                <input type="text" name="name" class="w-100 input min-height" required>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Name of Category</label>
                                                <input type="file" name="image" id="" class="w-100 input min-height" required>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Set Status</label>
                                                <select name="status" id="" class="w-100 input min-height" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="active">Active</option>
                                                    <option value="not-active">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" name="AddCat" class="button mt-20">Proceed</button>
                                        <button type="submit" name="AddCatNew" class="button mt-20">Proceed & Add New</button>
                                    </form>
                                </div>
                            <?php
                        }
                        else if($task == "product")
                        {
                            ?>
                                <div class="mt-20 padding-20">
                                    <p>Provide information of your new <?= $task ?> in the field below</p>
                                    <form action="../functions/adminfunc" method="post" enctype="multipart/form-data" class="mt-20">
                                        <div class="row">
                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Name of <?= $task ?></label>
                                                <input name="name" type="text" class="w-100 input min-height" required>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Selling Rate</label>
                                                <input name="selling_rate" type="text" class="w-100 input min-height" required>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Buying Rate</label>
                                                <input name="buying_rate" type="text" class="w-100 input min-height" required>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Image</label>
                                                <input name="image" type="file" name="image" id="" class="w-100 input min-height" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Select Category</label>
                                                <select name="categories" id="" class="w-100 input min-height" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <?php
                                                        $selectprod = "SELECT * FROM categories";
                                                        $selectprod_run = mysqli_query($con, $selectprod);

                                                        if(mysqli_num_rows($selectprod_run) > 0)
                                                        {
                                                            foreach($selectprod_run as $cate)
                                                            {
                                                                ?>
                                                                    <option value="<?= $cate['name'] ?>"><?= $cate['name'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <option value="" selected disabled>No Category yet</option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Transaction Mode</label>
                                                <select name="mode" id="" class="w-100 input min-height" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="e-pin">E-pin</option>
                                                    <option value="Physical Card">Physical Card</option>
                                                    <option value="nil">None</option>
                                                </select>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Transaction Type</label>
                                                <select name="type" id="" class="w-100 input min-height" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="With Receipt">With Receipt</option>
                                                    <option value="Without Receipt">Without Receipt</option>
                                                    <option value="nil">None</option>
                                                </select>
                                            </div>

                                            <div class="column no-padding w-100 mr-20">
                                                <label class="label">Set Status</label>
                                                <select name="status" id="" class="w-100 input min-height" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="active">Active</option>
                                                    <option value="not-active">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" name="AddProd" class="button mt-20">Proceed</button>
                                        <button type="submit" name="AddProdNew" class="button mt-20">Proceed & Add New</button>
                                    </form>
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