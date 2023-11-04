<?php

require_once '../../database/connect.php';

$db = new Database();

$background = '../../media/promotion/' . basename($_FILES['background']['name']);
move_uploaded_file($_FILES['background']['tmp_name'], $background);

$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$interest_rate = $_POST['interest_rate'];
$target_audience = $_POST['target_audience'];


$query = "INSERT INTO `Promotion` (`background`, `title`, `subtitle`, `interest_rate`, `target_audience`) VALUES (?, ?, ?, ?, ?);";

$db->execute($query, array($background, $title, $subtitle, $interest_rate, $target_audience));

header('Location: /');