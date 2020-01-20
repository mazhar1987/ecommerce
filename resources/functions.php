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
        echo $row['product_price'];
    }
}