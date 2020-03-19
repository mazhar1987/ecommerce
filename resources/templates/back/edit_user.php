
<?php

// Check if product is available
if (isset($_GET['id'])) {
    $user_has_query = query("SELECT * FROM users WHERE user_id =" . escape_string($_GET['id']) . " ");
    confirm($user_has_query);

    while ($row = fetch_array($user_has_query)) {
        $user_id = escape_string($row['user_id']);
        $username = escape_string($row['username']);
        $user_password = escape_string($row['user_password']);
        $user_firstname = escape_string($row['user_firstname']);
        $user_lastname = escape_string($row['user_lastname']);
        $user_email = escape_string($row['user_email']);
        $user_image = escape_string($row['user_image']);
    }

    edit_user();
}


?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center alert-success"><?php display_message(); ?></h3>
        <h1 class="page-header">
            Dashboard <small>Edit User</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Edit User
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="username">User Name </label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="user_password">Password</label>
                            <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="user_firstname">First Name</label>
                            <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="user_lastname">Last Name</label>
                            <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="user_email">Email</label>
                            <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="user_image">User Image</label>
                            <input type="file" name="user_image" class="form-control">
                            <br>
                            <img width="100" src="../../resources/<?php echo display_image($user_image); ?>" alt="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" class="btn btn-primary btn-lg btn-block" value="Update">
                    </div>
                </div><!--Main Content-->
            </div>
        </form>
    </div>
</div>
