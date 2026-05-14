<?php

require_once __DIR__ . '/../connection.php';

$id = $_POST['id'];

$title = $_POST['title'];
$category_id = $_POST['category_id'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$relase_year = $_POST['relase_year'];
$stock = $_POST['stock'];
$description = $_POST['description'];

$query = "UPDATE books SET 
title ='$title',
category_id ='$category_id', 
author = '$author', 
publisher = '$publisher',
relase_year = '$relase_year',
stock = '$stock',
description = '$description'
WHERE id = '$id'";

mysqli_query($connect, $query);

header("Location: index_books.php");

exit;