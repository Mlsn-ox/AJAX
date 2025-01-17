<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>MakeMyautruche</title>
</head>

<body>
    <h1 class="text-center">Make My autruche</h1>
    <h2 class="text-center">Fait ton autruche customisée</h2>

    <form id="form" class="w-25 mx-auto">
        <label class="form-label" for="autruche_nom">Nom de l'autruche</label>
        <input class="form-control" type="text" name="autruche_nom">

        <div class="text-center my-3">
            <input class="btn btn-primary" type="submit" value="MAKE MY AUTRUCHE !!!">
        </div>
    </form>

    <div class="text-center">
        <ul id="list" class="list-unstyled h3"></ul>
    </div>

    <div class="modal" id="validation-delete" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez vous supprimez cette grosse poulettes.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <button id="delete" data-id="" class="btn btn-danger" data-bs-dismiss="modal">Supprimer</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        const form = document.getElementById('form');
        const list = document.getElementById('list');
        const btnDelete = document.getElementById('delete');

        // AJAX pour afficher les autruches lors du chargement de la page

        //Cette fonction permet d'afficher 
        // toutes les autruche de mettre un 
        // listener sure les boutons supressions
        toutesLesAutruches();

        function toutesLesAutruches() {

            list.innerHTML = '';

            fetch("toutesLesAutruches.php")
                .then(response => response.json())
                .then(res => {
                    console.log(res)
                    res.forEach(autruche => {
                        let li = document.createElement("li")
                        let btnDelete = `<button data-id='${autruche.autruche_id}' class='btn btn-danger mx-2 del' data-bs-toggle="modal" data-bs-target="#validation-delete">X</button>`
                        li.innerHTML = autruche.autruche_nom + btnDelete;
                        list.appendChild(li)
                    })

                    const deletesBtn = document.querySelectorAll(".del");

                    deletesBtn.forEach(btn => {
                        btn.addEventListener("click", function() {
                            let btnId = btn.dataset.id;
                            btnDelete.dataset.id = btnId;
                            console.log(btnDelete.dataset.id);

                        })
                    })

                })
        }


        // Bouton supprimer du modal
        btnDelete.addEventListener("click", function() {

            let id = this.dataset.id

            const formData = new FormData();
            formData.append("id", id);

            const data = {
                method: 'POST',
                body: formData
            }

            fetch('autruche_suppression.php', data)
                .then(response => response.json())
                .then(res => {
                    toutesLesAutruches();
                })



        })






        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const data = {
                method: 'POST',
                body: new FormData(form),
            }
            fetch("autruche_ajouter.php", data)
                .then(response => response.json())
                .then(res => {
                    toutesLesAutruches();
                })

        })
    </script>

</body>

</html>