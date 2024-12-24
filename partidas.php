<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidas - EsportX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="includes/styles.css">
    <style>
        .card {
            border: 1px solid #333;
        }

        .card-header {
            font-weight: bold;
            background-color: #444;
        }

        .card-body img {
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <?php require('includes/connection.php') ?> 
    <?php require('includes/menu.php') ?>    

    <div class="container mt-5">
        <h1 class="my-4 text-center">Partidas</h1>
        
        <!-- Filtros -->
        <div class="container mb-4 text-center">
            <div>
                <button class="btn btn-dark filter-btn active" onclick="filterPartidas('all')">Todas</button>
                <button class="btn btn-dark filter-btn" onclick="filterPartidas('cs2')">CS2</button>
                <button class="btn btn-dark filter-btn" onclick="filterPartidas('valorant')">Valorant</button>
            </div>
        </div>

        <!-- Partidas -->
        <div class="row">
            <?php
            $sql = 'SELECT * FROM partidas ORDER BY data, hora';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            if ($stmt && $stmt->rowCount() > 0) {
                while ($partida = $stmt->fetchObject()) {
                    ?>
                    <div class="col-md-6 col-lg-4 partida mb-4" data-category="<?= $partida->categoria ?>">
                        <div class="card bg-dark text-white h-100">
                            <div class="card-header text-center">
                                <?= $partida->data ?>
                            </div>
                            <div class="card-body text-center">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <img src="imgs/logos/<?= $partida->logoA ?>" alt="<?= $partida->timeA ?>" width="50">
                                        <p class="mb-0"><?= $partida->timeA ?></p>
                                    </div>
                                    <div>
                                        <h5>vs</h5>
                                    </div>
                                    <div>
                                        <img src="imgs/logos/<?= $partida->logoB ?>" alt="<?= $partida->timeB ?>" width="50">
                                        <p class="mb-0"><?= $partida->timeB ?></p>
                                    </div>
                                </div>
                                <p class="text-center"><i class="bi bi-clock"></i> <?= $partida->hora ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center">Nenhuma partida encontrada.</p>';
            }
            ?>
        </div>
    </div>

    <?php require('includes/footer.php') ?>    

    <script>
        function filterPartidas(category) {
            const partidas = document.querySelectorAll('.partida');
            partidas.forEach(partida => {
                if (category === 'all' || partida.getAttribute('data-category') === category) {
                    partida.style.display = 'block';
                } else {
                    partida.style.display = 'none';
                }
            });
        }

        // Ativar botão selecionado visualmente
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Mostrar todas as partidas ao carregar a página
        document.addEventListener("DOMContentLoaded", () => {
            filterPartidas('all');
        });
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
