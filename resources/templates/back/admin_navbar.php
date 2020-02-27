<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php include_once(TEMPLATE_BACK . DS . 'admin_topbar.php'); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="products.html"><i class="fa fa-fw fa-bar-chart-o"></i> View Products</a>
            </li>
            <li>
                <a href="add_product.html"><i class="fa fa-fw fa-table"></i> Add Product</a>
            </li>

            <li>
                <a href="categories.html"><i class="fa fa-fw fa-desktop"></i> Categories</a>
            </li>
            <li>
                <a href="users.html"><i class="fa fa-fw fa-wrench"></i>Users</a>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>