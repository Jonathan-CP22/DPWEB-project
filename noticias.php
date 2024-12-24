<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias - EsportX</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="includes/styles.css">
    <style>
        .news-card img {
            height: 200px;
            object-fit: cover;
        }

        .card {
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
        }

    </style>
</head>
<body>

    <?php require('includes/connection.php') ?>    
    <?php require('includes/menu.php') ?>    

    <div class="container mt-5">
        <h1 class="text-center mb-4">Notícias</h1>

        <div class="text-center mb-4">
            <button class="btn btn-dark filter-btn" onclick="filterNews('cs2')">CS2</button>
            <button class="btn btn-dark filter-btn" onclick="filterNews('valorant')">Valorant</button>
        </div>

        <div class="row" id="news-container">
            <?php
            $sql = 'SELECT * FROM noticias';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            if ($stmt && $stmt->rowCount() > 0) {
                while ($noticia = $stmt->fetchObject()) {
                    ?>
                    <div class="col-md-4 news-card mb-4" data-category="<?= $noticia->categoria ?>">
                        <div class="card bg-dark text-white">
                            <img src="imgs/news/<?= $noticia->img ?>" class="card-img-top" alt="<?= $noticia->titulo ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $noticia->titulo ?></h5>
                                <p class="card-text"><?= substr($noticia->info, 0, 150) ?>...</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center">Nenhuma notícia encontrada.</p>';
            }
            ?>
        </div>
    </div>

    <?php require('includes/footer.php') ?>    

    <script>
        function filterNews(category) {
            const cards = document.querySelectorAll('.news-card');

            cards.forEach(card => {
                card.style.display = (card.getAttribute('data-category') === category) ? 'block' : 'none';
            });
        }
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
