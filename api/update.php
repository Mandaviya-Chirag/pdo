<?php

include ('../includes/init.php');

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];

$query = "UPDATE just SET name=?, password=? WHERE id=?";
$params = [$name, $password, $id];

$statement = $connection->prepare($query);
$statement->execute($params);

?>