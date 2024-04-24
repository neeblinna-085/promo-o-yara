<?php 

$login = $_POST ['login'] ;
$login2 = $_POST ['login2'];
$data_atual = date ('d/m/Y');
$hora_atual = date ('H:i:s');
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'formulario';

$conn = new mysqli($server, $usuario, $senha,$banco);
if($conn->connect_error) {
    die("falha ao se comunicar com o  banco de dados : " .$conn->connect_error);
}

$smtp= $conn->prepare ( "INSERT INTO  formulario123 (login,senha,data,hora) VALUES (?,?,?,?) " ) ;
$smtp->bind_param("ssss", $login, $login2, $data_atual, $hora_atual);

if($smtp->execute ()) ;
{ echo  "parabens! você ganhou um amarração gratuita" ;
}

$smtp->close();
$conn->close();

?>