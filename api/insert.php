<?php

include ('../includes/init.php');

$name = $_POST['name'];
$password = $_POST['password'];

$query = "INSERT INTO just (name, password) VALUES (?, ?)";
$params = [$name, $password];

$statement = $connection->prepare($query);
$data = $statement->execute($params);

echo $data;
