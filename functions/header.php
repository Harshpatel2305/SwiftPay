    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SwiftPay</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://kit.fontawesome.com/45c38953bc.js" crossorigin="anonymous"></script>
        <!-- custom css file link  -->

        <link rel="icon" type="image/png+xml" href="SwiftPay.png">
        <link rel="stylesheet" href="css/style_2.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style.scss">


        <!-- custom js file link  -->
        <script src="js/script.js" defer></script>
        <style>
            .login-form form .inputBox span,
            .register-form form .inputBox span {
                color: #666;
                margin-left: 1rem;
                font-size: 3rem;
            }

            .icons a:hover {
                color: #00baf2 !important;
            }

            ul li a {
                padding: 1.7rem !important;
            }
        </style>

    </head>

    <body>

        <!-- header section starts  -->

        <header class="header">



            <a href="home.php" class="logo"> SwiftPay<span style="font-size:3rem;" class="fa-brands fa-swift"></span> </a>

            <nav class="navbar">
                <ul>
                    <li><a href="home.php">home &nbsp;<span class="fa-solid fa-house"></span></a></li>
                    <li><a href="home.php#services">services &nbsp;<span class="fa-solid fa-gears"></span></a>
                        <ul>
                            <li><a href="pay-money.php">pay money &nbsp;<i class="fa-solid fa-money-bill-transfer"></i></a>
                            </li>
                            <li><a href="mobile-recharge.php">mobile recahrge &nbsp;<i class="fa-solid fa-mobile"></i></a>
                            </li>
                            <li><a href="dth-recharge.php">DTH recahrge &nbsp;<i class="fa-solid fa-satellite-dish"></i></a>
                            </li>

                        </ul>
                    </li>

                    <!--<li><a href="#">pages +</a>
                            <ul>
                                <li><a href="about.html">about</a></li>
                                <li><a href="blogs.html">blogs</a></li>
                            </ul>
                        </li>-->
                        <li><a href="add-balance.php">add balance &nbsp;<span class="fa-solid fa-indian-rupee-sign"></span></a></li>
                    <li><a href="about.php">about &nbsp;<span class="fa-solid fa-circle-info"></span></a></li>
                    <li><a href="contact-us.php">contact &nbsp;<span class="fa-solid fa-phone"></span></a></li>
                    <li><a href="profile.php">account &nbsp;<span class="fa-solid fa-user-secret"></span></a>
                        <?php
                        if (!isset($_SESSION['mobile_number'])) {
                            echo ' <ul>
                <li><a href="login.php">login &nbsp;<i class="fa-solid fa-right-to-bracket"></i></a></li>
                                <li><a href="register.php">register &nbsp;<i class="fa-solid fa-user-plus"></i></a></li>
            </ul>';
                        } else {
                            echo '<ul><li><a href="./logout.php" class="login__link">Logout &nbsp;<i class="fa-solid fa-right-from-bracket"></i></a></li><ul>';
                        }
                        ?>

                        <!--<ul>
                <li><a href="login.html">login</a></li>
                <li><a href="register.html">register</a></li>
                </ul>-->
                    </li>
                    </li>

                    <!--<li><a href="#">account +</a>
                            <ul>
                                <li><a href="login.php">login &nbsp;<i class="fa-solid fa-right-to-bracket"></i></a></li>
                                <li><a href="register.php">register &nbsp;<i class="fa-solid fa-user-plus"></i></a></li>
                            </ul>
                        </li>-->
                </ul>
            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" style="display:none;" class="fas fa-search"></div>
                <!--<a href="cart.php" class="fas fa-shopping-cart"></a>-->
                
            </div>

        </header>