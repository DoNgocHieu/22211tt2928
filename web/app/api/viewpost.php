<?php
require_once "../../config/database.php";
$input = json_decode(file_get_contents("php://input"), true);
$postId = $input['postId'];

$postModel = new Post();
$post = $postModel::view($postId);
echo json_encode($post);