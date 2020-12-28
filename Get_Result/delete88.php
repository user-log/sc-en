<?php
include 'connect.php';
$stmt = $con->prepare("TRUNCATE TABLE `results`");
$stmt->execute();

?>