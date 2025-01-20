<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/logo.png">
    <title>МирСобытий</title>
    <!-- css files -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- подключение внешних файлов для отображения страницы -->
    <div id="container">
        <?php require "./components/php_blocks/header.php"; ?>
        <div class="content">
            <?php require "./components/php_blocks/content.php" ?>
        </div>
        <?php require "./components/php_blocks/footer.php" ?>
    </div>
    <script src="./assets/js/scripts.js"></script>
    <?php
    if (isset($_GET["errors"])){
        echo "<script>";
        echo "alert('".$_GET['errors']."');";
        echo "</script>";
    }
    
    ?>
</body>

</html>