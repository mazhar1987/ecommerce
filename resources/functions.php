<?php

$uploads_directory = "uploads";

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

// Display Image
function display_image($img)
{
    global $uploads_directory;

    return $uploads_directory . DS . $img;
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

    $product_query = query("SELECT * FROM products WHERE product_quantity >= 1");
    confirm($product_query);

    while($row = mysqli_fetch_array($product_query))
    {
        $display_image = display_image($row['product_image']);
        $product = <<<DELIMETER
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <a href="product-details.php?id={$row['product_id']}">
                        <img src="../resources/{$display_image}" alt="{$row['product_name']}">
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
                    <div class="action">
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

    $get_cat_product_query = query("SELECT * FROM products WHERE product_quantity >= 1 AND  product_cat_id =". escape_string($_GET['id']) ." ");
    confirm($get_cat_product_query);

    while($row = mysqli_fetch_array($get_cat_product_query))
    {
        $display_image = display_image($row['product_image']);
        $cat_product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$display_image}" alt="{$row['product_name']}">
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

    $get_shop_product_query = query("SELECT * FROM products WHERE product_quantity >= 1");
    confirm($get_shop_product_query);

    while($row = mysqli_fetch_array($get_shop_product_query))
    {
        $display_image = display_image($row['product_image']);
        $shop_product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$display_image}" alt="{$row['product_name']}">
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
 * Display orders in admin
 * =======================
 */

function display_orders()
{

    $orders_query = query("SELECT * FROM orders");
    confirm($orders_query);

    while ($row = fetch_array($orders_query)) {

        $order = <<<DELIMETER
            <tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_transaction']}</td>
                <td>{$row['order_currency_code']}</td>
                <td>{$row['order_status']}</td>
                <td><a class="btn btn-danger" href="index.php?delete_order_id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>        
        DELIMETER;

        echo $order;

        
    }

}

/*
 * =======================
 * Display products in admin
 * =======================
 */

function display_product_cat_title($product_cat_id)
{
    $get_product_cat_title = query("SELECT * FROM categories WHERE cat_id= '{$product_cat_id}' ");
    confirm($get_product_cat_title);

    while ($row = fetch_array($get_product_cat_title)) {
        return $row['cat_name'];
    }
}

function display_products()
{
    $get_product_query = query("SELECT * FROM products");
    confirm($get_product_query);

    while ($row = fetch_array($get_product_query)) {

        $category_name = display_product_cat_title($row['product_cat_id']);
        $display_image = display_image($row['product_image']);

        $product = <<<DELIMETER
            <tr>
                <td>{$row['product_id']}</td>
                <td>{$row['product_name']}</td>
                <td>
                    <a href="index.php?edit_product&id={$row['product_id']}">
                        <img width="100" src="../../resources/{$display_image}" alt="">
                    </a>
                </td>
                <td>{$category_name}</td>
                <td>&#36;{$row['product_price']}</td>
                <td>{$row['product_quantity']}</td>
                <td>    
                    <a class="btn btn-success" href="index.php?edit_product&id={$row['product_id']}"><span class="glyphicon glyphicon-edit"></span></a>                 
                    <a class="btn btn-danger" href="index.php?delete_product_id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>       
        DELIMETER;

        echo $product;


    }
}


/*
 * =======================
 * Add product in admin
 * =======================
 */

function add_product()
{
    if (isset($_POST['publish'])) {
        $product_name = escape_string($_POST['product_name']);
        $product_shortDes = escape_string($_POST['product_shortDes']);
        $product_cat_id = escape_string($_POST['product_cat_id']);
        $product_des = escape_string($_POST['product_description']);
        $product_price = escape_string($_POST['product_price']);
        $product_old_price = escape_string($_POST['product_old_price']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_brand = escape_string($_POST['product_brand']);
        $product_tags = escape_string($_POST['product_tags']);

        $product_image = escape_string($_FILES['product_image']['name']);
        $product_image_tmp = escape_string($_FILES['product_image']['tmp_name']);

        // The uploaded image is moved to the images folder
        move_uploaded_file($product_image_tmp,UPLOAD_DIRECTORY . DS . $product_image);

        $get_product_query = query(" INSERT INTO products (product_name, product_cat_id, product_des, product_shortDes, product_price, product_old_price, product_quantity, product_image, product_brand, product_tags) VALUES ('{$product_name}', '{$product_cat_id}', '{$product_des}', '{$product_shortDes}', '{$product_price}', '{$product_old_price}', '{$product_quantity}', '{$product_image}', '{$product_brand}', '{$product_tags}') ");
        $last_id = last_id();
        confirm($get_product_query);
        set_message('Adding a new product and the id is: ' . $last_id);
        redirect('index.php?products');
    }
}

/*
 * =======================
 * Display Categories in the add product
 * =======================
 */

function display_categories_in_add_product_page()
{

    $cat_query = query("SELECT * FROM categories");
    confirm($cat_query);

    while ($row = fetch_array($cat_query)) {

        $categories = <<<DELIMETER
            <option value="{$row['cat_id']}">{$row['cat_name']}</option>
        DELIMETER;

        echo $categories;
    }

}

/*
 * =======================
 * Edit product in admin
 * =======================
 */

function edit_product()
{


    if (isset($_POST['update'])) {
        $product_name = escape_string($_POST['product_name']);
        $product_shortDes = escape_string($_POST['product_shortDes']);
        $product_cat_id = escape_string($_POST['product_cat_id']);
        $product_des = escape_string($_POST['product_description']);
        $product_price = escape_string($_POST['product_price']);
        $product_old_price = escape_string($_POST['product_old_price']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_brand = escape_string($_POST['product_brand']);
        $product_tags = escape_string($_POST['product_tags']);

        $product_image = escape_string($_FILES['product_image']['name']);
        $product_image_tmp = escape_string($_FILES['product_image']['tmp_name']);

        // Check product image field is empty
        if (empty($product_image)) {
            $get_image = query("SELECT product_image FROM products WHERE product_id =" . $_GET['id'] . " ");
            confirm($get_image);

            while ($row = fetch_array($get_image)) {
                $product_image = $row['product_image'];
            }
        }

        // The uploaded image is moved to the images folder
        move_uploaded_file($product_image_tmp,UPLOAD_DIRECTORY . DS . $product_image);

        $get_product_query = query(" UPDATE products SET product_name = '{$product_name}', product_cat_id = '{$product_cat_id}', product_des = '{$product_des}', product_shortDes = '{$product_shortDes}', product_price = '{$product_price}', product_old_price = '{$product_old_price}', product_quantity = '{$product_quantity}', product_image = '{$product_image}', product_brand = '{$product_brand}', product_tags = '{$product_tags}' WHERE product_id =" . escape_string($_GET['id']));
        confirm($get_product_query);
        set_message('The product has been updated!');
        redirect('index.php?products');
    }
}

/*
 * =======================
 * Categories in admin
 * =======================
 */

function display_category_in_admin()
{
    $display_cat_query = query("SELECT * FROM categories");
    confirm($display_cat_query);

    while ($row = fetch_array($display_cat_query)) {
        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];

        $categories = <<<DELIMETER
            <tr>
                <td>{$cat_id}</td>
                <td>{$cat_name}</td>
                <td><a class="btn btn-danger" href="index.php?delete_category_id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        DELIMETER;

        echo $categories;
    }
}

function add_category()
{
    if (isset($_POST['add_category'])) {
        $cat_name = escape_string($_POST['cat_name']);

        if (empty($cat_name) || $cat_name == " ") {
            set_message ("The field cannot be empty.");
        } else {

            $add_cat_query = query("INSERT INTO categories(cat_name) VALUES('{$cat_name}') ");
            confirm($add_cat_query);

            set_message("Added the category successfully!");
        }
    }
}

/*
 * =======================
 * Users in admin
 * =======================
 */

function display_user_in_admin()
{
    $display_user_query = query("SELECT * FROM users");
    confirm($display_user_query);

    while ($row = fetch_array($display_user_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];

        $display_image = display_image($row['user_image']);

        $users = <<<DELIMETER
            <tr>
                <td>{$user_id}</td>
                <td>
                    <img width="50" src="../../resources/{$display_image}" alt="">
                </td>
                <td>{$username}</td>
                <td>{$user_password}</td>
                <td>{$user_firstname}</td>
                <td>{$user_lastname}</td>
                <td>{$user_email}</td>
                <td>                        
                    <a class="btn btn-success" href="index.php?edit_user&id={$user_id}"><span class="glyphicon glyphicon-edit"></span></a>                 
                    <a class="btn btn-danger" href="index.php?delete_user_id={$user_id}"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        DELIMETER;

        echo $users;

    }
}


/*
 * =======================
 * Add User in admin
 * =======================
 */

function add_user()
{
    if (isset($_POST['add_user'])) {
        $username = escape_string($_POST['username']);
        $user_password = escape_string($_POST['user_password']);
        $user_firstname = escape_string($_POST['user_firstname']);
        $user_lastname = escape_string($_POST['user_lastname']);
        $user_email = escape_string($_POST['user_email']);

        $user_image = escape_string($_FILES['user_image']['name']);
        $user_image_tmp = escape_string($_FILES['user_image']['tmp_name']);

        // The uploaded image is moved to the images folder
        move_uploaded_file($user_image_tmp,UPLOAD_DIRECTORY . DS . $user_image);

        $add_user_query = query(" INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_image) VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}') ");
        $last_id = last_id();
        confirm($add_user_query);
        set_message('Adding a new user and the id is: ' . $last_id);
        redirect('index.php?users');
    }
}

/*
 * =======================
 * Edit user in admin
 * =======================
 */

function edit_user()
{


    if (isset($_POST['update'])) {
        $username = escape_string($_POST['username']);
        $user_password = escape_string($_POST['user_password']);
        $user_firstname = escape_string($_POST['user_firstname']);
        $user_lastname = escape_string($_POST['user_lastname']);
        $user_email = escape_string($_POST['user_email']);

        $user_image = escape_string($_FILES['user_image']['name']);
        $user_image_tmp = escape_string($_FILES['user_image']['tmp_name']);

        // Check product image field is empty
        if (empty($user_image)) {
            $get_image = query("SELECT user_image FROM users WHERE user_id =" . $_GET['id'] . " ");
            confirm($get_image);

            while ($row = fetch_array($get_image)) {
                $user_image = $row['user_image'];
            }
        }

        // The uploaded image is moved to the images folder
        move_uploaded_file($user_image_tmp,UPLOAD_DIRECTORY . DS . $user_image);

        $edit_user_query = query(" UPDATE users SET username = '{$username}', user_password = '{$user_password}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_email = '{$user_email}', user_image = '{$user_image}' WHERE user_id =" . escape_string($_GET['id']));
        confirm($edit_user_query);
        set_message('The user has been updated!');
        redirect('index.php?users');
    }
}

/*
 * =======================
 * Display reports in admin
 * =======================
 */

function display_reports()
{

    $reports_query = query("SELECT * FROM reports");
    confirm($reports_query);

    while ($row = fetch_array($reports_query)) {

        $report = <<<DELIMETER
            <tr>
                <td>{$row['report_id']}</td>
                <td>{$row['product_id']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['order_id']}</td>
                <td>{$row['product_price']}</td>
                <td>{$row['product_quantity']}</td>
                <td>                                        
                    <a class="btn btn-danger" href="index.php?delete_report_id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>        
        DELIMETER;

        echo $report;


    }

}

/*
 * =======================
 * Slider
 * =======================
 */

function add_slide()
{
    if (isset($_POST['add_slider'])) {
        $slider_title = escape_string($_POST['slider_title']);
        $slider_image = escape_string($_FILES['slider_image']['name']);
        $slider_image_tmp = escape_string($_FILES['slider_image']['tmp_name']);

        if (empty($slider_title) && empty($slider_image)) {
            echo "<p class='bg-danger'>The fields can not empty.</p>";
        } else {

            // The uploaded image is moved to the images folder
            move_uploaded_file($slider_image_tmp, UPLOAD_DIRECTORY . DS . $slider_image);

            $add_slider_query = query(" INSERT INTO sliders (slider_title, slider_image) VALUES ('{$slider_title}', '{$slider_image}') ");
            confirm($add_slider_query);
            set_message('Adding a slider item.');
            redirect('index.php?slides');
        }
    }

}

function get_current_slide_in_admin()
{
    $current_slide_query = query("SELECT * FROM sliders ORDER BY slider_id DESC LIMIT 1");
    confirm($current_slide_query);

    while ($row = fetch_array($current_slide_query)) {

        $display_image = display_image($row['slider_image']);

        $slide_current = <<<DELIMETER
            <div class="item active">
                <img class="slide-image img-responsive img-rounded" width="500" src="../../resources/{$display_image}" alt="{$row['slider_title']}">
            </div>
        DELIMETER;

        echo $slide_current;

    }
}

function get_active_slide()
{
    $active_slide_query = query("SELECT * FROM sliders ORDER BY slider_id DESC LIMIT 1");
    confirm($active_slide_query);

    while ($row = fetch_array($active_slide_query)) {

        $display_image = display_image($row['slider_image']);

        $slide_active = <<<DELIMETER
            <div class="item active">
                <img class="slide-image" src="../resources/{$display_image}" alt="{$row['slider_title']}">
            </div>
        DELIMETER;

        echo $slide_active;

    }
}

function get_slides()
{
    $get_slide_query = query("SELECT * FROM sliders");
    confirm($get_slide_query);

    while ($row = fetch_array($get_slide_query)) {

        $display_image = display_image($row['slider_image']);

        $slides = <<<DELIMETER
            <div class="item">
                <img class="slide-image" src="../resources/{$display_image}" alt="{$row['slider_title']}">
            </div>
        DELIMETER;

        echo $slides;

    }
}

function get_slide_thumbnails()
{
    $get_slide_thumb_query = query("SELECT * FROM sliders ORDER BY slider_id DESC");
    confirm($get_slide_thumb_query);

    while ($row = fetch_array($get_slide_thumb_query)) {

        $display_image = display_image($row['slider_image']);

        $slides = <<<DELIMETER
        <div class="col-md-2">
            <img class="img-responsive img-rounded" src="../../resources/{$display_image}" alt="{$row['slider_title']}">
            <br>
            <div class="btn-group"> 
                <a href="index.php?edit_slider&id={$row['slider_id']}" class="btn btn-primary" role="button">Edit</a>
                <a href="index.php?delete_slider_id={$row['slider_id']}" class="btn btn-danger delete-slider-item" role="button">Delete</a>
            </div>
        </div>
        DELIMETER;

        echo $slides;

    }
}

function edit_slider()
{

    if (isset($_POST['update_slider'])) {
        $slider_title = escape_string($_POST['slider_title']);

        $slider_image = escape_string($_FILES['slider_image']['name']);
        $slider_image_tmp = escape_string($_FILES['slider_image']['tmp_name']);

        // Check product image field is empty
        if (empty($slider_image)) {
            $get_image = query("SELECT slider_image FROM sliders WHERE slider_id =" . $_GET['id'] . " ");
            confirm($get_image);

            while ($row = fetch_array($get_image)) {
                $slider_image = $row['slider_image'];
            }
        }

        // The uploaded image is moved to the images folder
        move_uploaded_file($slider_image_tmp,UPLOAD_DIRECTORY . DS . $slider_image);

        $edit_slider_query = query(" UPDATE sliders SET slider_title = '{$slider_title}', slider_image = '{$slider_image}' WHERE slider_id =" . escape_string($_GET['id']));
        confirm($edit_slider_query);
        set_message('The slider item has been updated!');
        redirect('index.php?slides');
    }
}