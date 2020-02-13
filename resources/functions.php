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
                        <a href="#" class="btn btn-danger pull-right">Add to cart</a>
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
                            <a href="#" class="btn btn-primary">Buy Now!</a> 
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
                            <a href="#" class="btn btn-primary">Buy Now!</a> 
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