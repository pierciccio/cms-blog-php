<?php
if (isset($_POST['create_user'])) {

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    //$user_image = $_FILES['image']['name'];
    //$user_image_temp = $_FILES['image']['tmp_name'];    
    $user_role = $_POST['user_role'];


    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email,  user_role) ";

    $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    header("Location: users.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="usernmae">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <!-- <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div> -->

    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="">
            <option value=''><?php echo $user_role; ?></option>
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
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>


</form>