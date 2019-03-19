<?php
session_start();
include 'dbconnect.php';
include 'message-form-functions.php';
// Need to add a include of the connection to the database


if($_SESSION["loggedin"]== true) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['title']) || empty($_POST['message'])) echo "One or both fields are empty";
        else {
            $SQL = $connection->prepare('INSERT INTO messages SET message = :message, title=:title, img=:image');
            $SQL->bindparam(':title', $_POST['title'], PDO::PARAM_STR);
            $SQL->bindparam(':message', $_POST['message'], PDO::PARAM_STR);

            if (!empty($_FILES['image'])) {
                $ImagetoDB = ProcessImage($_FILES['image']);
                $SQL->bindParam(':image', $_POST['image'], PDO::PARAM_STR);
            }


            if ($SQL->execute()) {

                header("Location: list.php?=id" . $connection->lastInserId() . "");
            } else {
                echo "There was a error adding your message, sorry about that.";
                print_r($SQL->errorInfo());
                $SQL->debugDumpParams();
                var_dump($_POST);
            }
        }
    }
    else {

        ?>
        <body>
        <style>
            #emptyform {
                display: none;
            }
            #messagespan, #titlemessage {
                display: none;
            }

        </style>
        <form id="addmessage" method="POST" action="message-form.php" enctype="multipart/form-data">
            <div>
                <label for="title">Title of your message</label><br>
                <input id="title" type="text" name="title" </input><br>
                <span id="titlemessage" >Title should not be empty </span>
            </div>

            <div>
                <label for="message">Your message</label><br>
                <textarea id="message" name="message" ></textarea><br>
                <span id="messagespan" >Message has to be longer then 10 characters</span>
            </div>

            <div>
                <label for="image">Choose an image for your message</label>
                <input type="file" name="image"</input>
            </div>
            <div>
                <button class="btn btn-default" type="submit" id="bouwton">Submit</button>
            </div>
            <span id="emptyform" >Form can not be empty</span>
        </form>

        <script src="validate-form.js"></script>
        </body>
        <?php
    }


}