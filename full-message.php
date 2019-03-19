<?php session_start(); 

include './partials/header.php';
include './dbconnect.php';

var_dump($_GET);
var_dump($_SESSION);

$result = GetFromDBWithId($_GET['user_id'], $connection);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

for ($count = 0; $count < count($result); $count++) {
    if(is_array($result[$count]) == true){

?>

<article class="new-message2">
    <div> <p class="user"><?php echo $result[$count]['user_id']?></p>
    </div>    
    <div class="content-message">
        <img src="<?php echo $result[$count]['image_path']?>" alt="" style="width:300px; height:300px">
        <h2 class="title"><?php echo $result[$count]['title']?></h2>
        <p class="message"><?php echo $result[$count]['message'] ?></p>
    </div>

</article>
<?php

        }
    }
}

?>
<?php include './partials/footer.php'; ?>