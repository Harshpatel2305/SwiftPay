    <?php
    // Start session
    session_start();

    // Include the header file
    include 'functions/header.php';

    // Include the database configuration file
    include 'configure.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $mobile_number = $_POST['mobile_number']; // Change variable name to mobile_number
        $password = $_POST['password'];

        // Prepare SQL query to fetch user data based on mobile number
        $query = "SELECT * FROM users WHERE mobile_number = ?"; // Modify query

        // Prepare the statement
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bind_param("s", $mobile_number);

        // Execute the statement
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            // Fetch user data
            $row = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session and redirect to dashboard or home page
                $_SESSION['mobile_number'] = $mobile_number; // Set session
                echo '<script>alert("Welcome,You have been logged in successfully.");</script>';
                echo '<script>window.location.href="home.php";</script>';
                exit; // Exit to prevent further execution
            } else {
                // Password is incorrect
                echo '<script>alert("Invalid mobile number or password.");</script>';
            }
        } else {
            // User does not exist
            echo '<script>alert("Invalid mobile number or password.");</script>';
        }

        // Close statement
        $stmt->close();
    }

    // Include the footer file
    //include 'functions/footer.php';
    ?>

    <!-- header section ends -->

    <!-- header section  -->
    <style>
        .error {
            color: red;
            font-size: 1.3rem;
        }
    </style>
    <section class="heading">
        <h1>account</h1>
        <p> <a href="home.php">home</a> >> login </p>
    </section>

    <!-- header section -->

    <!-- login form section starts -->

    <section class="login-form">

        <form action="login.php" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>user login</h3>
            <span class="error" id="mobileError"></span>
            <div class="inputBox">
                <span class="fas fa-mobile"></span>
                <input type="tel" name="mobile_number" placeholder="enter mobile number"
                    onkeyup="validateMobileNumber(this)">

            </div>
            <span class="error" id="passwordError"></span>
            <div class="inputBox">
                <span class="fas fa-lock"></span>
                <input type="password" name="password" placeholder="enter your password" onkeyup="validatePassword(this)">

            </div>

            <input type="submit" id="submitBtn" value="sign in" class="btn test">
            <a href="register.php" class="btn">create an account</a>
        </form>

    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Get references to all form input fields
        const mobileInput = document.querySelector('input[name="mobile_number"]');
        const passwordInput = document.querySelector('input[name="password"]');

        // Get references to all error message elements
        const mobileError = document.getElementById("mobileError");
        const passwordError = document.getElementById("passwordError");

        // Regular expressions for validation
        const mobileRegex = /^\d{10}$/;
        const passwordRegex = /^.{8,}$/;

        // Validate mobile number on keyup
        function validateMobileNumber(input) {
            if (!mobileRegex.test(input.value)) {
                mobileError.textContent = "Please enter a valid 10-digit mobile number.";
                document.getElementById("submitBtn").disabled = true;
            } else {
                mobileError.textContent = "";
                document.getElementById("submitBtn").disabled = false;
            }
        }

        // Validate password on keyup
        function validatePassword(input) {
            if (!passwordRegex.test(input.value)) {
                passwordError.textContent = "Password must be at least 8 characters long.";
                document.getElementById("submitBtn").disabled = true;
            } else {
                passwordError.textContent = "";
                document.getElementById("submitBtn").disabled = false;
            }
        }

        mobileInput.addEventListener("keyup", function () { validateMobileNumber(this); });
        passwordInput.addEventListener("keyup", function () { validatePassword(this); });
    });

    </script>

    <!-- login form section ends -->

    <?php include 'functions/footer.php'; ?>

    </body>

    </html>