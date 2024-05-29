<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
  <meta content="Site de controle de desenvolvimento" name="description" property="og:description">
  <link href="../Style/cadastroLinguagem.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css">
  <?php include ('../php/config.php'); ?>
  <script src="#"></script>
</head>
<body>

<div class="cadastro_linguagem">
  <h2>Cadastro de Linguagem de Programação</h2>
  <form action="cadastroLinguagem.php" method="post">
    <label for="nome_linguagem">Nome da Linguagem:</label>
    <input type="text" id="nome_linguagem" name="nome_linguagem" required>

    <label>Framework?</label>
    <div class="radio-container">
      <div>
        <input type="radio" id="framework_s" name="framework" value="s">
        <label for="framework_s">Sim</label>
      </div>
      <div>
        <input type="radio" id="framework_n" name="framework" value="n" checked>
        <label for="framework_n">Não</label>
      </div>
    </div>

    <input type="submit" value="Cadastrar" name="botao" class="cadastrar_linguagem">
  </form>
</div>

<a href="./cadastros.html" class="cadastro-linguagem-botao-voltar">Voltar</a>
<?php
        if (@$_POST['botao'] == "Cadastrar") {
            $nome_linguagem = $_POST['nome_linguagem'];
            $framework = $_POST['framework'];
            $insere = "INSERT into linguagem(nome_linguagem, framework) VALUES ('$nome_linguagem','$framework')";
            mysqli_query($mysqli, $insere) or die ("Não foi possível inserir os dados");
        }
?>
</body>
</html>
