<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function criarFisica(){
    if(isset($_POST['submit'])){

        global $connection;

        $text = "youdontknowthepassowrd07";
		$hashFormat = "$2a$10$";
		$hashF_and_text = $hashFormat . $text;
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpf = $_POST['cpf'];
        $dataNasc = $_POST['dataNasc'];
        $telefone= $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $end = $_POST['endereco'];
        $num = $_POST['numero'];
        $comp = $_POST['complemento'];
        $end = $end . " " . $num . " - " . $comp;
        $tipo = "F";
        //$password = crypt($password, $hashF_and_text);
        $query = "INSERT INTO clientefisica(nome, sobrenome, dataNascimento,email,senha,sexo,endereco,cpf,telefone,tipo) ";
        $query .= "VALUES ('$nome','$sobrenome','$dataNasc','$email', '$password','$sexo','$end','$cpf','$telefone','$tipo')";
        $result = mysqli_query($connection,$query);
        if(!$result){
                die("Não foi possível criar o usuário");
        }
    }
}

function criarJuridica(){
    if(isset($_POST['submit'])){

        global $connection;

        $text = "youdontknowthepassowrd07";
		$hashFormat = "$2a$10$";
		$hashF_and_text = $hashFormat . $text;
        
        $razaoSocial = $_POST['razaoSocial'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cnpj = $_POST['cnpj'];
        $telefone= $_POST['telefone'];
        $end = $_POST['endereco'];
        $num = $_POST['numero'];
        $comp = $_POST['complemento'];
        $end = $end . " " . $num . " " . $comp;
        $tipo = "J";
        //$password = crypt($password, $hashF_and_text);
        $query = "INSERT INTO clientejuridica(razaoSocial,email,senha,endereco,cnpj,telefone,tipo) ";
        $query .= "VALUES ('$razaoSocial','$email', '$password','$end','$cnpj','$telefone','$tipo')";
        $result = mysqli_query($connection,$query);
        if(!$result){
                die("Não foi possível criar o usuário");
        }
    }
}

function redirect(){

    if(isset($_POST['submit'])){

        global $cpf;
        global $cnpj;

        $codigo = $_POST['codigo'];

        if (strlen($codigo) == 11){
            $cpf = $codigo;
            loginF();
        }else{
            $cnpj = $cnpj;
        }

    }

}

function loginF(){

    session_start();
    
    if(isset($_POST['submit'])){

    global $cpf;
    global $connection;

    $password = $_POST['password'];

    $query = "SELECT * FROM clientefisica WHERE cpf ='$cpf' and senha ='$password' ";
    $select_user_query = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_array($select_user_query)){
        
        $db_id = $row['id'];
        $db_nome = $row['nome'];
        $db_sobrenome = $row['sobrenome'];
        $db_cpf = $row['cpf'];
        $db_password = $row['senha'];

    }

    if ($db_cpf == $cpf && $db_password == $password){

        $_SESSION['id'] = $db_id;
        $_SESSION['nome'] = $db_nome;
        $_SESSION['sobrenome'] = $db_sobrenome;
        $_SESSION['cpf'] = $db_cpf;
        $_SESSION['password'] = $db_password;
        header("Location: dashF.php");
    } else {
        header("Location: index.php");
    }

    }
}

function enviarOrcamento(){
    if(isset($_POST['submit'])){
        
        global $connection;

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $servico = $_POST['servico'];
        $necessidades = $_POST['necessidades'];

        $query = "INSERT INTO orcamento(nome,email,servico,necessidade) ";
        $query .= "VALUES ('$nome','$email','$servico','$necessidades')";

        $result = mysqli_query($connection,$query);

        if(!$result){
                die("Não foi possível criar o usuário");
        }

        $mailfa = new PHPMailer(true);
        $mail = new PHPMailer(true);

        $mail->CharSet = 'UTF-8';
        $mailfa->CharSet = 'UTF-8';


        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            // Padrões de envio para email do usuário
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testesitefa@gmail.com';
            $mail->Password = 'oigente123';
            $mail->Port = 587;

            // Padrões de envio para email da empresa
            $mailfa->isSMTP();
            $mailfa->Host = 'smtp.gmail.com';
            $mailfa->SMTPAuth = true;
            $mailfa->Username = 'testesitefa@gmail.com';
            $mailfa->Password = 'oigente123';
            $mailfa->Port = 587;

            // Email de quem vai enviar
            $mail->setFrom('testesitefa@gmail.com' , 'Feliciano Associados');
            $mailfa->setFrom('testesitefa@gmail.com' , 'Feliciano Associados');

            // Envio de email para empresa
            $mailfa->addAddress('testesitefa@gmail.com');
            
            $mailfa->isHTML(true);
            $mailfa->Subject = 'Pedido de Orçamento - FA';
            $mailfa->Body = ' Novo orçamento para o serviço de ' . $servico . ' foi solicitado';
            $mailfa->AltBody = 'Chegou o email teste do Canal TI';
            
            // Envio de email para o Usuário
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Orçamento - FA';
            $mail->Body = 'O seu orçamento para o serviço de ' . $servico . ' foi enviado com sucesso';
            $mail->AltBody = 'Chegou o email teste do Canal TI';

            if($mail->send()) {
            } else {
                echo 'Email nao enviado';
            }
            if($mailfa->send()) {
            } else {
                echo 'Email nao enviado';
            }
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
    }
}

function islogged(){

    session_start();

    if (!isset($_SESSION['id'])) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: login.php"); exit;
    }
}

function deleteData(){
    if(isset($_POST['delete'])){

        session_start();

        global $connection;

        $idLogout = $_SESSION['id'];

        $query = "DELETE FROM users ";
        $query .= "WHERE id = $idLogout ";

        $result = mysqli_query($connection,$query);
        if(!$result){
        die("Deu ruim");
        }
    }
}

function recuperarSenha(){
    if(isset($_POST['submit'])){

        global $connection;

        $email = $_POST['email'];


        $query = "SELECT * FROM login WHERE indetificacao = '$email' ";
        $select_user_query = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_array($select_user_query)){
            
            $db_password = $row['senha'];

        }

        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testesitefa@gmail.com';
            $mail->Password = 'oigente123';
            $mail->Port = 587;

            $mail->setFrom('testesitefa@gmail.com');
            $mail->addAddress('testesitefa@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Recuperar Senha - FA';
            $mail->Body = 'A sua senha e: ' . $db_password;
            $mail->AltBody = 'Chegou o email teste do Canal TI';

            if($mail->send()) {
            } else {
                echo 'Email nao enviado';
            }
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }


    }

}

// pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}
?>