<?php
require_once "../../config/database.php";


$input = json_decode(file_get_contents("php://input"), true);
$categoryId = $input["categoryIds"];
$page = $input["page"];
$perPage = $input["perPage"];

$postModel = new Post();
$posts = $postModel::findPostByCategory($categoryId, $page, $perPage);

echo json_encode($posts);