<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atelier de Larbin</title>
</head>
<body>

    <h1 class="text-center">Atelier de Larbin</h1>

    <div class="text-center">
        <button id="btn" class="btn btn-primary">Générer un Larbin</button>
    </div>

    <div class="container-fluid">
        <div id="liste" class="row flex-wrap justify-content-center">

        </div>
    </div>

    <script>
        const btn = document.getElementById('btn');
        const liste = document.getElementById('liste');

        btn.addEventListener('click', function(){
            console.log("ok")
            fetch('controller.php')
            .then(response => response.json())
            .then(res => {
                let larbins = res.contenu;
                console.log(larbins);
                let affichage = "";
                larbins.forEach(larbin => {

                    genre = larbin.genre_larbin == "M" ? "Garçon" : "Fille";

                    affichage += `
                    <div class="col-4">
                    <div class="card" style="width: 18rem;">
                    <img src="img/${larbin.image_larbin}" class="card-img-top" alt="une image de larbin de noel">
                    <div class="card-body">
                    <h5 class="card-title">${larbin.nom_larbin}</h5>
                    <h5 class="card-title">${genre}</h5>
                    </div>
                    </div>
                    </div>`
                })
                liste.innerHTML = affichage;
            })

        })




    </script>

</body>
</html>