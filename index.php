<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsportX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="includes/styles.css">
</head>
<body>

    <?php require('includes/connection.php') ?>    
    <?php require('includes/menu.php') ?>    
       
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="carousel slide shadow-sm rounded" id="galeria-principal" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-slide-to="0" data-bs-target="#galeria-principal" class="active"></button>
                        <button type="button" data-bs-slide-to="1" data-bs-target="#galeria-principal"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="4000">
                            <img src="imgs/img1.jpg" alt="Imagem do carousel 1" class="d-block w-100 rounded">
                            <div class="carousel-caption d-block">
                                <h1 class="display-4 bg-dark bg-opacity-75 rounded">Bem-vindo ao EsportX</h1>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <img src="imgs/img2.jpg" alt="Imagem do carousel 2" class="d-block w-100 rounded">
                            <div class="carousel-caption d-block">
                                <h5 class="bg-dark bg-opacity-75 rounded py-2">Eventos e Competições</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galeria-principal" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galeria-principal" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="bg-dark text-white rounded p-4 shadow-sm">
                    <h2>Eventos Futuros</h2>
                    <table class="table table-dark table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Nome do evento</th>
                                <th>Data de Início</th>
                                <th>Local</th>
                                <th>Prêmio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT *FROM eventos WHERE status='incompleto' LIMIT 3";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute();

                            if ($stmt && $stmt->rowCount() > 0) {
                                while ($evento = $stmt->fetchObject()) {
                                    ?>    
                                    <tr>
                                        <td><?= $evento->nome ?></td>
                                        <td><?= $evento->data ?></td>
                                        <td><?= $evento->local ?></td>
                                        <td><?= $evento->premio ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="eventos.php" class="btn btn-outline-light filter-btn mt-3">Ver Mais</a>
                </div>

                <div class="bg-dark text-white rounded p-4 shadow-sm mt-4">
                    <h2>Últimas Notícias</h2>
                    <?php
                    $sqlNoticias = "SELECT * FROM noticias LIMIT 2";
                    $stmtNoticias = $dbh->prepare($sqlNoticias);
                    $stmtNoticias->execute();
                    
                    if ($stmtNoticias && $stmtNoticias->rowCount() > 0) {
                        while ($noticia = $stmtNoticias->fetchObject()) {
                            ?>
                            <div class="card bg-dark text-white mb-3 border-0 shadow-sm">
                                <img src="imgs/news/<?= $noticia->img ?>" class="mr-3 rounded" alt="<?= $noticia->titulo ?>" style="width: 64px; height: 64px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="mt-0"> <?= $noticia->titulo ?> </h5>
                                    <p><?= $noticia->info ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <a href="noticias.php" class="btn btn-outline-light filter-btn mt-3">Ver Mais</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-dark text-white rounded p-4 shadow-sm">
                    <h2>Partidas</h2>
                    <table class="table table-dark table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Time A</th>
                                <th>Time B</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlPartidas = "SELECT * FROM partidas ORDER BY data DESC LIMIT 3";
                            $stmtPartidas = $dbh->prepare($sqlPartidas);
                            $stmtPartidas->execute();
                            
                            if ($stmtPartidas && $stmtPartidas->rowCount() > 0) {
                                while ($partida = $stmtPartidas->fetchObject()) {
                                    ?>
                                    <tr>
                                        <td><?= $partida->data ?></td>
                                        <td><?= $partida->timeA ?></td>
                                        <td><?= $partida->timeB ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="partidas.php" class="btn btn-outline-light filter-btn mt-3">Ver Mais</a>
                </div>
            </div>
        </div>
    </div>

    <?php require('includes/footer.php') ?>    

    <script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
