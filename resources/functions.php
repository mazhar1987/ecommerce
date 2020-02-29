<?php

/*
 * =======================
 * General Helper Function
 * =======================
 */

// Set Message
function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = '';
    }
}

// Display Message
function display_message()
{
    if (isset($_SESSION['message']))  {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

// Redirect
function redirect($loc)
{
    header("Location: $loc");
}

/*
 * =======================
 * Database Helper Function
 * =======================
 */

// Query
function query($sql)
{
    global $connect;

    return mysqli_query($connect, $sql);
}

// Confirm Query
function confirm($result)
{
    global $connect;

    if (!$result) {
        die("Query failed! " . mysqli_error($connect));
    }
}

// Escape string
function escape_string($string)
{
    global $connect;

    return mysqli_real_escape_string($connect, $string);
}

// Fetch data as array
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

/*
 * =======================
 * Get Products Function
 * =======================
 */

function get_products()
{

    $product_query = query("SELECT * FROM products");
    confirm($product_query);

    while($row = mysqli_fetch_array($product_query))
    {
        $product = <<<DELIMETER
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <a href="product-details.php?id={$row['product_id']}">
                        <img src="{$row['product_image']}" alt="{$row['product_name']}">
                    </a>                    
                    <div class="caption">
                        <h4><a href="product-details.php?id={$row['product_id']}">{$row['product_name']}</a></h4>
                        <span class="label label-default pull-left">&#36;{$row['product_old_price']}</span>
                        <span class="label label-danger pull-right">&#36;{$row['product_price']}</span>
                        <br>
                        <p>{$row['product_des']}</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">6 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                    </div>
                    <div class="action" style="display: inline-block;width: 100%;padding-left: 8px;padding-right: 8px;">
                        <a href="product-details.php?id={$row['product_id']}" target="_blank" class="btn btn-primary pull-left">View Details</a>
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-danger pull-right">Add to Cart</a>
                    </div>
                </div>
            </div>
        DELIMETER;

        echo $product;

    }
}

function get_products_in_category_page()
{

    $get_cat_product_query = query("SELECT * FROM products WHERE product_cat_id =". escape_string($_GET['id']) ." ");
    confirm($get_cat_product_query);

    while($row = mysqli_fetch_array($get_cat_product_query))
    {
        $cat_product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="{$row['product_name']}">
                    <div class="caption">
                        <h4>{$row['product_name']}</h4>
                        <p>{$row['product_shortDes']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Add to Cart</a> 
                            <a href="product-details.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
        DELIMETER;

        echo $cat_product;

    }
}
function get_products_in_shop_page()
{

    $get_shop_product_query = query("SELECT * FROM products");
    confirm($get_shop_product_query);

    while($row = mysqli_fetch_array($get_shop_product_query))
    {
        $shop_product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="{$row['product_name']}">
                    <div class="caption">
                        <h4>{$row['product_name']}</h4>
                        <p>{$row['product_shortDes']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Add to Cart</a> 
                            <a href="product-details.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
        DELIMETER;

        echo $shop_product;

    }
}

/*
 * =======================
 * Get Categories
 * =======================
 */

function get_categories()
{

    $cat_query = query("SELECT * FROM categories");
    confirm($cat_query);

    while ($row = fetch_array($cat_query)) {

        $categories = <<<DELIMETER
            <a class='list-group-item' href='category.php?id={$row['cat_id']}'>{$row['cat_name']}</a>
        DELIMETER;

        echo $categories;
    }

}

/*
 * =======================
 * Login user
 * =======================
 */

function login_user()
{
    if (isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $user_query = query("SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'");
        confirm($user_query);

        if (mysqli_num_rows($user_query) == 0) {
            set_message("Your username and password does not match.");
            redirect('login.php');
        } else {
            $_SESSION['username'] = $username;
            set_message("Welcome to Admin area Mr. {$username}");
            redirect('admin');
        }
    }
}

/*
 * =======================
 * Contact form
 * =======================
 */

function send_email()
{
    if (isset($_POST['submit'])) {
        $to = 'test@admin.com';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $headers = "From: {$name} {$email}";

        $result = mail($to, $subject, $message, $headers);

        if (!$result) {
            set_message("Sorry! We could not sent your email.");
            redirect('contact.php');
        } else {
            set_message("Your message has been sent!");
            redirect('contact.php');
        }
    }
}

/*
 * =======================
 * Shopping Cart
 * =======================
 */

function shoppingCart()
{

    $total = 0;
    $subTotal = 0;
    $item_quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;

    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 8 ) == 'product_') {

                $length = strlen($name);
                $id = substr($name, 8, $length);

                $cart_query = query("SELECT * FROM products WHERE product_id=" . escape_string($id) . " ");
                confirm($cart_query);

                while ($row = fetch_array($cart_query)) {
                    $subTotal = $row['product_price'] * $value;
                    $product_cart = <<<DELIMETER
                        <tr>
                            <td>{$row['product_name']}</td>
                            <td>&#36;{$row['product_price']}</td>
                            <td>{$value}</td>
                            <td>&#36;{$subTotal}</td>
                            <td>
                                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
                                <a href="../resources/cart.php?remove={$row['product_id']}" class="btn btn-warning"><span class="glyphicon glyphicon-minus"></span></a>
                                <a href="../resources/cart.php?delete={$row['product_id']}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <input type="hidden" name="item_name_{$item_name}" value="{$row['product_name']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                        <input type="hidden" name="quantity_{$quantity}" value="{$value}">
                        <input type="hidden" name="upload" value="1">
                    DELIMETER;

                    echo $product_cart;
                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;
                }

                $_SESSION['item_total'] = $total += $subTotal;
                $_SESSION['item_quantity'] = $item_quantity += $value;

            }
        }
    }
}

function show_paypal()
{

    if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1) {
        $payPal_button = <<<DELIMETER
            <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        DELIMETER;

        return $payPal_button;
    }
}


