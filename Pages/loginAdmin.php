<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
  <meta content="Site de controle de desenvolvimento" name="description" property="og:description">
  <link href="../Style/loginAdmin.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css">
  <script src="#"></script>
  <?php include ('../php/config.php'); ?>
</head>

<body>
<div class="container">
        <div class="form-header">
            <h2>Login</h2>
        </div>
        <form action="loginAdmin.php?botao=gravar" method="post" name="relatorio">
            <div class="form-row">
                <label for="login_email">Email:</label>
                <input type="text" id="login_email" name="login_email">
            </div>
            <div class="form-row">
                <label for="login_senha">Senha:</label>
                <input type="password" id="login_senha" name="login_senha">
            </div>
            <div class="form-row">
                <input type="submit" name="botao" value="Login" class="login_admin_button">
            </div>
        </form>

        <?php
if(@$_POST['botao'] == "Login") {
    $login_email = $_POST['login_email'];
    $login_senha = $_POST['login_senha'];

    // Consulta SQL para selecionar o login e a senha correspondentes
    $sql = "SELECT login_email, login_senha FROM login";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Recupera os valores do banco de dados
        $row = $result->fetch_assoc();
        $db_login_email = $row['login_email'];
        $db_login_senha = $row['login_senha'];

        // Verifica se os valores inseridos pelo usuário correspondem aos valores no banco de dados
        if ($login_email == $db_login_email && $login_senha == $db_login_senha) {
            // Redireciona para a página de cadastros se as credenciais estiverem corretas
            header("Location: ../pages/cadastros.html");
            exit();
        } else {
            // Exibe uma mensagem de erro se as credenciais estiverem incorretas
            echo "<script>alert('Login falhou. Verifique suas credenciais.')</script>";
        }
    } else {
        // Exibe uma mensagem de erro se não houver nenhum registro correspondente no banco de dados
        echo "<script>alert('Login falhou. Usuário não encontrado.')</script>";
    }
}
?>
  
  <a href="../index.html" class="login_admin_voltar">Voltar</a>
  
</div>
</body>   
</html>
