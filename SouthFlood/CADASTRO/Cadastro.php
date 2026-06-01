<?php
session_start();

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $confirmar = trim($_POST['confirmar'] ?? '');

    if ($senha !== $confirmar) {
        $erro = "As senhas não coincidem!";
    } else {

        include '../includes/usuarios.php';

        if (isset($usuarios[$usuario])) {
            $erro = "Nome de usuário já cadastrado!";
        }

        foreach ($usuarios as $dados) {
            if ($dados['email'] === $email) {
                $erro = "E-mail já cadastrado!";
                break;
            }
        }

        if (empty($erro)) {

            $usuarios[$usuario] = [
                'senha' => $senha,
                'email' => $email
            ];

            $conteudo = "<?php\n\n\$usuarios = " .
                var_export($usuarios, true) .
                ";\n";

            file_put_contents('../includes/usuarios.php', $conteudo);

            $_SESSION['usuario_logado'] = $usuario;
            $_SESSION['email_logado'] = $email;

            header("Location: ../painel.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="Cadastro.css">
    <?php include '../includes/include.php'; ?>

</head>
<body>

    <form action="" method="post">

        <div class="titulo">
            <h1><p id="Letreiro">Cadastro</p></h1>
        </div>

        <?php if (!empty($erro)): ?>
            <p style="color:red;text-align:center;">
                <?php echo $erro; ?>
            </p>
        <?php endif; ?>

        <div class="quadrado-fixo"></div><!-- ageitar esse quadrado, quando da zoom fica bugado, tem que funcionar em qualquer proporção de tela.-->

        <div class="input-field">

            <input type="text" name="usuario" id="" class="input" placeholder="Criar Nome de Usúario"><br>

            <input type="email" name="email" id="" class="input" placeholder="Colocar E-mail de Usúario"><br>

            <input type="password" name="senha" id="" class="input" placeholder="Criar Senha de Usúario"><br>

            <input type="password" name="confirmar" id="" class="input" placeholder="Confirmar Senha de Usúario"><br>

            <input type="submit" value="Cadastro" class="submit"><br>

        </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>