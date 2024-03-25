<?php
require_once "../../config/database.php";


$input = json_decode(file_get_contents("php://input"), true);
$categoryId = $input["categoryId"];
$displayedPosts = $input["displayedPosts"];

$postModel = new Post();
$posts = $postModel::getPostByCategory($categoryId, $displayedPosts);

echo json_encode($posts);