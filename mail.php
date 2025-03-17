<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "marciojr_@live.com"; // Seu e-mail para receber mensagens
    $name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Validação básica
    if (empty($name) || empty($email) || empty($message)) {
        echo "Preencha todos os campos!";
        exit;
    }

    // Assunto do e-mail
    $subject = "Nova mensagem do site";

    // Corpo do e-mail
    $body = "<strong>Nome:</strong> $name <br>";
    $body .= "<strong>Email:</strong> $email <br>";
    $body .= "<strong>Mensagem:</strong> <br>$message";

    // Cabeçalhos do e-mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Enviar e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "success"; // Pode ser usado via AJAX para exibir a mensagem de sucesso
    } else {
        echo "error"; // Indica falha no envio
    }
}
?>


