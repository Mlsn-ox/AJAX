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
    <title>BrosseBrosseBrosse</title>
</head>

<body>
    <h1 class="text-center my-4">Brosse moi avec...</h1>
    <div class="container-fluid col-xl-10 text-center">
        <button class="btn btn-outline-info btn-lg fs-2">💆💁💕</button>
    </div>
    <div class="col-xl-10 my-4 mx-auto insert"></div>
    <script>
        const btn = document.querySelector(".btn");
        const display = document.querySelector(".insert");
        const imgSrc = [
            "./img/brosse-pour-chauve.jpg",
            "./img/brosse-vaisselle.webp",
            "./img/brosse-wc-ceramique.jpg",
            "./img/brosse-wc-cerise.avif",
            "./img/brosse-wc-tete-macron.jpg",
            "./img/brosseados.jpg",
            "./img/belle.webp"
        ];

        btn.addEventListener('click', function() {
            fetch('random.php')
                .then(response => response.json())
                .then(res => {
                    brosse = res.contenu
                    display.innerHTML = `
                        <div class="card mx-auto" style="width: 24rem;">
                            <img src="" class="card-img-top randsource" alt="Superbe brosse">
                            <div class="card-body">
                                <p class="card-text fs-4 text-center">
                                    ...cette superbe brosse en ${brosse.brosse_matiere}, 
                                    avec des magnifiques ${brosse.brosse_type_poil}.
                                </p>
                            </div>
                        </div>`
                    const img = document.querySelector(".randsource");
                    const card = document.querySelector(".card");
                    img.src = imgSrc[Math.floor(Math.random() * imgSrc.length)]
                    card.style.boxShadow = `1px 1px 20px 5px ${brosse.brosse_couleur}`
                })
        })
    </script>
</body>

</html>