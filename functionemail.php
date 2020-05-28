<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Orcamento - FA';
            $mail->Body = 'O seu orçamento para o serviço de ' . $servico . ' foi enviado com sucesso';
            $mail->AltBody = 'Chegou o email teste do Canal TI';

            if($mail->send()) {
                header("Location: ../");
            } else {
                echo 'Email nao enviado';
            }
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
    }
}

?>