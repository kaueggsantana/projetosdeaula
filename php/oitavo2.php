<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $estados= array(
        0=> "Parado",
        1=> "Rodando",
        2=> "Finalizando",
        "ES"=> "Espirito Santo",
        "RJ"=> "Rio de Janeiro",
        "MG"=> "Minas Gerais",
    );
    echo "<pre>";
    print_r($estados);
    echo "</pre>";
    ?>
</body>
</html>