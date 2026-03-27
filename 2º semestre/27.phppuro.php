<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for ($num1 = 1; $num1 <= 9; $num1++) {
        for ($num2 = 1; $num2 <= 10; $num2++) {
            echo "$num1 * $num2 = " . $num1 * $num2;
            echo "<br>";
        }

        echo "<br>";
    }
    ?>

</body>
</html>