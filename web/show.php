<?php
include_once "config/database.php";
$id = "";
if (isset ($_GET["id"])) {
    $id = $_GET["id"];
}

$postModel = new Post();
$postModel::view($id);
$post = $postModel->get($id);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>
        <?= $post["title"] ?>
    </title>
</head>

<body>
    <div class="detail_page">
        <div class="page_image">
            <img src="./public/images/<?= $post["photo"] ?>" alt="">
        </div>
        <div class="page_desc">
            <h1>
                <?= $post["title"] ?>
            </h1>
            <p>
                <?= $post["content"] ?>
            </p>
            <div class="">
                <button class="btn_like" data-id="<?= $post["id"] ?>" onClick="likePost(<?= $post["id"] ?>, this)">
                    Like: <span class="likes">
                        <?= $post["likes"] ?>
                    </span>
                </button>
                <button class="btn_view">
                    View: <span class="views">
                        <?= $post["views"] ?>
                    </span>
                </button>
            </div>
            <a href="./index.php">Back to Home</a>
        </div>
    </div>

    <!-- script  -->
    <script src="./public/js/main.js">
    </script>
</body>

</html>