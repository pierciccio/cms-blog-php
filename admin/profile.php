<?php include "includes/admin_header.php"; ?>
<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}
?>


<?php
if (isset($_POST['edit_profile'])) {

    //$user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    //$user_image = $_FILES['image']['name'];
    //$user_image_temp = $_FILES['image']['tmp_name'];    
    $user_role = $_POST['user_role'];

    $query = "UPDATE users SET ";
    $query .= "username  = '{$username}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname   =  '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    //$query .= "user_image   = '{$user_image}', ";
    $query .= "user_role= '{$user_role}' ";
    $query .= "WHERE username = '{$username}' ";

    $edit_profile_query = mysqli_query($connection, $query);
    confirmQuery($edit_profile_query);


    /*if (empty($user_image)) {

        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_image = mysqli_query($connection, $query);*/

    header("Location: index.php");
}
?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">
                Welcome Admin
                <small><?php echo $_SESSION['username']; ?></small>
            </h1>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="usernmae">Username</label>
                    <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
                </div>

                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
                </div>

                <div class="form-group">
                    <label for="user_firstname">Firstname</label>
                    <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
                </div>

                <div class="form-group">
                    <label for="user_lastname">Lastname</label>
                    <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
                </div>

                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
                </div>

                <!-- <div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" name="user_image">
</div> -->

                <div class="form-group">
                    <label for="user_role">User Role</label>
                    <select name="user_role" id="">
                        <option value="subscriber"><?php echo $user_role; ?></option>
                        <?php
                        if ($user_role == 'admin') {
                            echo "<option value='subscriber'>subscriber</option>";
                        } else {
                            echo "<option value='admin'>admin</option>";
                        }

                        ?>

                    </select>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="edit_profile" value="Update Profile">
                </div>


            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>