<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nc=0;
    $a1=1;
    $a2=1;
    echo "1 <br> 1 <br>";
    for($i=0;$i<50;$i++){
        $nc=$a1+$a2;
        $a2=$a1;
        $a1=$nc;
        echo "$nc <br>";
    }
    ?>
</body>
</html>
