<?php

include 'dbconnect.php';

$username_error = "";
$password_error = "";


// Processing the form data when its submitted
if ($_SERVER["REQUEST_METHOD"]== "POST") {

//FillIn SQL with the Bind params :USERNAME
$SQL = $connection->prepare('SELECT * FROM users WHERE user_name = :USERNAME');
$SQL->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
$SQL->execute();
$result = $SQL->fetch();
if($result['username']) {
    if(password_verify($_POST['password'], $result['password'])){
        // Password is correct, so start a new session
        session_start();
        // Store data in session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['user_name'];


        // Redirect user to welcome page
        header("location: list.php");
    }
    else {
        // Display an error message if password is not valid
        $password_err = "The password you entered was not valid.";
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
            <input type="text" name="username" class="form-control">
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

