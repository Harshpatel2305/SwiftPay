<?php
include 'db_connection.php';

if (!isset($_SESSION['admin_username'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {


    ?>


    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Manufacturer

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> Insert Manufacturer

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                        

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> enter Operator name </label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="name" name="operator_name" required>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="submit" class="form-control btn btn-primary"
                                    value=" Insert Manufacturer ">

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {


        //$operator_id = mysqli_real_escape_string($con, $_POST['operator_id']);
        $operator_name = mysqli_real_escape_string($con, $_POST['operator_name']);

        // Insert into the DTH operators table
        $insert_query = "INSERT INTO recharge_operators (operator_name) VALUES ('$operator_name')";

        if (mysqli_query($con, $insert_query)) {
            echo '<div class="alert alert-success" role="alert">
                    DTH Operator inserted successfully.
                </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Error: ' . mysqli_error($con) . '
                </div>';
        }


        // Close the database connection
        mysqli_close($con);


    }

    ?>

<?php } ?>