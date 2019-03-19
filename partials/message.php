<?php
session_start();

include './dbconnect.php';

$SQL = $connection->prepare('SELECT * FROM messages');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
$result = $SQL->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

for ($count = 0; $count < count($result); $count++) {
    if(is_array($result[$count]) == true){

        $shortStr = mb_strimwidth($result[$count]['message'], 0, 100,'...');
?>

<article class="new-message2">
    <div> <p class="user"><?php echo $result[$count]['user_id']?></p>
    </div>    
    <div class="content-message">
        <img src="<?php echo $result[$count]['image_path']?>" alt="" style="width:300px; height:300px">
        <h2 class="title"><?php echo $result[$count]['title']?></h2>
        <p class="message"><?php echo $shortStr ?></p>
    </div>
    <button type="button" class="read-message"> 
            <a href="./partials/full-message.php"> <p class="read">
            <?php  echo "<submit onclick=\"location.href='./partials/full-message.php'\">Read More</submit>";?>
        </p></a></button>
</article>


<?php
        }
    }
}


