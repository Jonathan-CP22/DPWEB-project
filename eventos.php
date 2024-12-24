<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos - EsportX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="includes/styles.css">
    <style>
        .event-card img {
            height: 180px;
            object-fit: contain;
        }

        .badge {
            font-size: 1rem;
            padding: 8px 16px;
            border-radius: 20px;
        }

        .dropdown-item:hover {
            background-color: #444;
            color: whitesmoke;
        }
    </style>
</head>
<body>

    <?php require('includes/connection.php'); ?> 
    <?php require('includes/menu.php'); ?>    

    <div class="container mt-5">
        <h1 class="text-center mb-4">Eventos</h1>

        <div class="text-center mb-4">
            <div class="dropdown d-inline">
                <button class="btn btn-dark filter-btn dropdown-toggle" type="button" id="dropdownCS2" data-bs-toggle="dropdown">
                    CS2
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" onclick="filterEvents('cs2', 'incompleto')">Eventos Futuros</button></li>
                    <li><button class="dropdown-item" onclick="filterEvents('cs2', 'completo')">Eventos Completos</button></li>
                </ul>
            </div>

            <div class="dropdown d-inline">
                <button class="btn btn-dark filter-btn dropdown-toggle" type="button" id="dropdownValorant" data-bs-toggle="dropdown">
                    Valorant
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" onclick="filterEvents('valorant', 'incompleto')">Eventos Futuros</button></li>
                    <li><button class="dropdown-item" onclick="filterEvents('valorant', 'completo')">Eventos Completos</button></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <?php
            $sql = "SELECT * FROM eventos ORDER BY data";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            if ($stmt && $stmt->rowCount() > 0) {
                while ($evento = $stmt->fetchObject()) {
                    $statusBadge = ($evento->status == 'completo') ? 'success' : 'warning';
                    ?>
                    <div class="col-md-6 col-lg-4 mb-4 event-card" data-category="<?= $evento->categoria ?>" data-status="<?= $evento->status ?>">
                        <div class="card bg-dark text-white h-100">
                            <img src="imgs/eventos/<?= $evento->img ?>" class="card-img-top" alt="<?= $evento->nome ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $evento->nome ?></h5>
                                <p class="card-text"><i class="bi bi-calendar"></i> <?= $evento->data ?></p>
                                <p><i class="bi bi-geo-alt"></i> <?= $evento->local ?></p>
                                <p><i class="bi bi-trophy"></i> Prêmio: <strong><?= $evento->premio ?></strong></p>
                            </div>
                            <div class="card-footer text-center">
                                <span class="badge bg-<?= $statusBadge ?>"><?= $evento->status ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center">Nenhum evento encontrado.</p>';
            }
            ?>
        </div>
    </div>

    <?php require('includes/footer.php'); ?>    

    <script>
        function filterEvents(category, status) {
            const cards = document.querySelectorAll('.event-card');
            cards.forEach(card => {
                const rowCategory = card.getAttribute('data-category');
                const rowStatus = card.getAttribute('data-status');

                const categoryMatch = category === 'all' || rowCategory === category;
                const statusMatch = status === 'all' || rowStatus === status;

                if (categoryMatch && statusMatch) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
