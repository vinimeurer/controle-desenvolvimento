<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Controle de desenvolvimento</title>
	<meta content="Site de controle de desenvolvimento" name="description" property="og:description">
	<link href="../Style/listarLinguagem.css" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!-- Load JQuery, as our little script depends on it -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,600,400" rel="stylesheet" type="text/css"> <!-- Load our font from Google -->
  <?php include ('../php/config.php'); ?>
</head>
<body>
  <div class="container">
        <h1>Linguagens que trabalhamos</h1>
        <form action="listarLinguagem.php" method="post">
                <div class="search-container">
                <input type="text" id="searchInput" name="nome" placeholder="Pesquisar por linguagem...">
                <input type="checkbox" name="frameworkCheckbox">É um framework?
                <input type="submit" name="botao" value="Mostrar">
        </form>
        <ul class="languages-list" id="languagesList">
        <!-- Lista de linguagens será adicionada aqui após a pesquisa -->
        </ul>
  </div>
  <?php if (@$_POST['botao'] == "Mostrar") { ?>
    <ul class="languages-list">
        <?php
        $nome = $_POST['nome'];
        $filtro_framework = isset($_POST['frameworkCheckbox']) ? " AND framework = 's'" : "";

        $query = "SELECT nome_linguagem
                  FROM linguagem 
                  WHERE id_linguagem > 0 ";
        $query .= ($nome ? " AND nome_linguagem LIKE '%$nome%' " : "");
        $query .= $filtro_framework;
        $query .= " ORDER BY nome_linguagem";
        $result = mysqli_query($mysqli, $query);

        while ($coluna = mysqli_fetch_array($result)) {
        ?>
            <li>
                <?php echo $coluna['nome_linguagem']; ?>
            </li>
        <?php } ?>
    </ul>
    <?php } ?>
  <a href="../index.html" class="listar-botao-voltar">Voltar</a>
</body>
</html>
