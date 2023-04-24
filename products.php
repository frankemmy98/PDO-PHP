<?php

require_once('database.php');

if (!empty($_GET['id'])) {
    $product_id = intval($_GET['id']);

    try {
        $results = $db->prepare('select * from products where id = ?');
        $results->bindParam(1, $product_id);
        $results->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}

$product = $results->fetch(PDO::FETCH_ASSOC);
if ($product == FALSE) {
    echo 'Sorry, a film could not be found with the provided ID.';
    die();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Data Objects</title>
</head>

<body id="home">
    <h1>Sakila Sample Database</h1>

    <h2>
        <?php
        if (isset($product)) {
            echo $product['name'];
        }
        ?>
    </h2>
</body>

</html>