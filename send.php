<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "contato@multipartselevadores.com.br";
    $subject = $_POST["assunto"] ?: "Novo contato pelo site";
    $nome = $_POST["nome"] ?: "Não informado";
    $telefone = $_POST["telefone"] ?: "Não informado";
    $email = $_POST["email"] ?: "Não informado";
    $mensagem = $_POST["mensagem"] ?: "";

    $body = "Nome: $nome\n";
    $body .= "Telefone: $telefone\n";
    $body .= "E-mail: $email\n\n";
    $body .= "Mensagem:\n$mensagem\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: index.html?sucesso=1");
        exit;
    } else {
        header("Location: index.html?sucesso=0");
        exit;
    }
} else {
    echo "Método inválido.";
}
?>
