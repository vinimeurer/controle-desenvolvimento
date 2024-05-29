<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
  <meta content="Site de controle de desenvolvimento" name="description" property="og:description">
  <link href="../Style/compra.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
  <script src="#"></script>
</head>
<body>
<div class="container">
  <div class="form-header">
    <h2>Realize sua compra</h2>
  </div>
  <form action="compra.php" method="post" name="compra">
    <div>
      <div>Data da compra:</div>
      <div><input type="date" name="data_compra" required></div>
    </div>
    <div>
      <label for="cpf_cliente">CPF (sem pontuação):</label>
      <input type="text" name="cpf_cliente" pattern="[0-9]{11}" maxlength="11" required>
    </div>
    <div>
      <label for="nome_software">Nome Software: <br>
      <a href="./listarSoftware.php" class="links-cadastro" target="_blank">Clique aqui para ver os softwares</a>
      </label>
      <?php
      $resultado = $mysqli->query("SELECT id_software, nome_software FROM software");
      echo "<select name='nome_software'>";
      while ($row = $resultado->fetch_assoc()) {
        echo "<option value='" . $row['id_software'] . "'>" . $row['nome_software'] . "</option>";
      }
      echo "</select>";
      ?>
    </div>
    <div>
      <input type="submit" value="Finalizar" name="botao">
    </div>
  </form>
  <a href="./listarSoftware.php" class="compra-botao-voltar">Voltar</a>
  <?php
  if (isset($_POST['botao']) && $_POST['botao'] == "Finalizar") {
    // Obtenha os dados do formulário
    $data_compra = $_POST['data_compra'];
    $cpf_cliente = $_POST['cpf_cliente'];
    $nome_software = $_POST['nome_software'];

    // Verifica se o CPF existe na tabela de cliente
    $query_verifica_cpf = "SELECT id_cliente FROM cliente WHERE cpf_cliente = '$cpf_cliente'";
    $resultado_verifica_cpf = $mysqli->query($query_verifica_cpf);

    if ($resultado_verifica_cpf && $resultado_verifica_cpf->num_rows > 0) {
      $row_cliente = $resultado_verifica_cpf->fetch_assoc();
      $id_cliente = $row_cliente['id_cliente'];

      // Consulta para obter o valor do software com base na chave estrangeira fornecida
      $query_valor_software = "SELECT valor_software FROM software WHERE id_software = $nome_software";
      $resultado_valor_software = $mysqli->query($query_valor_software);

      // Verifica se a consulta foi bem-sucedida
      if ($resultado_valor_software) {
        $row_valor_software = $resultado_valor_software->fetch_assoc();
        $valor_software = $row_valor_software['valor_software'];

        // Insira os dados na tabela de compra, incluindo o valor do software
        $insere = "INSERT INTO compra (data_compra, fk_cliente_id_cliente, fk_software_id_software, valor_compra) VALUES ('$data_compra', '$id_cliente', '$nome_software', '$valor_software')";
        if (mysqli_query($mysqli, $insere)) {
          // Redirecionamento de volta para a tela HTML
          header("Location: ./pagamento.html");
          exit(); // Certifique-se de sair do script após o redirecionamento
        } else {
          echo "Erro ao inserir dados: " . mysqli_error($mysqli);
        }
      } else {
        echo "Erro ao obter o valor do software: " . mysqli_error($mysqli);
      }
    } else {
      echo "<script> alert('CPF não encontrado na tabela de clientes.')</script>";
    }
  }
  ?>
</div>
</body>
</html>
