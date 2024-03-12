    <?php

    include("db_connection.php");
    session_start();


    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";

    } else {

        ?>

        <?php

        $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from dth_operators  where operator_email='$admin_session'";

        $run_admin = mysqli_query($con, $get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['id'];

        $admin_name = $row_admin['operator_email'];

        $admin_name=$row_admin['operator_name'];

        $_SESSION['operator_name']=$admin_name;
        $_SESSION['id']=$admin_id;
        //echo  $_SESSION['operator_name'];
        //echo $_SESSION['admin_email'];
        echo  $_SESSION['id'];

    
        ?>


        <!DOCTYPE html>
        <html>

        <head>

            <title>Admin Panel</title>

            <link href="css/bootstrap.min.css" rel="stylesheet">

            <link href="css/style.css" rel="stylesheet">

            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!--<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147"
                type="image/png">-->

        </head>

        <body>

            <div id="wrapper"><!-- wrapper Starts -->

                <?php include("includes/sidebar.php"); ?> 

                <div id="page-wrapper"><!-- page-wrapper Starts -->

                    <div class="container-fluid"><!-- container-fluid Starts -->

                        <?php

                        if (isset($_GET['dashboard'])) {

                            include("dashboard.php");

                        }
                        
                        if (isset($_GET['view_cats'])) {

                            include("view_cats.php");

                        }
                        if (isset($_GET['insert_cat'])) {

                            include("insert_cat.php");

                        }


                        if (isset($_GET['view_products'])) {

                            include("view_products.php");

                        }
                        if (isset($_GET['view_users'])) {

                            include("view_users.php");

                        }

                        if (isset($_GET['user_profile'])) {

                            include("user_profile.php");

                        }
                        if (isset($_GET['edit_dth_plans'])) {
                            include("edit_dth_plans.php");
                        }
                        
                        
                        
                        
                        /*if (isset($_GET['view_p_cats'])) {

                            include("view_p_cats.php");

                        }

                    
                        
                        
                        
                        
                        
                    

                        

                        if (isset($_GET['view_customers'])) {

                            include("view_customers.php");

                        }

                        if (isset($_GET['customer_delete'])) {

                            include("customer_delete.php");

                        }


                        if (isset($_GET['view_orders'])) {

                            include("view_orders.php");

                        }

                    

                        if (isset($_GET['view_payments'])) {

                            include("view_payments.php");

                        }

                    
                        if (isset($_GET['insert_user'])) {

                            include("insert_user.php");

                        }

                        

                        if (isset($_GET['user_delete'])) {

                            include("user_delete.php");

                        }
                        if (isset($_GET['test_2'])) {

                            include("test_2.php");

                        }
                        if (isset($_GET['test_3'])) {

                            include("test_3.php");

                        }
                        if (isset($_GET['test_4'])) {

                            include("test_4.php");

                        }
                        if (isset($_GET['test_5'])) {

                            include("test_5.php");

                        }
                        if (isset($_GET['insert_recharge_plans'])) {

                            include("insert_recharge_plans.php");

                        }
                        
                        
                        // Include edit_plan.php page
                        
                        
                        
                        
                        
                        

                        

                        if (isset($_GET['insert_manufacturer'])) {

                            include("insert_manufacturer.php");

                        }

                        if (isset($_GET['view_manufacturers'])) {

                            include("view_manufacturers.php");

                        }

                    
                        if (isset($_GET['edit_manufacturer'])) {

                            include("edit_manufacturer.php");

                        }


                        

                        if (isset($_GET['insert_icon'])) {

                            include("insert_icon.php");

                        }


                    
                        

                        if (isset($_GET['edit_contact_us'])) {

                            include("edit_contact_us.php");

                        }

                        if (isset($_GET['insert_enquiry'])) {

                            include("insert_enquiry.php");

                        }
                        if (isset($_GET['edit_recharge_operator'])) {

                            include("edit_recharge_operator.php");

                        }


                        

                        /*if(!isset($_GET('test_2'))){

                            include("test_2.php");
                        }*/
                        

                        ?>

                    </div><!-- container-fluid Ends -->

                </div><!-- page-wrapper Ends -->

            </div><!-- wrapper Ends -->

            <script src="js/jquery.min.js"></script>

            <script src="js/bootstrap.min.js"></script>


        </body>


        </html>

    <?php } ?>
