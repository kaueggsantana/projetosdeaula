<?php
include 'conexao.php';
$name=$_POST['name'];
$email=$_POST['email'];
$mensagem=$_POST['mensagem'];
$sql="INSERT INTO mensagens(nome,email,mensagem) values('$name','$email','$mensagem')";

if ($conn->query($sql) === TRUE) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
