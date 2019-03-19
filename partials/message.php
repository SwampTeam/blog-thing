<?php
session_start();

$shortStr = substr(['message'], 0, 100);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

for ($count = 0; $count < count($result); $count++) {
    if(is_array($result[$count]) == true){


?>
        <p><?php echo $result[$count]['username']?></p>
        <img src=" <?php echo $result[$count]['image']?>" alt="">
        <h2><?php echo $result[$count]['title']?></h2>
        <p><?php echo $result[$shortStr]['message']?></p>
        <button type="button"  class="read-message"> <a href="./partials/full-mesage.php"> <p class="read"><?php echo $result[$count]['button']?></p></a></button>
        

<?php
        }
    }
}


