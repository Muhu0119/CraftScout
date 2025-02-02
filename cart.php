<?php
// Connect to the database
include("include/connect.php");

// Remove product from cart
if (isset($_GET['re'])) {
    $pid = intval($_GET['re']); // Sanitize input
    $query = "DELETE FROM cart WHERE pid = $pid";

    if (mysqli_query($con, $query)) {
        header("Location: cart.php"); // Redirect to refresh the cart page
        exit();
    } else {
        echo "Error removing product: " . mysqli_error($con);
    }
}

if (isset($_GET['remove'])) {
    $pid = $_GET['remove'];
    $query = "DELETE FROM cart WHERE pid = $pid";
    mysqli_query($con, $query);
    header("Location: cart.php");
    exit();
}

// Handle checkout
if (isset($_POST['check'])) {
    $query = "SELECT * FROM cart JOIN products ON cart.pid = products.pid";
    $result = mysqli_query($con, $query);

    // Check if the cart is empty
    if (mysqli_num_rows($result) == 0) {
        header("Location: shop.php");
        exit();
    }

    // Update cart quantities
    while ($row = mysqli_fetch_assoc($result)) {
        $pid = $row['pid'];
        $newqty = intval($_POST["$pid-qt"]);
        $updateQuery = "UPDATE cart SET cqty = $newqty WHERE pid = $pid";
        mysqli_query($con, $updateQuery);
    }

    header("Location: checkout.php");
    exit();
}
?>


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
</head>

<body onload="totala()">
    <section id="header">
    <a href="index.php"><img src="img/Logo2.png" class="logo" alt="" /></a>


        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="community.php">Community</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a class="active" href="cart.php"><i class='bx bx-shopping-bag' ></i></a></li>
                    <a href="#" id="close"><i class='bx bx-x'></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class='bx bx-shopping-bag' ></i></a>
                <i id="bar" class='bx bx-menu'></i>
            </div>
    </section>

    <section id="page-header" class="about-header">
        <h2>#SealTheDeal</h2>
        <p>Your Picks, Your Style, Your Cart.</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch all cart items without user-specific condition
                $query = "SELECT * FROM cart JOIN products ON cart.pid = products.pid";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pid = $row['pid'];
                    $pname = $row['pname'];
                    $price = $row['price'];
                    $img = $row['img'];
                    $cqty = $row['cqty'];
                    $a = $price * $cqty;
                    echo "
            <tr>
              <td><a href='cart.php?remove=$pid'>Remove</a></td>
              <td><img src='product_images/$img' alt='' /></td>
              <td>$pname</td>
              <td class='pr'>$$price</td>
              <td><input type='number' class='aqt' value='$cqty' min='1' onchange='subprice()' /></td>
              <td class='atd'>$$a</td>
            </tr>
            ";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon"></div>
        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td id='tot1' onload="totala()">$</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td id='tot' onload="totala()"><strong>$</strong></td>
                </tr>
            </table>

            <form method="post">
                <?php
                // Fetch all cart items and include hidden inputs for quantity
                $query = "SELECT * FROM cart JOIN products ON cart.pid = products.pid";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pid = $row['pid'];
                    $cqty = $row['cqty'];
                    echo "
              <input style='display: none;' name='$pid-p' class='inp' type='number' value='$pid'/>
              <input style='display: none;' name='$pid-qt' class='inq' type='number' value='$cqty'/>
              ";
                }
                ?>
                <button class="normal" name="check">Proceed to checkout</button>
            </form>
        </div>
    </section>

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

    <script>
   function confirmRemove(pid) {
    // Redirect directly to remove the product without confirmation
    window.location.href = "cart.php?re=" + pid;
}

    function subprice() {
        var qty = document.getElementsByClassName("aqt");
        var sub = document.getElementsByClassName("atd");
        var pri = document.getElementsByClassName("pr");
        var upd = document.getElementsByClassName("inq");

        for (var i = 0; i < qty.length; i++) {
            var quantity = parseInt(qty[i].value);
            var price = parseFloat(pri[i].innerText.replace('$', ''));
            sub[i].innerHTML = `$${quantity * price}`;
            upd[i].value = parseInt(qty[i].value);
        }

        totala();
    }

    function totala() {
        var pri = document.getElementsByClassName("atd");
        let yes = 0;
        for (var i = 0; i < pri.length; i++) {
            yes = yes + parseFloat(pri[i].innerText.replace('$', ''));
        }

        document.getElementById('tot').innerHTML = '$' + yes;
        document.getElementById('tot1').innerHTML = '$' + yes;
    }
    </script>
</body>
</html>
