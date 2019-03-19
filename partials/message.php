<?php
session_start();
include './dbconnect.php';

$SQL = $connection->prepare('SELECT * FROM messages');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
$result = $SQL->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    for ($count = 0; $count < count($result); $count++) {
        if (is_array($result[$count]) == true) {


            echo "<h1> " . $result[$count]['title'] . "</h1></a>";
            echo "<p> " . $result[$count]['message'] . "</p>";
            echo "<img src='" . $result[$count]['image_path'] . "'>";
            echo "</div>";
        }
    }
}
//Apolline code to put back if my fix does not work
/*        <h2><?php echo $result[$count]['title']?></h2>

        <p>
        <img src=" <?php echo $result[$count]['image']?>" alt="">
         <?php echo $result[$count]['message']?></p>*/
