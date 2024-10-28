<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Os dados informados são: </h1>
    <?php
    $nome=$_POST["nome"];
    $cpf=$_POST["cpf"];
    $endereco=$_POST["endereco"];
    $estado=$_POST["listaEstados"];
    $dataNascimento=$_POST["dataNascimento"];
    $sexo=$_POST["sexo"];
    $cinema=isset($_POST["checkCinema"]);
    $musica=isset($_POST["checkMusica"]);
    $informatica=isset($_POST["checkInformatica"]);
    $login=$_POST["login"];
    $senha1=$_POST["senha1"];
    $senha2=$_POST["senha2"];
    $foto=$_FILES["foto"];

    $checagem=true;
    if($nome==""){
        echo"INFORME SEU NOME.<br>";
        $checagem=false;
    }
    if($endereco==""){
        echo"INFORME SEU ENDEREÇO.<br>";
        $checagem=false;
    }
    if($senha1 != $senha2){
        echo"SENHA INVÁLIDA.<br>";
        $checagem=false;
    }
    // Extrai somente os números
     $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
     // Verifica se foi informado todos os digitos corretamente
     if (strlen($cpf) != 11) {
         echo "CPF Inválido.<br>";
         $checagem=False;
     }
 
     // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
     if (preg_match('/(\d)\1{10}/', $cpf)) {
         echo "CPF Inválido.<br>";
         $checagem=false;
     }
 
     // Faz o calculo para validar o CPF
     for ($t = 9; $t < 11; $t++) {
         for ($d = 0, $c = 0; $c < $t; $c++) {
             $d += $cpf[$c] * (($t + 1) - $c);
         }
         $d = ((10 * $d) % 11) % 10;
         if ($cpf[$c] != $d) {
             echo "CPF Inválido.<br>";
             $checagem=False;
         }
     }
     $validaIdade=new DateTime($dataNascimento);
     $hoje=new DateTime();
     $idade=$hoje->diff($validaIdade)->y;
     if($idade<18){
        echo"Você precisa ter pelo menos 18anos para se cadastrar.<br>";
        $checagem=false;
     }

     if($checagem){
        echo "<table border='0' cellpadding='5'";
        echo "<tr><td>Nome: </td><td><b> $nome </b></td></tr> ";
        echo "<tr><td>Cpf: </td><td><b> $cpf </b></td></tr> ";
        echo "<tr><td>Endereço: </td><td><b> $endereco </b></td></tr> ";
        echo "<tr><td>Estado: </td><td><b> $estado </b></td></tr> ";
        echo "<tr><td>Data Nasc.: </td><td><b> $dataNascimento </b></td></tr> ";
        echo "<tr><td>Sexo: </td><td><b> $sexo </b></td></tr> ";
        echo "<tr><td>Login: </td><td><b> $login </b></td></tr> ";
        echo "<tr><td>Senha: </td><td><b> $senha1 </b></td></tr> ";

        //campos do tipo Checkbox retornam verdadeiro se tiverem marcados
        echo "<tr><td>ÀREAS DE INTERRESSE: </td><td><b>";
        if($cinema==true){
            echo "Cinema <br>";
        }
        if($musica==true){
            echo "Música <br>";
        }
        if($informatica==true){
            echo "Informática <br>";
        }
        echo"</b></td></tr></table>";
    }
    if($foto['error' !=0]){
        echo "Erro no subir da imagem.<br>";
    }
    if($foto['size']==0){
    echo "Erro no tamanho da imagem.<br>";
    $checagem=false;
    }
    if($foto['size'>6144]){
        echo"Tamanho do arquivo ultrapassa o permitido.<br>";
        $checagem=false;
    }
    if($foto['type']!="image/gif" && $foto['type']!="image/jpeg" && $foto['type']!="image/pjeg" && $foto['type']!="image/x-png" && $foto['type']!="image/bmp" && $foto['type']!="image/webp" && $foto['type']!="image/svg"){
        echo"Tipo de arquivo não permitido.<br>";
        $checagem=false; n
    }

    
    

   ?> 
</body>
</html>