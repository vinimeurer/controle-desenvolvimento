<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
	<meta content="Site de controle de desenvolvimento" name="description" property="og:description">
	<link href="../Style/cadastroSoftware.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
  <script src="#"></script>
</head>
<body>

  <div class="cadastro_software">
    <h2>Cadastro de UF</h2>
    <form action="cadastroUf.php" method="post">
      <label for="nome_uf">Nome da UF:</label>
      <input type="text" id="nome_uf" name="nome_uf" required>
      <label for="sigla_uf">Sigla da UF:</label>
      <input type="text" id="sigla_uf" name="sigla_uf" required>
  
      <input type="submit" value="Cadastrar" name="botao" class="cadastrar_linguagem">
    </form>
  </div>
  
  <a href="./cadastros.html" class="cadastro-software-botao-voltar">Voltar</a>
  <?php
        if (@$_POST['botao'] == "Cadastrar") {
            $nome_uf = $_POST['nome_uf'];
            $sigla_uf = $_POST['sigla_uf'];
            $insere = "INSERT into uf(nome_uf, sigla_uf) VALUES ('$nome_uf','$sigla_uf')";
            mysqli_query($mysqli, $insere) or die ("Não foi possível inserir os dados");
        }
  ?>
  </body>
  </html>