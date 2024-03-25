<?php
include_once "config/database.php";
$categoryModel = new Category();
$categories = $categoryModel::all();

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
    <title></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <?php
                foreach ($categories as $key => $category) {
                    ?>
                <li>
                    <a href="./categories.php?id=<?= $category["id"] ?>">
                        <?= $category["name"] ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="banner">
            <div>
                <img src="./public/images/3 (5).png" alt="">
            </div>
            <div>
                <img src="./public/images/3 (2).png" alt="">
            </div>
            <div>
                <img src="./public/images/3 (3).png" alt="">
            </div>
            <div>
                <img src="./public/images/3 (1).png" alt="">
            </div>
        </div>
        <div>
            <?php
            foreach ($categories as $key => $category) {
                if ($category["id"] != 1) {
                    ?>
            <div class="section_post">
                <h3 class="section_title">
                    <?= $category["name"] ?>
                </h3>
                <div class="card_layout" data-id="<?= $category["id"] ?>">

                </div>
                <button class="btn_loadmore">
                    Load more
                </button>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </main>
    <footer></footer>
    <!-- script -->
    <script type="module" src="./public/js/main.js"></script>
</body>

</html>