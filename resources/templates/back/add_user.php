
<?php
add_user();
?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center alert-success"><?php display_message(); ?></h3>
        <h1 class="page-header">
            Dashboard <small>Add User</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Add User
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="username">User Name </label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="user_firstname">First Name</label>
                            <input type="text" name="user_firstname" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="user_lastname">Last Name</label>
                            <input type="text" name="user_lastname" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" name="user_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user_image">User Image</label>
                        <input type="file" name="user_image">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_user" class="btn btn-primary btn-lg" value="Add User">
                    </div>
                </div><!--Main Content-->
            </div>
        </form>
    </div>
</div>
