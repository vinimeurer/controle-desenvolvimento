<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
	<meta content="Site de controle de desenvolvimento" name="description" property="og:description">
	<link href="../Style/cadastroProgramador.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
</head>
<body>

  <div class="cadastro_programador">
    <h2>Cadastro de Programador</h2>
    <form action="cadastroProgramador.php" method="post">
      <label for="primeiro_nome">Primeiro nome:</label>
      <input type="text" id="primeiro_nome" name="primeiro_nome" required>
  
      <label for="ultimo_nome">Último nome:</label>
      <input type="text" id="ultimo_nome" name="ultimo_nome" required>
  
      <label for="cpf_programador">CPF (sem pontuação):</label>
      <input type="text" id="cpf_programador" name="cpf_programador" pattern="[0-9]{11}" maxlength="11" required title="Digite um CPF válido (11 dígitos sem pontuação).">
  
      <label for="data_nascimento">Data de nascimento:</label>
      <input type="date" id="data_nascimento" name="data_nascimento" required>

      <label for="linguagem_favorita">
        Linguagem favorita:
        <br>
        <a href="./cadastroLinguagem.php" class="links-cadastro">Caso não tenha encontrado a linguagem, clique aqui para cadastrar</a>
      </label>
      <?php
      $resultado = $mysqli->query("SELECT id_linguagem, nome_linguagem FROM linguagem");
      echo "<select name='linguagem_favorita'>";
      while ($row = $resultado->fetch_assoc()) {
        echo "<option value='" . $row['id_linguagem'] . "'>" . $row['nome_linguagem'] . "</option>";
      }
      echo "</select>";
      ?>
  
      <input type="submit" value="Cadastrar" name="botao" class="cadastrar_linguagem">
    </form>
  </div>
  
  <a href="./cadastros.html" class="cadastro-programador-botao-voltar">Voltar</a>
  <?php
      if (@$_POST['botao'] == "Cadastrar") {
        $primeiro_nome = $_POST['primeiro_nome'];
        $ultimo_nome = $_POST['ultimo_nome'];
        $cpf_programador = $_POST['cpf_programador'];
        $data_nascimento = $_POST['data_nascimento'];
        $linguagem_favorita = $_POST['linguagem_favorita'];
        $insere = "INSERT into programador(primeiro_nome, ultimo_nome, cpf_programador, data_nascimento, fk_linguagem_id_linguagem) VALUES ('$primeiro_nome','$ultimo_nome','$cpf_programador','$data_nascimento','$linguagem_favorita')";
        mysqli_query($mysqli, $insere) or die ("Não foi possível inserir os dados");
      }
  ?>


</body>
</html>
