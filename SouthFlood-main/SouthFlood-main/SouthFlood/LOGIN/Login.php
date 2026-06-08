<?php
session_start();

if (isset($_SESSION['usuario_logado'])) {
    header("Location: ../painel.php");
    exit();
}

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include '../includes/usuarios.php';

    $email_digitado = $_POST['email'] ?? '';
    $senha_digitada = $_POST['password'] ?? '';

    $usuario_autenticado = null;

    /** @var array $usuarios */
foreach ($usuarios as $nome_usuario => $dados) {    

        if (
            $dados['email'] === $email_digitado &&
            $dados['senha'] === $senha_digitada
        ) {

            $usuario_autenticado = $nome_usuario;
            break;
        }
    }

    if ($usuario_autenticado !== null) {

        $_SESSION['usuario_logado'] = $usuario_autenticado;
        $_SESSION['email_logado'] = $email_digitado;

        header("Location: ../painel.php");
        exit();
    }

    $erro = "E-mail ou senha incorretos!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="Login.css">

    <?php include '../includes/include.php'; ?>
</head>
<body>

<form action="" method="POST">

    <div class="titulo">
        <h1><p id="Letreiro">login</p></h1>
    </div>

    <?php if(!empty($erro)): ?>
        <p style="color:red;text-align:center;">
            <?php echo $erro; ?>
        </p>
    <?php endif; ?>

    <div class="input-field">

        <input
            type="email"
            name="email"
            class="input"
            placeholder="E-mail de Usuário"
            required
        >

        <br>

        <input
            type="password"
            name="password"
            class="input"
            placeholder="Senha de Usuário"
            required
        >

        <br>

        <input
            type="submit"
            value="Logar"
            class="submit"
        >

    </div>

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>