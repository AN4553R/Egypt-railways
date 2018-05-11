<?php
	include('dbclass.php');
	$r = $db->pdo->exec(file_get_contents('MYTASK.sql'));
	if($r)
  		echo  "Data are added successfully!<br/>";
  	else
 		echo  "Error.<br/>";
?>
