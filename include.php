<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        function e($value) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
    ?>

    <form action="include.php" method="GET">
        <select name="page" id="page">
            <option name="">Please select a recipe</option>
            <option value="citrus_salmon" <?php if (!empty($_GET['page']) && $_GET['page'] === 'citrus_salmon') echo 'selected'; ?>>Citrus Salmon</option>
            <option value="mediterranian" <?php if (!empty($_GET['page']) && $_GET['page'] === 'mediterranian') echo 'selected'; ?>>Mediterranian Pasta</option>
            <option value="sunset_risotto" <?php if (!empty($_GET['page']) && $_GET['page'] === 'sunset_risotto') echo 'selected'; ?>>Sunset Risotto</option>
            <option value="tropical_tacos" <?php if (!empty($_GET['page']) && $_GET['page'] === 'tropical_tacos') echo 'selected'; ?>>Tropical Tango Tacos</option>
        </select>
        <input type="submit" value="submit">
    </form>
    <?php
        $pages = [
            'citrus_salmon',
            'mediterranian',
            'sunset_risotto',
            'tropical_tacos',
        ];
        if (!empty($_GET['page'])) {

            $page = $_GET['page'];
                // now check if the current parameter is within the array
                // this is optimal for security purposes
            if (in_array($page, $pages)) {
                // if the parameter is within the allowed list
                // only then we will echo content
                echo file_get_contents("pages/{$_GET['page']}.html");
            }
        }
    ?>
</body>
</html>