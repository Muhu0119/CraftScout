<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CraftScout</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />

    <style>
        #account-field {
            display: block;
        }

        .hidden {
            display: none;
        }
        .input11 {
  display: block;
  width: 80%;
  margin: 40px auto;
  padding: 10px 5px;
  border: none;
  border-bottom: 0.01rem dimgray solid;
  outline: none;
}

.table12 {
  margin: 0;
  padding: 0;
  width: 100%;
  overflow: auto;
}

.table12 tr{
    width: 100%;
  overflow: auto;

}

    </style>

</head>

<body>
    <section id="header">
    <a href="index.php"><img src="img/Logo2.png" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="community.php">Community</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag">
                    <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="container">
        <div class="titlecheck">
            <h2>Product Order Form</h2>
        </div>
        <div class="d-flex">
            <form method="post" id="form1">

                <h3 style="color: darkred; margin: auto"></h3>
                <input class="input11" type="text" name="houseadd" placeholder="Address" required>
                <input class="input11" type="text" name="city" placeholder="City" required>
                <input class="input11" type="text" name="country" placeholder="County/State" required>
                <input class="input11" id="account-field" type="text" name="acc" placeholder="Account Number">
                <div>
                    <input class="input2" type="radio" id="ac1" name="dbt" value="cod" onchange="showInputBox()"> Cash
                    on Delivery
                </div>
                <div>
                    <input class="input2" type="radio" id="ac2" name="dbt" value="bank" checked
                        onchange="showInputBox()"> Paypal/Visa/MasterCard <span>
                        <img src="img/pay/pay.png" alt="">
                    </span>
                </div>
                <button name="sub" type="submit" class="btn112">Place Order</button>
            </form>
            <div class="Yorder">
                <table class="table12">
                    <tr class='tr1'>
                        <th class='th1' colspan='2'>Your order</th>
                    </tr>

                </table><br>
            </div><!-- Yorder -->
        </div>
    </div>

    <footer class="section-p1">
            <div class="col">
                <h4>Contact</h4>
                <p><strong>Address:</strong> xxxxxxx, xxxxxxx</p>
                <p><strong>Phone:</strong> +01 2222 345 </p>
                <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
                <div class="Follow Us">
                    <h4>Follow us</h4>
                    <div class="icon">
                        <i class='bx bxl-facebook'></i>
                        <i class='bx bxl-twitter' ></i>
                        <i class='bx bxl-instagram' ></i>
                        <i class='bx bxl-pinterest-alt' ></i>
                        <i class='bx bxl-youtube' ></i>
                    </div>
                </div>
            </div>

            <div class="col">
                <h4>About</h4>
                <a href="#">About us</a>
                <a href="#">Devlivery Information</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Contact Us</a>
            </div>

            <div class="col">
                <h4>My Account</h4>
                <a href="#">View Cart</a>
                <a href="#">Help</a>
            </div>

            <div class="col install">
                <h4>Secured Payment Gateways</h4>
                <img src="./img/pay/pay.png" alt="">
            </div>

            <div class="copyright">
                <p>© 2024, Muhunthan - GBC </p>
            </div>
    </footer>

    <script src="script.js"></script>
    <script src="script2.js"></script>
</body>

</html>

