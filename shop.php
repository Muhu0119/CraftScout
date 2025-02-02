<?php
session_start();
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
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <style>
        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background: #e3e6f3;
            padding: 10px;
        }

        #category-filter {
            padding: 6px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
        }

        #search {
            padding: 6px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
        }

        #search-btn {
            outline: none;
            border: none;
            padding: 10px 30px;
            background-color: navy;
            color: white;
            border-radius: 1rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section id="header">
    <a href="index.php"><img src="img/Logo2.png" class="logo" alt="" /></a>
    <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="community.php">Community</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>save more with coupons & up to 70% off!</p>
    </section>

    <div class="search-container">
        <form id="search-form" method="post">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search">
            <label for="category-filter">Category:</label>
            <select id="category-filter" name="cat">
                <option value="all">All</option>
                <option value="Box">Box</option>
                <option value="Chair">Chair</option>
                <option value="Closet">Closet</option>
                <option value="Shelf">Shelf</option>
                <option value="Table">Table</option>
                <option value="Bed">Bed</option>
            </select>
            <button type="submit" id="search-btn" name="search1">Search</button>
        </form>
    </div>

    <?php
    include("include/connect.php");

    if (isset($_POST['search1'])) {
        $search = $_POST['search'];
        $category = $_POST['cat'];
        $query = "SELECT * FROM `products`";

        if (!empty($search)) {
            $query .= " WHERE (pname LIKE '%$search%' OR brand LIKE '%$search%' OR description LIKE '%$search%')";
        }

        if ($category != "all") {
            $query .= empty($search) ? " WHERE" : " AND";
            $query .= " category = '$category'";
        }

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<section id='product1' class='section-p1'>
                    <div class='pro-container'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $pid = $row['pid'];
                $pname = $row['pname'];
                $pname = strlen($pname) > 35 ? substr($pname, 0, 35) . '...' : $pname;
                $price = $row['price'];
                $img = $row['img'];
                $brand = $row['brand'];

                echo "
                    <div class='pro' onclick='topage($pid)'>
                        <img src='product_images/$img' height='235px' width='235px' alt='' />
                        <div class='des'>
                            <span>$brand</span>
                            <h5>$pname</h5>
                            <h4>$$price</h4>
                        </div>
                        <a onclick='topage($pid)'><i class='fal fa-shopping-cart cart'></i></a>
                    </div>
                ";
            }
            echo "</div></section>";
        }
    } else {
        $select = "SELECT * FROM products WHERE qtyavail > 0 ORDER BY RAND()";
        $result = mysqli_query($con, $select);

        if ($result) {
            echo "<section id='product1' class='section-p1'>
                    <div class='pro-container'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $pid = $row['pid'];
                $pname = $row['pname'];
                $pname = strlen($pname) > 35 ? substr($pname, 0, 35) . '...' : $pname;
                $price = $row['price'];
                $img = $row['img'];
                $brand = $row['brand'];

                echo "
                    <div class='pro' onclick='topage($pid)'>
                        <img src='product_images/$img' height='235px' width='235px' alt='' />
                        <div class='des'>
                            <span>$brand</span>
                            <h5>$pname</h5>
                            <h4>$$price</h4>
                        </div>
                        <a onclick='topage($pid)'><i class='fal fa-shopping-cart cart'></i></a>
                    </div>
                ";
            }
            echo "</div></section>";
        }
    }
    ?>

<button id="chatbot-toggler">
            <span class="material-symbols-rounded">mode_comment</span>
            <span class="material-symbols-rounded">close</span>
        </button>

        <div class="chatbot-popup">
            <div class="chat-header">
                <div class="header-info">
                    <svg class="chatbot-logo" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
                        <path d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0 106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9 267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0 35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7 0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"></path>
                    </svg>
                    <h2 class="logo text">Craft AI</h2>
                </div>
                <button id="close-chatbot" class="material-symbols-rounded">keyboard_arrow_down</button>
            </div>

            <div class="chat-body">
                <div class="message bot-message">
                    <svg class="bot-avatar" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
                        <path d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0 106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9 267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0 35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7 0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"></path>
                    </svg>
                    <div class="message-text">Hey there <br> How can i help you today</div>
                </div>

            </div>

            <div class="chat-footer">
                 <form action="#" class="chat-form">
                    <textarea placeholder="Message..." class="message-input" required></textarea>
                    <div class="chat-controls">
                        <button type="button"class="material-symbols-rounded">sentiment_satisfied</button>
                        <button type="button"class="material-symbols-rounded">attach_file</button>
                        <button type="submit" id="send-message"  class="material-symbols-rounded">arrow_upward</button>
                    </div>
                 </form>
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

    <script>
        function topage(pid) {
            window.location.href = `sproduct.php?pid=${pid}`;
        }
    </script>
</body>

</html>
