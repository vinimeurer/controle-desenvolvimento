<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
  <meta content="Development portfolio of .... " name="description" property="og:description">
  <link href="../Style/listarSoftware.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css">
  <?php include ('../php/config.php'); ?>
  <style>
    /* Estilo para o menu de descrição */
    .descricao-menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 200px;
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      padding: 12px;
      z-index: 1;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Nossos Softwares</h1>
  <form action="listarSoftware.php" method="post">
    <div class="search-container">
      <input type="text" name="nome_software" id="searchSoftwareName" placeholder="Nome do Software">
      <input type="text" name="programador" id="searchDeveloper" placeholder="Quem Desenvolveu">
      <input type="text" name="linguagem" id="searchUsedLanguage" placeholder="Linguagem Utilizada">
      <input type="submit" name="botao" value="Mostrar">
    </div>
  </form>
  <table class="software-table">
    <thead>
      <tr>
        <th>Comprar</th>
        <th>Nome do Software</th>
        <th>Data de Lançamento</th>
        <th>Linguagem Utilizada</th>
        <th>Quem Desenvolveu</th>
        <th>Valor</th>
        <th>Detalhes</th>
      </tr>
    </thead>
    <tbody id="resultsTable">
      <!-- Os resultados da pesquisa serão exibidos aqui -->
      <?php
      if (@$_POST['botao'] == "Mostrar") {
        $nome_software = $_POST['nome_software'];
        $programador = $_POST['programador'];
        $linguagem = $_POST['linguagem'];

        $query = "SELECT *
                  FROM software 
                  INNER JOIN linguagem ON fk_linguagem_id_linguagem = linguagem.id_linguagem
                  INNER JOIN programador ON fk_programador_id_programador = programador.id_programador
                  WHERE id_programador > 0 ";
        $query .= ($nome_software ? " AND software.nome_software LIKE '%$nome_software%' " : "");
        $query .= ($programador ? " AND programador.primeiro_nome LIKE '%$programador%' " : "");
        $query .= ($linguagem ? " AND linguagem.nome_linguagem LIKE '%$linguagem%' " : "");
        $query .= " ORDER BY software.nome_software";
        $result = mysqli_query($mysqli, $query);

        while ($coluna = mysqli_fetch_array($result)) {
      ?>
          <tr>
            <td><a href="./loginCliente.php" class="comprar-btn" target="_blank">Comprar</a></td>
            <td><?php echo $coluna['nome_software']; ?></td>
            <td><?php echo $coluna['data_lancamento']; ?></td>
            <td><?php echo $coluna['nome_linguagem']; ?></td>
            <td><?php echo $coluna['primeiro_nome']; ?></td>
            <td><?php echo $coluna['valor_software']; ?></td>
            <td><button class="detalhes-btn">Detalhes</button>
              <div class="descricao-menu"><?php echo $coluna['desc_software']; ?></div></td>
          </tr>
      <?php 
        }
      }
      ?>
    </tbody>
  </table>
  <a href="../index.html" class="listar-botao-voltar">Voltar</a>
</div>

<script>
  $(document).ready(function(){
    // Mostrar/Esconder menu de descrição ao clicar no botão "Detalhes"
    $(".detalhes-btn").click(function(){
      $(this).next(".descricao-menu").toggle();
    });
  });
</script>
</body>
</html>
