
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Users
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p><a class="btn btn-primary" href="index.php?add_user">Add User</a></p>
    </div>
    <div class="col-md-12">
        <p class="text-center alert-success"><?php display_message(); ?></p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php display_user_in_admin(); ?>
            </tbody>
        </table> <!--End of Table-->
    </div>
</div>