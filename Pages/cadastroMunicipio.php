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
</head>
<body>

  <div class="cadastro_software">
    <h2>Cadastro de Cidade</h2>
    <form action="cadastroMunicipio.php" method="post">
      <label for="nome_municipio">Nome da Cidade:</label>
      <input type="text" id="nome_municipio" name="nome_municipio" required>
      <label for="uf_municipio">
        UF da cidade:
        <br>
        <a href="./cadastroUf.php" class="links-cadastro">Caso não tenha encontrado a UF, clique aqui para cadastrar</a>
      </label>
      <?php
      $resultado = $mysqli->query("SELECT id_uf, sigla_uf FROM uf");
      echo "<select name='uf_municipio'>";
      while ($row = $resultado->fetch_assoc()) {
        echo "<option value='" . $row['id_uf'] . "'>" . $row['sigla_uf'] . "</option>";
      }
      echo "</select>";
      ?>
  
      <input type="submit" value="Cadastrar" name="botao" class="cadastrar_linguagem">
    </form>
  </div>
  
  <a href="./cadastros.html" class="cadastro-software-botao-voltar">Voltar</a>
  <?php
        if (@$_POST['botao'] == "Cadastrar") {
            $nome_municipio = $_POST['nome_municipio'];
            $uf_municipio = $_POST['uf_municipio'];
            $insere = "INSERT into municipio(nome_municipio, fk_uf_id_uf) VALUES ('$nome_municipio','$uf_municipio')";
            mysqli_query($mysqli, $insere) or die ("Não foi possível inserir os dados");
        }
  ?>
  </body>
  </html>