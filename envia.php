<?php

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validar e sanitizar campos
    $nome = htmlspecialchars(trim($_POST['nome'] ?? '')); // Protege contra XSS
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $celular = htmlspecialchars(trim($_POST['celular'] ?? ''));
    $mensagem = htmlspecialchars(trim($_POST['mensagem'] ?? '')); // Adicionado campo de mensagem

    // Verifica se os campos obrigatórios estão preenchidos e o e-mail é válido
    if (empty($nome) || empty($email) || empty($celular) || empty($mensagem) || !$email) {
        // Redireciona de volta com uma mensagem de erro, ou exibe uma.
        // Para uma experiência mais profissional, é melhor redirecionar ou usar AJAX.
        echo "Por favor, preencha todos os campos corretamente.";
        exit;
    }

    // Dados do e-mail
    $para = "lucasgbss456@gmail.com"; // Substitua pelo seu e-mail
    $assunto = "Nova Mensagem do Portfólio - Contato de " . $nome; // Assunto mais descritivo

    // Corpo do e-mail
    $corpo = "Nome: {$nome}\n";
    $corpo .= "E-mail: {$email}\n";
    $corpo .= "Celular: {$celular}\n";
    $corpo .= "Mensagem:\n{$mensagem}\n"; // Incluído o corpo da mensagem

    // Cabeçalho do e-mail
    $cabecalho = "MIME-Version: 1.0\r\n";
    $cabecalho .= "Content-type: text/plain; charset=UTF-8\r\n";
    $cabecalho .= "From: Seu Portfólio <nao-responda@seusite.com>\r\n"; // Altere para um e-mail de "não responda" do seu domínio
    $cabecalho .= "Reply-To: {$email}\r\n"; // Permite responder diretamente ao remetente
    $cabecalho .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    // Envio do e-mail
    if (mail($para, $assunto, $corpo, $cabecalho)) {
        echo "Mensagem enviada com sucesso! Em breve entraremos em contato.";
    } else {
        echo "Houve um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição inválido!";
}

echo "# portifolio" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/LKdaCisco/portifolio.git
git push -u origin main

?>