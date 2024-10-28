<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Verificar Aposentadria</h2>
    <form method="post">
     <label for="idade">Idade:</label>
    <input type="number" id="idade" name="idade"required><br><br>
    <label for="sexo" >Sexo</label>
  
    <select id="sexo" name="sexo" required>
       <option value="M">Masculino</option>
       <option value="F">Feminino</option>  
    </select><br><br>
    <input type="submit" value="Verifiar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];
        if($sexo=="M" and $idade>=65){
            echo "Voce irá aposentar";
    }
    elseif($sexo=='M'){
        echo "Voce ainda não irá aposentar";
    }
    if($sexo=="F" and $idade>=62){
        echo "Voce irá aposentar";
    }
    elseif($sexo=='F'){
        echo "Voce ainda não irá aposentar";
    }
}
?>
</body>
</html>