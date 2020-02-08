<div class="col-md-3">
    <p class="lead">Categories</p>
    <div class="list-group">

        <?php
        $cat_query = query("SELECT * FROM categories");
        confirm($cat_query);

        while ($row = fetch_array($cat_query)) {
            echo "<a class='list-group-item' href='#'>{$row['cat_name']}</a>";
        }
        ?>
    </div>
</div>