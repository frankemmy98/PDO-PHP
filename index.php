<?php

require_once('database.php');

try {

    // $db->exec("INSERT INTO products(name) VALUES('hp')");
    // $db->exec("INSERT INTO products(name) VALUES('dell')");
    // $db->exec("INSERT INTO products(name) VALUES('mac')");

    // print "<table border=1>";

    // print "<tr><td> Id </td><td> Name </td></tr>";

    $results = $db->query('select * from products');
    // echo '<pre>';

    // foreach ($results as $row) {
    //     print "<tr><td>" . $row['id'] . "</td>";
    //     print "<td>" . $row['name'] . "</td></tr>";
    // }

    // print "</table>";

    // var_dump($results->fetchAll(PDO::FETCH_ASSOC));
    // echo '</pre>';
    // die();
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

$products = $results->fetchAll(PDO::FETCH_ASSOC);

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

    <h2>Films by Title</h2>

    <ol>
        <?php
        foreach ($products as $product) {
            echo '<li><i class="lens"></i><a href="products.php?id=' . $product["id"] . '">' . $product["name"] . '</li>';
        }

        ?>
    </ol>
</body>

</html>