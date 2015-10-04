<?php

include 'config.php';
include 'function.php';

$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = category_to_string($categories_tree);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <a href="/catalog/">Главная</a>
    <div class="wrapper">
        <div class="sidebar">
            <ul class="category">
                <?php echo $categories_menu ?>
            </ul>
        </div>
        <div class="content">
            CONTENT
        </div>
    </div>
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/jquery.accordion.js"></script>
<script src="js/jquery.cookie.js"></script>
    <script>
        $(document).ready(function(){
            $(".category").dcAccordion();
        });
    </script>
</body>
</html>