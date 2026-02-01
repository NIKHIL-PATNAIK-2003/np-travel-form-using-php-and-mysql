<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php string</title>
</head>
<body>
    <?php
        $str1 = "Hello";
        $str2 = "World";
        $fullStr = $str1 . " " . $str2; // Concatenation
        echo "<h1>" . $fullStr . "</h1>";

        $length = strlen($fullStr); // String length
        echo "<p>Length of the string is: " . $length . "</p>";

        $upperStr = strtoupper($fullStr); // Convert to uppercase
        echo "<p>Uppercase: " . $upperStr . "</p>";

        $lowerStr = strtolower($fullStr); // Convert to lowercase
        echo "<p>Lowercase: " . $lowerStr . "</p>";

        $replacedStr = str_replace("World", "PHP", $fullStr); // Replace substring
        echo "<p>Replaced String: " . $replacedStr . "</p>"; 

        $wordcount = str_word_count($fullStr); // Word count
        echo "<p>Word Count: " . $wordcount . "</p>";

        $reversedStr = strrev($replacedStr); // Reverse string
        echo "<p>Reversed String: " . $reversedStr . "</p>";

    ?>
</body>
</html>