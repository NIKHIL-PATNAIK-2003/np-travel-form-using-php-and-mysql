<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Php website</title>
</head>
<body>
    This is my first PHP website.
    <?php
        echo "<h1>Hello World - written using php </h1>";
    ?>
    <?php
        define("pi","3.14");
        $var1 = 5;
        $var2 = 2; 
        echo "<p>Sum of $var1 and $var2 is " . ($var1 + $var2) . "</p>"; 
        echo "<p>Value of pi is " . pi . "</p>"; 
    ?>
</body>
</html>