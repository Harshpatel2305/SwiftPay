<?php
include 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form data
    $operator_id = mysqli_real_escape_string($con, $_POST['operator_id']);
    $plan_name = mysqli_real_escape_string($con, $_POST['plan_name']);
    $validity = mysqli_real_escape_string($con, $_POST['validity']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Insert data into the dth_plans table
    $insert_query = "INSERT INTO recharge_plans (operator_id, plan_name, validity, description, price)
                    VALUES ('$operator_id', '$plan_name', '$validity', '$description', '$price')";

    if (mysqli_query($con, $insert_query)) {
        echo '<div class="alert alert-success" role="alert">
                Plan added successfully.
            </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error: ' . mysqli_error($con) . '
            </div>';
    }
}

// Retrieve operators for dynamic selection
$query_operators = "SELECT * FROM recharge_operators";
$result_operators = mysqli_query($con, $query_operators);

//session_start();
if (!isset($_SESSION['admin_username'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Insert DTH plans

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"></i> Insert DTH plans

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">select operator</label>

                            <div class="col-md-6">

                                <select class="form-control" id="operator_id" name="operator_id" required>
                                    <?php while ($row_operator = mysqli_fetch_assoc($result_operators)) { ?>
                                        <option value="<?php echo $row_operator['operator_id']; ?>">
                                            <?php echo $row_operator['operator_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">enter plan name</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="plan_name" name="plan_name" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">enter validity of the plan</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="validity" name="validity" required>

                            </div>

                        </div><!-- form-group Ends -->
                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">enter plan's description</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="description" name="description" required>

                            </div>

                        </div><!-- form-group Ends -->
                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label">enter price of the plan</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="price" name="price" required>

                            </div>

                        </div><!-- form-group Ends -->



                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" value="add plan"
                                    class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php mysqli_close($con);
?>
<?php } ?>