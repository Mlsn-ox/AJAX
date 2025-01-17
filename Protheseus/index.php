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
    <title>La Prothèse de votre vie</title>
</head>

<body>
    <h1 class="text-center my-4">Deviens un cyborg</h1>
    <h3 class="text-center my-4">Choisi la matière de ta prothèse</h3>
    <div class="container-fluid col-xl-10 text-center">
        <select class="form-select form-select-lg mb-3">
            <?php
            $pdo = new PDO("mysql:host=localhost;dbname=protheseus", "root", "1234");
            $sql = "SELECT DISTINCT materiau FROM protheses";
            $stmt = $pdo->query($sql);
            $protheses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($protheses as $prothese) {
                $mat = $prothese["materiau"];
                echo "<option value='" . $mat . "'>" . $mat . "</option>";
            };
            ?>
            <option value='0' selected>Tout</option>
        </select>
    </div>
    <div class="col-xl-10 my-4 mx-auto insert row flex-wrap g-3"></div>
    <script>
        const select = document.querySelector("select");
        const display = document.querySelector(".insert");

        letsFetch()

        select.addEventListener("change", function() {
            display.innerHTML = "";
            letsFetch()
        });

        function affichage(a) {
            display.innerHTML += `
                <div class="card mx-auto" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">${a.marque}</h5>
                        <p class="card-text">
                            Prothèse en ${a.materiau} avec une fixation ${a.type_fixation}.
                        </p>
                        <a href="#" class="btn btn-success">Je la veux !</a>
                    </div>
                </div>`
        }

        function getData(el) {
            let value = el.value;
            const formData = new FormData();
            formData.append("materiau", value);
            const data = {
                method: "POST",
                body: formData,
            };
            return data;
        }

        function letsFetch() {
            fetch("filter.php", getData(select))
                .then((response) => response.json())
                .then((res) => {
                    res.contenu.forEach(prothese => {
                        affichage(prothese)
                    });
                })
        }
    </script>
</body>

</html>