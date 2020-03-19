<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php include_once(TEMPLATE_BACK . DS . 'admin_topbar.php'); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="index.php?products"><i class="fa fa-fw fa-bar-chart-o"></i> Products</a>
            </li>
            <li>
                <a href="index.php?categories"><i class="fa fa-fw fa-desktop"></i> Categories</a>
            </li>
            <li>
                <a href="index.php?users"><i class="fa fa-fw fa-wrench"></i>Users</a>
            </li>
            <li>
                <a href="index.php?orders"><i class="fa fa-fw fa-shopping-cart"></i> Orders</a>
            </li>
            <li>
                <a href="index.php?reports"><i class="fa fa-fw fa-flag"></i> Reports</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>