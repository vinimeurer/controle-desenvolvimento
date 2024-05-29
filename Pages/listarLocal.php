<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
	<meta content="Site de controle de desenvolvimento" name="description" property="og:description">
	<link href="../Style/listarLocal.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
</head>
<body>
<div class="container">
        <h1>Locais onde atuamos</h1>
        <form action="listarLocal.php" method="post">
        <div class="search-container">
          <input type="text" name="nome_municipio" id="searchCity" placeholder="Cidade">
          <input type="text" name="sigla_uf" id="searchState" placeholder="UF">
          <input type="submit" name="botao" value="Mostrar">
        </div>
        </form>
        <table class="location-table">
          <thead>
            <tr>
              <th>Cidade</th>
              <th>UF</th>
            </tr>
          </thead>
          <tbody id="resultsTable">
            <!-- Os resultados da pesquisa serão exibidos aqui -->
            <?php
            if (@$_POST['botao'] == "Mostrar") {
              $nome_municipio = $_POST['nome_municipio'];
              $sigla_uf = $_POST['sigla_uf'];

              $query = "SELECT *
                        FROM municipio 
                        INNER JOIN uf ON fk_uf_id_uf = uf.id_uf 
                        WHERE id_municipio > 0 ";
              $query .= ($nome_municipio ? " AND nome_municipio LIKE '%$nome_municipio%' " : "");
              $query .= ($sigla_uf ? " AND sigla_uf LIKE '%$sigla_uf%' " : "");
              $query .= " ORDER BY nome_municipio";
              $result = mysqli_query($mysqli, $query);

              while ($coluna = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $coluna['nome_municipio']; ?></td>
                    <td><?php echo $coluna['sigla_uf']; ?></td>
                </tr>
            <?php 
              }
            }
            ?>
          </tbody>
        </table>
        <a href="../index.html" class="listar-botao-voltar">Voltar</a>
      </div>
  </body>
</html>
