    <?php
    //session_start();
    include 'db_connection.php';

    if (!isset($_SESSION['admin_username'])) {

        echo "<script>window.open('login.php','_self')</script>";

    } else {




        ?>

        <div class="row"><!-- 1 row Starts -->

            <div class="col-lg-12"><!-- col-lg-12 Starts -->

                <!-- <h1 class="page-header">Dashboard</h1> -->

                <ol class="breadcrumb"><!-- breadcrumb Starts -->

                    <li class="active">

                        <i class="fa fa-dashboard"></i> Dashboard

                    </li>

                </ol><!-- breadcrumb Ends -->

            </div><!-- col-lg-12 Ends -->

        </div><!-- 1 row Ends -->


        <!-- col-lg-3 col-md-6 Ends -->
            <div class="col-lg-3 col-md-6">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-building fa-5x"> </i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(id) AS total_earnings FROM dth_operators";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>
                                <div>Total DTH operators</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?view_manufacturers">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>
                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-building fa-5x"> </i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(operator_id) AS total_earnings FROM recharge_operators";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>
                                <div>Total recharge operators</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?edit_contact_us">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>
                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>



            <div class="col-lg-3 col-md-6">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"> </i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(user_id) AS total_earnings FROM users";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>
                                <div>Total users</div>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?view_customers">
                        <div class="panel-footer">
                            <span class="pull-left"> View Details </span>
                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

                <div class="panel panel-red"><!-- panel panel-yellow Starts -->

                    <div class="panel-heading"><!-- panel-heading Starts -->

                        <div class="row"><!-- panel-heading row Starts -->

                            <div class="col-xs-3"><!-- col-xs-3 Starts -->

                                <i class="fa fa-rupee fa-5x"> </i>

                            </div><!-- col-xs-3 Ends -->

                            <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                                <div class="huge">
                                <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(id) AS total_earnings FROM dth_transactions where approval_status='approved'";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>

                                <div>total DTH transactions</div>

                            </div><!-- col-xs-9 text-right Ends -->

                        </div><!-- panel-heading row Ends -->

                    </div><!-- panel-heading Ends -->

                    <a href="index.php?view_products">

                        <div class="panel-footer"><!-- panel-footer Starts -->

                            <span class="pull-left"> View Details </span>

                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                            <div class="clearfix"></div>

                        </div><!-- panel-footer Ends -->

                    </a>

                </div><!-- panel panel-yellow Ends -->

            </div><!-- col-lg-3 col-md-6 Ends -->
            <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

                <div class="panel panel-red"><!-- panel panel-yellow Starts -->

                    <div class="panel-heading"><!-- panel-heading Starts -->

                        <div class="row"><!-- panel-heading row Starts -->

                            <div class="col-xs-3"><!-- col-xs-3 Starts -->

                                <i class="fa fa-rupee fa-5x"> </i>

                            </div><!-- col-xs-3 Ends -->

                            <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                                <div class="huge">
                                <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(transaction_id) AS total_earnings FROM transactions where status='approved'";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>

                                <div>total wallet transactions</div>

                            </div><!-- col-xs-9 text-right Ends -->

                        </div><!-- panel-heading row Ends -->

                    </div><!-- panel-heading Ends -->

                    <a href="index.php?view_payments">

                        <div class="panel-footer"><!-- panel-footer Starts -->

                            <span class="pull-left"> View Details </span>

                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                            <div class="clearfix"></div>

                        </div><!-- panel-footer Ends -->

                    </a>

                </div><!-- panel panel-yellow Ends -->

            </div><!-- col-lg-3 col-md-6 Ends -->

            <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

                <div class="panel panel-red"><!-- panel panel-yellow Starts -->

                    <div class="panel-heading"><!-- panel-heading Starts -->

                        <div class="row"><!-- panel-heading row Starts -->

                            <div class="col-xs-3"><!-- col-xs-3 Starts -->

                                <i class="fa fa-rupee fa-5x"> </i>

                            </div><!-- col-xs-3 Ends -->

                            <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                                <div class="huge">
                                <?php
                                    // Query to get the total earnings from orders where status is Complete
                                    $get_total_earnings_query = "SELECT count(id) AS total_earnings FROM recharge_transactions";
                                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                                    $total_earnings = $row_total_earnings['total_earnings'];

                                    // Display the total earnings
                                    echo $total_earnings;
                                    ?>
                                </div>

                                <div>total recharge transactions</div>

                            </div><!-- col-xs-9 text-right Ends -->

                        </div><!-- panel-heading row Ends -->

                    </div><!-- panel-heading Ends -->

                    <a href="index.php?view_products">

                        <div class="panel-footer"><!-- panel-footer Starts -->

                            <span class="pull-left"> View Details </span>

                            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                            <div class="clearfix"></div>

                        </div><!-- panel-footer Ends -->

                    </a>

                </div><!-- panel panel-yellow Ends -->

            </div><!-- col-lg-3 col-md-6 Ends -->
            
            <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-green"><!-- panel panel-yellow Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <div class="row"><!-- panel-heading row Starts -->

            <div class="col-xs-3"><!-- col-xs-3 Starts -->

                <i class="fa fa-rupee fa-5x"> </i>

            </div><!-- col-xs-3 Ends -->

            <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                <div class="huge">
                <?php
                    // Query to get the total earnings from orders where status is Complete
                    $get_total_earnings_query = "SELECT sum(amount) AS total_earnings FROM transactions where status='approved'";
                    $run_total_earnings_query = mysqli_query($con, $get_total_earnings_query);
                    $row_total_earnings = mysqli_fetch_assoc($run_total_earnings_query);
                    $total_earnings = $row_total_earnings['total_earnings'];

                    // Display the total earnings
                    echo $total_earnings;
                    ?>
                </div>

                <div>total of rupee transaction</div>

            </div><!-- col-xs-9 text-right Ends -->

        </div><!-- panel-heading row Ends -->

    </div><!-- panel-heading Ends -->

    <a href="index.php?view_payments">

        <div class="panel-footer"><!-- panel-footer Starts -->

            <span class="pull-left"> View Details </span>

            <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

            <div class="clearfix"></div>

        </div><!-- panel-footer Ends -->

    </a>

</div><!-- panel panel-yellow Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->






            

        </div><!-- 2 row Ends -->

       
        

    <?php } ?>