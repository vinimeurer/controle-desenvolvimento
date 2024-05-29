<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
  <meta content="Site de controle de desenvolvimento" name="description" property="og:description">
  <link href="../Style/loginCliente.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css">
  <script src="#"></script>
  <?php include ('../php/config.php'); ?>
</head>

<body>
<div class="container">
        <div class="form-header">
            <h2>Login Cliente</h2>
        </div>
        <form action="loginCliente.php" method="post" name="relatorio">
            <div class="form-row">
                <label for="email_cliente">Email:</label>
                <input type="text" id="email_cliente" name="email_cliente">
            </div>
            <div class="form-row">
                <label for="email_cliente">Senha:</label>
                <input type="password" id="senha_cliente" name="senha_cliente">
            </div>
            <div>
            <a href="./cadastroCliente.php" class="links-cadastro">Caso ainda não tenha uma conta, clique aqui para cadastrar</a>
            </div>
            <br>
            <div class="form-row">
                <input type="submit" name="botao" value="Login" class="login_cliente_button">
            </div>
        </form>
        <?php
    
if(@$_POST['botao'] == "Login") {
    $email_cliente = $_POST['email_cliente'];
    $senha_cliente = $_POST['senha_cliente'];

    // Consulta SQL para verificar se o email e senha correspondem a uma entrada na tabela cliente
    $consulta = "SELECT * FROM cliente WHERE email_cliente = '$email_cliente' AND senha_cliente = '$senha_cliente'";

    // Executa a consulta
    $resultado = mysqli_query($mysqli, $consulta);

    // Verifica se a consulta retornou alguma linha, ou seja, se o login foi bem-sucedido
    if (mysqli_num_rows($resultado) == 1) {
        // Login bem-sucedido
        header("Location: ../pages/compra.php");
        exit();
        // Você pode redirecionar o usuário para outra página aqui, se desejar
    } else {
        // Login falhou
        echo "<script>alert('Login falhou. Verifique suas credenciais.')</script>";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($mysqli);
}
?>
  
  <a href="../index.html" class="login_cliente_voltar">Voltar</a>
  
</div>
</body>   
</html>