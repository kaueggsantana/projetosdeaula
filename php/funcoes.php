<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   function cabecalho(){
        echo "Programa de teste de funções<br>";
   }
    function quadrado($n){
        return($n*$n);
    }
    function soma($n1,$n2){
        return($n1+$n2);
    }
    ?>
</body>
</html>
   <?php
   $x=4;
   $resQuadro= quadrado($x);
   $resSoma=soma($x, $x);
   cabecalho();
   echo "O quadrado de $x = $resQuadro <br>";
   echo "A soma de $x = $resSoma <br>";
   ?>
   </body>
   </html>

