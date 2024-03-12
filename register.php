<?php
session_start();
include("configure.php"); // Include your database connection file here

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobile_number'];
    $bank = $_POST['bank'];
    $account_number = $_POST['account_number'];
    $ifsc_code = $_POST['ifsc_code'];

    // Check if required fields are empty
    if (empty($name) || empty($email) || empty($password) || empty($mobile_number) || empty($bank) || empty($account_number) || empty($ifsc_code)) {
        echo '<script>alert("Please fill in all required fields.")</script>';
    } else {
        // Check if email already exists
        $result_email = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result_email && $result_email->num_rows > 0) {
            echo '<script>alert("Email already exists")</script>';
        } else {
            // Check if mobile number already exists
            $result_mobile = $conn->query("SELECT * FROM users WHERE mobile_number = '$mobile_number'");
            if ($result_mobile && $result_mobile->num_rows > 0) {
                echo '<script>alert("Mobile number already exists")</script>';
            } else {
                // Check if account number already exists
                $result_account = $conn->query("SELECT * FROM users WHERE account_number = '$account_number'");
                if ($result_account && $result_account->num_rows > 0) {
                    echo '<script>alert("Account number already exists")</script>';
                } else {
                    // Validate IFSC code based on bank selection
                    $ifsc_regex = getIfscRegex($bank);
                    if (!preg_match($ifsc_regex, $ifsc_code)) {
                        echo '<script>alert("Invalid IFSC code for selected bank")</script>';
                    } else {
                        // Hash the password for security
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Insert user data into users table
                        $insert_query = "INSERT INTO users (username, email, password, mobile_number, bank, account_number, ifsc_code) 
                                        VALUES ('$name', '$email', '$hashed_password', '$mobile_number', '$bank', '$account_number', '$ifsc_code')";

                        if ($conn->query($insert_query) === TRUE) {
                            // Redirect to login page
                            echo '<script>alert("User registered successfully")</script>';
                            echo "<script>window.location.href='login.php';</script>";
                        } else {
                            echo "Error: " . $insert_query . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }
    }

    // Close connection
    $conn->close();
}

// Function to get IFSC regex based on bank selection
function getIfscRegex($bank) {
    switch ($bank) {
        case 'SBI':
            return '/^[A-Z]{4}0[A-Z0-9]{6}$/';
        case 'HDFC':
            return '/^[A-Z]{4}0[A-Z0-9]{6}$/';
        // Add regex patterns for other banks as needed
        default:
            return ''; // Return empty string if bank not found
    }
}
?>

<!-- Your HTML form -->
<?php include 'functions/header.php'; ?>
<!-- header section  -->
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
    .error {
        color: red;
        font-size: 1.3rem;
    }
</style>

<section class="heading">
    <h1>account</h1>
    <p> <a href="home.html">home</a> >> register </p>
</section>

<!-- register form section starts -->
<section class="register-form">
    <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>register now</h3>
        <span class="error" id="usernameError"></span>
        <div class="inputBox">
            <span class="fas fa-user"></span>
            <input type="text" name="username" placeholder="enter your name" required onkeyup="validateUsername(this)">
        </div>
        <span class="error" id="emailError"></span>
        <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input type="email" name="email" placeholder="enter your email" required onkeyup="validateEmail(this)">
        </div>
        <span class="error" id="passwordError"></span>
        <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input type="password" name="password" placeholder="enter your password" required onkeyup="validatePassword(this)">
        </div>
        <span class="error" id="mobileError"></span>
        <div class="inputBox">
            <span class="fas fa-mobile"></span>
            <input type="tel" name="mobile_number" placeholder="enter mobile number" required onkeyup="validateMobileNumber(this)">
        </div>
        <div class="inputBox">
            <span class="fa-solid fa-building-columns"></span>
            <select name="bank" required>
                <option value="">select bank</option>
                <option value="SBI">State Bank of India (SBI)</option>
<option value="HDFC">HDFC Bank</option>
<option value="ICICI">ICICI Bank</option>
<option value="PNB">Punjab National Bank (PNB)</option>
<option value="Axis">Axis Bank</option>
<option value="BoB">Bank of Baroda (BoB)</option>
<option value="Canara">Canara Bank</option>
<option value="Union">Union Bank of India</option>
<option value="BOI">Bank of India (BOI)</option>
<option value="IDBI">IDBI Bank</option>

                <!-- Add other bank options here -->
            </select>
        </div>
        <span class="error" id="accountError"></span>
        <div class="inputBox">
            <span class="fa-solid fa-piggy-bank"></span>
            <input type="password" name="account_number" placeholder="enter account number" required onkeyup="validateAccountNumber(this)">
            <span class="error" id="accountError"></span>
        </div>
        <span class="error" id="ifscError"></span>
        <div class="inputBox">
            <span class="fa-solid fa-vault"></span>
            <input type="text" name="ifsc_code" placeholder="enter IFSC code" required onkeyup="validateIFSCCode(this)">
            <span class="error" id="ifscError"></span>
        </div>
        <input type="submit" value="sign up" class="btn">
        <a href="login.php" class="btn">already have an account</a>
    </form>
</section>
<!-- register form section ends -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get reference to the bank select element and IFSC code input field
        const bankSelect = document.querySelector('select[name="bank"]');
        const ifscInput = document.querySelector('input[name="ifsc_code"]');
        const ifscError = document.getElementById("ifscError");

        // Function to validate IFSC code based on selected bank
        function validateIFSCCode() {
            const selectedBank = bankSelect.value;
            const ifscValue = ifscInput.value.trim();
            let validFormat = true;

            // Validate IFSC code format based on selected bank
            switch (selectedBank) {
                case 'SBI':
                    validFormat = /^SBIN\d{6}$/i.test(ifscValue);
                    break;
                case 'HDFC':
                    validFormat = /^HDFC\d{6}$/i.test(ifscValue);
                    break;
                case 'ICICI':
                    validFormat = /^ICIC\d{6}$/i.test(ifscValue);
                    break;
                case 'PNB':
                    validFormat = /^PUNB\d{6}$/i.test(ifscValue);
                    break;
                case 'Axis':
                    validFormat = /^UTIB\d{6}$/i.test(ifscValue);
                    break;
                case 'BoB':
                    validFormat = /^BARB\d{6}$/i.test(ifscValue);
                    break;
                case 'Canara':
                    validFormat = /^CNRB\d{6}$/i.test(ifscValue);
                    break;
                case 'Union':
                    validFormat = /^UBIN\d{6}$/i.test(ifscValue);
                    break;
                case 'BOI':
                    validFormat = /^BKID\d{6}$/i.test(ifscValue);
                    break;
                case 'IDBI':
                    validFormat = /^IBKL\d{6}$/i.test(ifscValue);
                    break;
                default:
                    validFormat = true; // Allow any format for other banks
            }

            // Check if IFSC code length exceeds 11 characters
            const validLength = ifscValue.length <= 12;

            // Display error message if format or length is invalid
            if (!validFormat || !validLength) {
                ifscError.textContent = "Please enter a valid IFSC code for " + selectedBank + " bank (format: SBINXXXXXXX).";
            } else {
                ifscError.textContent = "";
            }
        }

        // Event listener for bank selection change
        bankSelect.addEventListener("change", function() {
            validateIFSCCode();
        });

        // Event listener for IFSC code input keyup
        ifscInput.addEventListener("keyup", function() {
            validateIFSCCode();
        });

        // Initial validation on page load
        validateIFSCCode();
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to all form input fields
        const usernameInput = document.querySelector('input[name="username"]');
        const emailInput = document.querySelector('input[name="email"]');
        const passwordInput = document.querySelector('input[name="password"]');
        const mobileInput = document.querySelector('input[name="mobile_number"]');
        const accountInput = document.querySelector('input[name="account_number"]');

        // Get references to all error message elements
        const usernameError = document.getElementById("usernameError");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");
        const mobileError = document.getElementById("mobileError");
        const accountError = document.getElementById("accountError");

        // Regular expressions for validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const mobileRegex = /^\d{10}$/;
        const passwordRegex = /^.{8,}$/;
        const accountRegex = /^\d{9,18}$/;

        // Validate username on keyup
        function validateUsername(input) {
            if (input.value.length < 3) {
                usernameError.textContent = "Username must be at least 3 characters long.";
            } else {
                usernameError.textContent = "";
            }
        }

        // Validate email on keyup
        function validateEmail(input) {
            if (!emailRegex.test(input.value)) {
                emailError.textContent = "Please enter a valid email address.";
            } else {
                emailError.textContent = "";
            }
        }

        // Validate password on keyup
        function validatePassword(input) {
            if (!passwordRegex.test(input.value)) {
                passwordError.textContent = "Password must be at least 8 characters long.";
            } else {
                passwordError.textContent = "";
            }
        }

        // Validate mobile number on keyup
        function validateMobileNumber(input) {
            if (!mobileRegex.test(input.value)) {
                mobileError.textContent = "Please enter a valid 10-digit mobile number.";
            } else {
                mobileError.textContent = "";
            }
        }

        // Validate account number on keyup
        function validateAccountNumber(input) {
            if (!accountRegex.test(input.value)) {
                accountError.textContent = "Please enter a valid account number (9-18 digits).";
            } else {
                accountError.textContent = "";
            }
        }

        // Attach event listeners
        usernameInput.addEventListener("keyup", function() { validateUsername(this); });
        emailInput.addEventListener("keyup", function() { validateEmail(this); });
        passwordInput.addEventListener("keyup", function() { validatePassword(this); });
        mobileInput.addEventListener("keyup", function() { validateMobileNumber(this); });
        accountInput.addEventListener("keyup", function() { validateAccountNumber(this); });
    });
</script>

<?php include 'functions/footer.php'; ?>
</body>
</html>
