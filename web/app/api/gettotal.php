<?php
require_once "../../config/database.php";


$input = json_decode(file_get_contents("php://input"), true);
$categoryId = $input["categoryIds"];

$postModel = new Post();
$posts = $postModel::total($categoryId);

echo json_encode($posts);