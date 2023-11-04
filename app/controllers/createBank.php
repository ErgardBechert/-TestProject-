<?php

require_once '../../database/connect.php';

$db = new Database();

$logo = '../../media/logo/' . basename($_FILES['logo']['name']);
move_uploaded_file($_FILES['logo']['tmp_name'], $logo);

$name = $_POST['name'];
$interest_rate = $_POST['interest_rate'];
$loan_term = $_POST['loan_term'];
$monthly_payment = $_POST['monthly_payment'];

$query = "INSERT INTO `Bank` (`logo`, `name`, `interest_rate`, `loan_term`, `monthly_payment`) VALUES (?, ?, ?, ?, ?)";

$db->execute($query, array($logo, $name, $interest_rate, $loan_term, $monthly_payment));

header('Location: /');