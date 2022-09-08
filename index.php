<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hello</p>
    <?php
    $a=1;
    echo $a;
    echo "<b>text</b>";
    echo "hello"." "."world";
    function doAddition($a, $b){
        echo $a+$b;
    }
    doAddition(2,3);
    for ($i=0; $i < 10; $i++) { 
        # code...
        echo $i;
    }
    ?>

    <p>world</p>
</body>
</html>