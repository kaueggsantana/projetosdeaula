<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $idade=60;
    $sexo='M';
    if($sexo=="M" and $idade>=65){
        echo "Voce irá aposentar";
    }
    elseif($sexo=='M'){
        echo "Voce inda não irá aposentar";
    }
    if($sexo=="F" and $idade>62){
        echo "Voce irá aposentar";
    }
    elseif($sexo=='F'){
        echo "Voce ainda não irá aposentar";
    }
    ?>
</body>
</html>