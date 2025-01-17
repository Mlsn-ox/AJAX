<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <title>Like My Trottinette</title>
</head>

<body>
    <h1 class="text-center my-4">Like My Trottinette</h1>
    <div class="container-fluid col-xl-10">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=likemytrottinette", "root", "1234");
            $sql = "SELECT * FROM trottinette WHERE trottinette_valid=1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $trottinettes = $stmt->fetchAll();

            ob_start();
            foreach ($trottinettes as $trottinette) {
            ?>
                <div class="col">
                    <div class="card">
                        <img class="card-img-top"
                            src="img/<?= $trottinette['trottinette_image'] ?>"
                            alt="trottinette">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $trottinette['trottinette_nom'] ?>
                            </h5>
                            <p class="card-text">
                                Cette trottinette est a
                                <?= $trottinette['trottinette_proprietaire_prenom'] .
                                    " " . $trottinette['trottinette_proprietaire_nom']  ?>.
                            </p>
                            <p>
                                Nombre de like est de :
                                <span class="nbrLike" data-id="<?= $trottinette['trottinette_id'] ?>">
                                    <?= $trottinette['trottinette_like'] ?>
                                </span>
                            </p>
                            <button data-id="<?= $trottinette['trottinette_id'] ?>"
                                class="btnLike btn btn-primary">
                                Like-la !
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ob_end_flush();
            ?>


        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-success btn-lg my-4">Retour à la validation</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>