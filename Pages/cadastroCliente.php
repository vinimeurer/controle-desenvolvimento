<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
	<meta content="Site de controle de desenvolvimento" name="description" property="og:description">
	<link href="../Style/cadastroCliente.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
</head>
<body>

  <div class="cadastro_cliente">
    <h2>Cadastro de Cliente</h2>
    <form action="cadastroCliente.php" method="post">
      <label for="primeiro_nome">Primeiro nome:</label>
      <input type="text" id="primeiro_nome" name="primeiro_nome" required>
  
      <label for="ultimo_nome">Último nome:</label>
      <input type="text" id="ultimo_nome" name="ultimo_nome" required>
  
      <label for="cpf_cliente">CPF (sem pontuação):</label>
      <input type="text" id="cpf_cliente" name="cpf_cliente" pattern="[0-9]{11}" maxlength="11" required title="Digite um CPF válido (11 dígitos sem pontuação).">
  
      <label for="data_nascimento">Data de nascimento:</label>
      <input type="date" id="data_nascimento" name="data_nascimento" required>

      <label for="email_cliente">Endereço de e-mail:</label>
      <input type="email" id="email_cliente" name="email_cliente" required>
      
      <label for="senha_cliente">Senha:</label>
      <input type="password" id="senha_cliente" name="senha_cliente" required>
  
      <input type="submit" value="Cadastrar" name="botao" class="cadastrar_linguagem">
    </form>
  </div>
  
  <a href="./listarSoftware.php" class="cadastro-cliente-botao-voltar">Voltar</a>
  <?php
      if (@$_POST['botao'] == "Cadastrar") {
        $primeiro_nome = $_POST['primeiro_nome'];
        $ultimo_nome = $_POST['ultimo_nome'];
        $cpf_cliente = $_POST['cpf_cliente'];
        $data_nascimento = $_POST['data_nascimento'];
        $email_cliente = $_POST['email_cliente'];
        $senha_cliente = $_POST['senha_cliente'];
        $insere = "INSERT into cliente(primeiro_nome, ultimo_nome, cpf_cliente, data_nascimento, email_cliente, senha_cliente) VALUES ('$primeiro_nome','$ultimo_nome','$cpf_cliente','$data_nascimento','$email_cliente','$senha_cliente')";
        mysqli_query($mysqli, $insere) or die ("Não foi possível inserir os dados");
      }
  ?>


</body>
</html>
