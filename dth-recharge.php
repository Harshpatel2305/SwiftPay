<?php
session_start();

?>
<?php
include 'configure.php';
if (!isset($_SESSION['mobile_number'])) {
    echo '<script>window.location.href="login.php";</script>';
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="css/style.css">
        <style>
            .register-form form .inputBox select {
                margin: 1rem 0;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                border-radius: .5rem;
                background: #eee;
                padding: initial !important;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                gap: 1rem;
                height: 2rem;
            }

            .icons a:hover {
                color: #00baf2 !important;
            }

            .table-container {
                width: 100%;
                margin: 0 auto;
                margin-bottom: 7rem;
                margin-top: 5rem;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ccc;
                font-size: 1.5rem;
            }

            th {
                color: #666;
            }

            th,
            td {
                padding: 8px;
                border: 1px solid #ccc;
                text-align: left;

            }

            th {
                background-color: #00baf2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .negative-amount {
                color: crimson;
            }

            .positive-amount {
                color: green;
            }

            .download-image {
                height: 50px;
                width: auto;
            }

            .login-form form input[type=submit]:hover,
            .register-form form input[type=submit]:hover {
                background: #333 !important;
            }

            @media (max-width: 450px) {
                html {
                    font-size: 50%;
                }

                .home .slide .content h3 {
                    font-size: 4rem;
                }

                .shopping-cart .box-container .box {
                    flex-flow: column;
                }

                .table-container {
                    width: 20%;
                    margin-left: inherit;
                    display: contents;
                }

                table {
                    width: 100%;
                    font-size: 0.9rem;
                }
            }

            .footer .box-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr)) !important;
                gap: 1.5rem;
            }

            .test {
                margin-top: 2.5rem;
                margin-bottom: 2.5rem;
            }
        </style>
    </head>

    <body>

        <?php include 'functions/header.php'; ?>
        <section class="heading" style="background-color:#00baf2;">
            <h1>DTH recharge</h1>
            <p> <a href="home.html">home</a> >> DTH recharge </p>
        </section>
        <section class="about">
            <?php
            include 'configure.php';
            //session_start();
        
            $user_mobile = $_SESSION['mobile_number'];

            // Fetch user's balance and username from the database
            $query = "SELECT username, balance FROM users WHERE mobile_number = '$user_mobile'";
            $result = mysqli_query($conn, $query);

            if ($row = mysqli_fetch_assoc($result)) {
                $user_balance = $row['balance'];
                $username = $row['username'];
            } else {
                // Handle the case where the user is not found
                echo "User not found. Please log in again.";
                exit();
            }

            // Fetch user's approved transaction history
            $transaction_history_query = "SELECT * FROM transactions WHERE (sender_mobile_number = '$user_mobile' OR receiver_mobile_number = '$user_mobile') AND status = 'approved'";
            $transaction_history_result = mysqli_query($conn, $transaction_history_query);
            ?>

            <h1 class="title">Hello,
                <?php echo $username; ?>
            </h1>
            <h1 class="title">Your wallet balance is: <span>&#8377;
                    <?php echo $user_balance; ?>
                </span>
            </h1>


            <section class="register-form">


                <form id="rechargeForm" action="dth-recharge.php" method="post">
                    <h3>DTH recharge form</h3>

                    <div id="mobile_error" class="error-message"></div>
                    <div class="inputBox">
                        <span class="fas fa-mobile"></span>
                        <input type="text" name="mobileNumber" id="mobileNumber" placeholder="mobile number"
                            value="<?php echo $_SESSION['mobile_number']; ?>" required>
                        <!-- Display error message here -->
                    </div>

                    <div class="inputBox">
                        <span class="fa-solid fa-building"></span>
                        <select class="" id="operator" name="operator" required>
                            <!-- Options will be dynamically loaded using jQuery -->
                            <option value="">select operator</option>
                        </select>
                    </div>


                    <div class="inputBox">
                    <span class="fas fa-inr"></span>
                        <input type="text" name="amount" id="amount" readonly placeholder="amount" required>
                        <!-- Display error message here -->
                    </div>

                    <div class="inputBox">
                        <span class="fa-solid fa-calendar-days"></span>
                        <input type="text" name="validity" id="validity" readonly placeholder="validity " required>
                        <!-- Display error message here -->
                    </div>
                    <div class="inputBox">
                        <span class="fa-solid fa-circle-info"></span>
                        <input type="text" name="description" id="description" readonly placeholder="description" required>
                        <!-- Display error message here -->
                    </div>


                    <button type="submit" class="btn btn-primary">Proceed</button>
                </form>
                </section>

                <div id="planTableContainer" class="mt-3">
                    <!-- Plan table will be dynamically loaded here -->
                </div>
                </div>
                <!-- DTH Recharge Transaction History -->
                <div class="table-container">
                    <h1 class="title test">DTH Recharge Transaction History</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Operator</th>
                                <th>Amount</th>
                                <th>Validity</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Transaction Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Retrieve DTH recharge transaction history for the user
                            $query_dth_history = "SELECT * FROM dth_transactions WHERE mobile_number = '$user_mobile' and approval_status='approved' ORDER BY transaction_time DESC";
                            $result_dth_history = mysqli_query($conn, $query_dth_history);

                            while ($row_dth = mysqli_fetch_assoc($result_dth_history)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row_dth['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_dth['operator_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_dth['amount']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_dth['validity']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_dth['description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_dth['approval_status']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_dth['transaction_time']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </section>
                <?php mysqli_close($conn); ?>

                <!-- Use the full version of jQuery -->
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function () {
                        // Fetch DTH operators and populate the dropdown
                        $.ajax({
                            type: 'GET',
                            url: 'get_operators.php',
                            success: function (response) {
                                var operators = JSON.parse(response);
                                var operatorDropdown = $('#operator');

                                $.each(operators, function (index, operator) {
                                    operatorDropdown.append('<option value="' + operator.id + '">' + operator.operator_name + '</option>');
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching operators:", status, error);
                            }
                        });

                        // Load DTH plans based on selected operator
                        $('#operator').change(function () {
                            var selectedOperator = $(this).val();

                            $.ajax({
                                type: 'POST',
                                url: 'get_dth_plans.php',
                                data: { operator_id: selectedOperator },
                                success: function (response) {
                                    var plans = JSON.parse(response);

                                    if (plans.length > 0) {
                                        var planTable = '<h1 class="title test">Plan table</h1>' +'<table class="table table-bordered">' +
                                            '<thead><tr><th>Plan</th><th>Validity</th><th>Description</th><th>Amount</th></tr></thead><tbody>';

                                        $.each(plans, function (index, plan) {
                                            planTable += '<tr data-amount="' + plan.price + '" data-validity="' + plan.validity +
                                                '" data-description="' + plan.description + '">' +
                                                '<td>' + plan.plan_name + '</td>' +
                                                '<td>' + plan.validity + ' days</td>' +
                                                '<td>' + plan.description + '</td>' +
                                                '<td><a href="#" class="plan-price">' + plan.price + '</a></td>' +
                                                '</tr>';
                                        });

                                        planTable += '</tbody></table>';
                                        $('#planTableContainer').html(planTable);

                                        // Attach click event to plan prices
                                        $('.plan-price').click(function () {
                                            var amount = $(this).text();
                                            var validity = $(this).closest('tr').data('validity');
                                            var description = $(this).closest('tr').data('description');

                                            // Update form fields with clicked plan details
                                            $('#amount').val(amount);
                                            $('#validity').val(validity);
                                            $('#description').val(description);
                                        });
                                    } else {
                                        console.error("No plans found for the selected operator.");
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error("AJAX Error:", status, error);
                                }
                            });
                        });

                        // Submit the recharge form
                        $('#rechargeForm').submit(function (e) {
                            e.preventDefault();

                            $.ajax({
                                type: 'POST',
                                url: 'process_recharge.php',
                                data: $(this).serialize(),
                                success: function (response) {
                                    alert(response);
                                },
                                error: function (xhr, status, error) {
                                    console.error("AJAX Error:", status, error);
                                }
                            });
                        });
                    });
                </script>

    </body>

    </html>
    <?php include 'functions/footer.php';?>
<?php } ?>