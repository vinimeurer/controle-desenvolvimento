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
    <h2>Cadastro de Software</h2>
    <form action="cadastroSoftware.php" method="post">
      <label for="nome_software">Nome do Software:</label>
      <input type="text" id="nome_software" name="nome_software" required>
  
      <label for="desc_software">Descrição do Software:</label>
      <textarea id="desc_software" name="desc_software" rows="5" maxlength="500" required></textarea>
  
      <label for="programador_software">
        Programador:
        <br>
        <a href="./cadastroProgramador.php" class="links-cadastro">Caso não tenha encontrado o progrmador, clique aqui para cadastrar</a>
      </label>
      <?php
      $resultado = $mysqli->query("SELECT id_programador, primeiro_nome FROM programador");
      echo "<select name='programador_software'>";
      while ($row = $resultado->fetch_assoc()) {
        echo "<option value='" . $row['id_programador'] . "'>" . $row['primeiro_nome'] . "</option>";
      }
      echo "</select>";
      ?>
      
  
      <label for="linguagem_software">
        Linguagens: 
        <br>
        <a href="./cadastroLinguagem.php" class="links-cadastro">Caso não tenha encontrado a linguagem, clique aqui para cadastrar</a>
      </label>
      <?php
      $resultado = $mysqli->query("SELECT id_linguagem, nome_linguagem FROM linguagem");
      echo "<select name='linguagem_software'>";
      while ($row = $resultado->fetch_assoc()) {
        echo "<option value='" . $row['id_linguagem'] . "'>" . $row['nome_linguagem'] . "</option>";
      }
      echo "</select>";
      ?>
      
  
      <label for="release_date">Data de Lançamento:</label>
      <input type="date" id="release_date" name="release_date" required>
  
      <label for="valor_software">Valor do Software:</label>
      <input type="number" id="valor_software" name="valor_software" required>

      <input type="submit" value="Cadastrar" name="botao" class="cadastrar_linguagem">
    </form>
  </div>
  <a href="./cadastros.html" class="cadastro-software-botao-voltar">Voltar</a>
  

  <?php
        if (@$_POST['botao'] == "Cadastrar") {
            $nome_software = $_POST['nome_software'];
            $desc_software = $_POST['desc_software'];
            $programador_software = $_POST['programador_software'];
            $linguagem_software = $_POST['linguagem_software'];
            $release_date = $_POST['release_date'];
            $valor_software = $_POST['valor_software'];
            $insere = "INSERT into software(nome_software, desc_software, fk_programador_id_programador, fk_linguagem_id_linguagem, data_lancamento, valor_software) VALUES ('$nome_software','$desc_software','$programador_software','$linguagem_software','$release_date','$valor_software')";
            mysqli_query($mysqli, $insere) or die ("Não foi possível inserir os dados");
        }
  ?>
  </body>
  </html>