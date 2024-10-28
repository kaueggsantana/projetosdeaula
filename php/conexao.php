<?php
$servername="localhost";
$username="kaue";
$password="Senac@2024";
$dbname="contato";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Falha na conexao".$conn->connect_error);
}
echo "Conectado com sucesso";