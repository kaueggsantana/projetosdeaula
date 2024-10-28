<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    date_default_timezone_set('America/Sao_Paulo'); 
    $hora = date('H:i:s'); 
    $date=date('d/m/y');
    if ($hora >= '00:00:00' && $hora < '04:59:59') {
        echo "<p style='color: gray;'>BOA MADRUGADA<br>Hoje é: $date</p>";
        echo "Hora: $hora";
    }
    elseif ($hora >= '05:00:00' && $hora < '12:00:00') {
        echo "<p style='color: red;'>BOM DIA <br>Hoje é: $date</p>";
        echo "Hora: $hora";
    } elseif ($hora >= '12:00:00' && $hora < '18:00:00') {
        echo "<p style='color: green;'>BOA TARDE<br>Hoje é: $date</p>";
        echo "Hora: $hora";
    } else {
        echo "<p style='color: blue;'>BOA NOITE<br>Hoje é: $date</p>";
        echo "Hora: $hora";
    }
    ?>
</body>
</html>