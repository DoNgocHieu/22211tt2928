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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
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
        <div class="wrapper">
            <div class="filter">
                <?php
                foreach ($categories as $key => $category) {
                    ?>
                    <label for="<?= $category["id"] ?>">
                        <input type="checkbox" class="checkcate" value="<?= $category["id"] ?>" id="<?= $category["id"] ?>">
                        <?= $category["name"] ?>
                    </label>
                    <?php
                }
                ?>
            </div>
            <div class="content">
                <div class="card_layout">

                </div>
                <div class="navigation"></div>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script type="module" src="./public/js/test.js"></script>
</body>

</html>