<?php

include 'dbconnect.php';

$username_error = "";
$password_error = "";


// Processing the form data when its submitted
if ($_SERVER["REQUEST_METHOD"]== "POST") {

    //Making the SQL connection
    $SQL = $connection->prepare('SELECT * FROM `users` WHERE `username`= :USERNAME' );
    $SQL = $connection->prepare('SELECT * FROM `users` WHERE `password`= :PASSWORD' );
    //Binding the parameteres
    $SQL ->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
    $SQL ->execute();
    //Executing the SQL
    $result = $SQL->fetch();
    if($result['username']) {
        //Verifying the password
        if(password_verify($_POST['password'], $result['password'])) {
            session_start();


            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $result["id"];
            $_SESSION["username"] = $result["username"];
            session_write_close();

            header("location: list.php");

        }else {
            $password_error = "Password you entered is not correct";
        }
    }else {
        $username_error = "Username you entered is not correct ";

    }
}

//include 'header.php';

?>

<div>
    <h1>Login</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div>
            <label>Username</label>
            <?php echo $username_error;?>
            <input type="text" name="username" class="form-control" value="">
        </div>
        <div>
            <?php echo $password_error;?>
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div>
            <input type="submit"  value="Login">
        </div>
    </form>
</div>

