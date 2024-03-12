    <?php 
    session_start();
    include 'functions/header.php';
    if (!isset($_SESSION['mobile_number'])) {
        echo '<Script>window.location.href="login.php";</script>';
        exit; // Stop further execution
    }
    ?>
    <style>
        
        .background-home {
            width: -webkit-fill-available;
            height: 400px;
        }
        .about .icons-container .icons i {
  height: 4rem;
  margin-bottom: 1rem;
}
    </style>

    <section class="home">
        <div class="slide" style="background: url('https://pixelshr.co.uk/assets/images/placeholder/footer.png');">
            <div class="content">
                <span>protect your eyes</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>


    </section>
    <section class="heading" style="background-color:#00baf2;">
        <h1>Welcome</h1>
        
    </section>


    <img class="background-home" src="https://pwebassets.paytm.com/commonwebassets/commonweb/images/about-us/monuments.svg" alt="">


    <!-- home section ends     
    <h1 class="title" style="margin-top:2.5rem;">Our Services</h1>
     banner section starts  -->

<!--<section class="banner">

        <div class="box">
            <img src="images/pay-money.jpg" alt="">
            <div class="content">
                <h3>Pay Money</h3><br>
                <a href="pay-money.php" class="btn">Discover</a>
            </div>
        </div>

        <div class="box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4h5frg0eE5bBkPwoence26oVSDf4ZHWL5_Q&s" alt="">
            <div class="content">
                
                <h3>Elctricity Bill</h3>
                <a href="#" class="btn">Discover</a>
            </div>
        </div>

        <div class="box">
            <img src="https://d3nwecxvwq3b5n.cloudfront.net/AcuCustom/Sitename/DAM/003/online-bank-vector-flat-style-design-illustration-vector-id1205684290.jpg" alt="">
            <div class="content">
                <h3>Mobile Recharge</h3>
                <a href="mobile-recharge.php" class="btn">Discover</a>
            </div>
        </div>

    </section>-->

    <!-- banner section ends -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Services</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f7f7f7;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                margin-top: -100px;
            }
            .services {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
                margin-top: 50px;
            }
            .service {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 20px;
                text-align: center;
            }
            .service h3 {
                color: #333;
                font-size: 24px;
                margin-bottom: 10px;
            }
            .service p {
                color: #666;
                font-size: 16px;
                line-height: 1.6;
            }
            .service button {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 1.5rem;
                transition: background-color 0.3s;
            }
            .service button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
    
        <div class="container" id="services">
            <h1 class="title">Our Services</h1>
            <div class="services">
                <div class="service">
                    <h3>Money Transfer &nbsp; <i class="fa-solid fa-money-bill-transfer"></i></h3>
                    <p>Transfer money to anyone through wallet with the help of SwiftPay</p>
                    <a href="pay-money.php"><button>Discover</button></a>
                </div>
                <div class="service">
                    <h3>mobile Recharge &nbsp;<i class="fa-solid fa-mobile"></i></h3>
                    <p>Do mobile recharge with operators using SwiftPay</p>
                    <a href="mobile-recharge.php"><button>Discover</button></a>
                </div>
                <div class="service">
                    <h3>DTH Recharge &nbsp;<i class="fa-solid fa-satellite-dish"></i></h3>
                    <p>SwiftPay enables you to do DTH recharge effortlessly</p>
                    <a href="dth-recharge.php"><button>Discover</button></a>
                </div>
            </div>
        </div>
    </body>
    </html>

    

    <section class="about" style="margin-top:1rem;">

<h1 class="title">why choose us?</h1>


<div class="icons-container">

    <div class="icons">
        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/shield-430-357235.png?f=webp&w=256" alt="">
        <h3>secured</h3>
    </div>

    <div class="icons">
        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/cross-platform-2781243-2305958.png?f=webp&w=256" alt="">
        <h3>dynamic</h3>
    </div>

    <div class="icons">
        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/user-interface-1467790-1240086.png?f=webp&w=256" alt="">
        <h3>Friendly UI</h3>
    </div>

    <div class="icons">
        <img src="https://cdn.iconscout.com/icon/free/png-512/free-money-transfer-1795418-1522784.png?f=webp&w=256" alt="">
        <h3>easy payments</h3>
    </div>

    <div class="icons">
        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/support-2534673-2129493.png?f=webp&w=256" alt="">
        <h3>24/7 support</h3>
    </div>

</div>

</section>
    





    <!-- footer section starts  -->

    <?php include 'functions/footer.php';?>
    <!-- footer section ends -->

    </body>
    </html>