/*
 * =======================
 * Report
 * =======================
 */

function transactions_process()
{

    if (isset($_GET['tx'])) {
        $amount = $_GET['amt'];
        $currency_code = $_GET['cc'];
        $transaction = $_GET['tx'];
        $status = $_GET['st'];

        $total = 0;
        $subTotal = 0;
        $item_quantity = 0;


        foreach ($_SESSION as $name => $value) {
            if ($value > 0) {
                if (substr($name, 0, 8) == 'product_') {

                    $length = strlen($name);
                    $id = substr($name, 8, $length);

                    $cart_query = query("SELECT * FROM products WHERE product_id=" . escape_string($id) . " ");
                    confirm($cart_query);

                    while ($row = fetch_array($cart_query)) {
                        $subTotal = $row['product_price'] * $value;
                        $item_quantity += $value;

                        // For Order
                        $order_query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency_code) VALUES ('{$amount}', '{$transaction}', '{$status}', '{$currency_code}')");
                        $last_id = last_id();
                        confirm($order_query);

                        $product_price = $row['product_price'];
                        $product_name = $row['product_name'];

                        // For Report

                        $report_query = query("INSERT INTO reports (product_id, product_name, order_id, product_price, product_quantity) VALUES ('{$id}', '{$product_name}', '{$last_id}', '{$product_price}', '{$value}')");
                        confirm($report_query);

                    }

                    $total += $subTotal;
                    $item_quantity;

                }
            }
        }

        session_destroy();

    } else {
        redirect('index.php');
    }
}

function last_id()
{
    global $connect;

    return mysqli_insert_id($connect);
}


/*
 * =======================
 * Orders Page in backend
 * =======================
 */

function display_orders()
{

    $orders_query = query("SELECT * FROM orders");
    confirm($orders_query);

    while ($row = fetch_array($orders_query)) {

        $orders = <<<DELIMETER
            <tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_transaction']}</td>
                <td>{$row['order_currency_code']}</td>
                <td>{$row['order_status']}</td>
                <td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>        
        DELIMETER;

        echo $orders;

        
    }

}