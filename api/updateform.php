<?php

include ('../includes/init.php');

$id = $_GET['id'];

$query = "SELECT * FROM just WHERE id=$id";
$statement = $connection->prepare($query);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        <input type="hidden" id="id" value="<?= $id ?>">
        Name :<input type="text" id="name" value="<?= $data['name'] ?>">
        Password :<input type="text" id="password" value="<?= $data['password'] ?>">
        <button onclick="updateData()">Update</button>
    </form>

    <script src="../js/jquery.min.js"></script>
    <script>
        function updateData() {
            $.ajax({
                url: '../api/update.php',
                type: 'POST',
                data: {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    password: $('#password').val(),
                },
                success: function (response) {
                    if (response == 0)
                        return window.location = '../index.php';

                    alert("Data Upadated Successfully !");
                    window.location.href = '../index.php';
                }
            });
        }
    </script>
</body>

</html>