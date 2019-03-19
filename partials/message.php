<?php
session_start();

$shortStr = substr('message', 0, 100);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

for ($count = 0; $count < count($result); $count++) {
    if(is_array($result[$count]) == true){


?>


<article class="new-message2">
    <div> <p class="user"><?php echo $result[$count]['username']?></p>
    </div>    
    <div class="content-message">
        <img src="<?php echo $result[$count]['image']?>" alt="" style="width:300px; height:300px">
        <h2 class="title"><?php echo $result[$count]['title']?></h2>
        <p class="message"><?php echo $result[$shortStr]['message']?></p>
    </div>
    <button type="button" class="read-message"> 
            <a href="./partials/full-message.php"> <p class="read">
            <?php  echo ("<button onclick=\"location.href='./partials/full-message.php'\">Read More</button>")?> 
        </p></a></button>
</article>


<?php
        }
    }
}


