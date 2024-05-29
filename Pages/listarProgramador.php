<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
  <meta content="Site de controle de desenvolvimento" name="description" property="og:description">
  <link href="../Style/listarProgramador.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
</head>
<body>
  <div class="container">
    <h1>Nossos programadores</h1>
    <form action="listarProgramador.php" method="post">
        <div class="search-container">
            <input type="text" name="nomep" id="searchFirstName" placeholder="Primeiro Nome">
            <input type="text" name="nomeu" id="searchLastName" placeholder="Último Nome">
            <input type="text" name="linguagem" id="searchFavoriteLanguage" placeholder="Linguagem Favorita">
            <input type="submit" name="botao" value="Mostrar">
        </div>
    </form>
    
    <table class="programmers-table">
      <thead>
        <tr>
          <th>Primeiro Nome</th>
          <th>Último Nome</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Linguagem Favorita</th>
        </tr>
      </thead>
      <tbody id="resultsTable">
        <?php if (@$_POST['botao'] == "Mostrar") { ?>
            <?php
            $nomep = $_POST['nomep'];
            $nomeu = $_POST['nomeu'];
            $linguagem = $_POST['linguagem'];

            $query = "SELECT *
                      FROM programador 
                      INNER JOIN linguagem ON fk_linguagem_id_linguagem  = linguagem.id_linguagem
                      WHERE id_programador > 0 ";
            $query .= ($nomep ? " AND programador.primeiro_nome LIKE '%$nomep%' " : "");
            $query .= ($nomeu ? " AND programador.ultimo_nome LIKE '%$nomeu%' " : "");
            $query .= ($linguagem ? " AND linguagem.nome_linguagem LIKE '%$linguagem%' " : "");
            $query .= " ORDER BY programador.primeiro_nome";
            $result = mysqli_query($mysqli, $query);

            while ($coluna = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $coluna['primeiro_nome']; ?></td>
                    <td><?php echo $coluna['ultimo_nome']; ?></td>
                    <td><?php echo $coluna['cpf_programador']; ?></td>
                    <td><?php echo $coluna['data_nascimento']; ?></td>
                    <td><?php echo $coluna['nome_linguagem']; ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <a href="../index.html" class="listar-botao-voltar">Voltar</a>
</body>
</html>
