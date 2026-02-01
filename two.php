<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my php website 2</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
        border: 2px solid #000;
        text-align: center;
    }
</style>
<body>
    <div class="container">
        <div><h1>This is my second php website.</h1></div>
        <?php
            $age =7;
            if($age>18){
                echo "<h2>You are a major.</h2>";
            }
            else if($age==7){
                echo "<h2>You are 7 years old.</h2>";
            }
            else{
                echo "<h2>You are an minor.</h2>";
            }

            $a=0;
            while($a<10){ 
                echo "<p>Value of a is: $a</p>";
                $a++;
            }

            for($i= 0; $i< 10; $i++){
                echo "<p>Value of i from for loop is: $i</p>";
            }

            $languages = array("Python", "JavaScript", "PHP", "Java", "C++");
            foreach($languages as $value){
                echo "<p>Programming language: $value</p>";
            }
        ?>
    </div>
</body>
</html>