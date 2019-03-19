<?php


//Function returns an Array with results from DB
function GetFromDBWithId($Id, $connectionIn) {
	$SQL = $connectionIn->prepare('SELECT * FROM messages WHERE user_id = :ID');
	$SQL->bindParam(':ID', $Id, PDO::PARAM_STR);
	$SQL->execute();
	$SQL->setFetchMode(PDO::FETCH_ASSOC);
	print_r($SQL->rowCount());
	$result = $SQL->fetchAll();
	return ($result);
}


?>