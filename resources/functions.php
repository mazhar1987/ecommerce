<?php

/*
 * =======================
 * General Helper Function
 * =======================
 */

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
        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
            <div class="category">
                <div class="ht__cat__thumb">
                    <a href="product-details.php?id={$row['product_id']}">
                        <img src="{$row['product_image']}" alt="{$row['product_name']}">
                    </a>
                </div>
                <div class="fr__hover__info">
                    <ul class="product__action">
                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                    </ul>
                </div>
                <div class="fr__product__inner">
                    <h4><a href="product-details.php?id={$row['product_id']}">{$row['product_name']}</a></h4>
                    <p>{$row['product_des']}</p>
                    <ul class="fr__pro__prize">
                        <li class="old__prize">&#36;{$row['product_old_price']}</li>
                        <li>&#36;{$row['product_price']}</li>
                    </ul>
                </div>
            </div>
        </div>
        DELIMETER;

        echo $product;

    }
}