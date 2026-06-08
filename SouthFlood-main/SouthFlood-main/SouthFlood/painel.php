<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: LOGIN/Login.php");
    exit();
}

$nome_do_usuario = ucfirst($_SESSION['usuario_logado']);
$email_do_usuario = $_SESSION['email_logado'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>

<h1>
    <?php echo htmlspecialchars($nome_do_usuario); ?>,
    você entrou com sucesso!
</h1>

<p>E-mail: <?php echo htmlspecialchars($email_do_usuario); ?></p>

<a href="includes/logout.php">
    Sair
</a>

</body>
</html>
<!--esse code pode mudar tudo como quiser ele era só pra ver se o cadastro tava funcionando, faz a pagina principal depois do login aqui.-->