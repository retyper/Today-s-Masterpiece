<?php
file_put_contents('./data/'.$_POST['picname'],$_POST['review']);
header('location: record.php');
?>
