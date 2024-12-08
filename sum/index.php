<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    <title>МирСобытий</title>
    <!-- css files -->
    <link rel="stylesheet" href="css_files/style.css">
</head>

<body>
    <!-- подключение внешних файлов для отображения страницы -->
    <div id="container">
        <?php require "php_blocks/header.php" ?>
        <div class="content">
            <?php require "php_blocks/content.php" ?>
        </div>
        <?php require "php_blocks/footer.php" ?>
    </div>
    <script src="js/scripts.js"></script>
</body>

</html>