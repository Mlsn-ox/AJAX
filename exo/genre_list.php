<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/style.css">
    <title>Scroll Movies</title>
</head>

<body>
    <div class="container px-5 py-4">
        <table class="table table-hover border">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody id="tableau">
            </tbody>
        </table>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'>
    </script>
    <script>
        const table = document.querySelector("#tableau")
        const urlParams = new URLSearchParams(window.location.search);
        const genre = urlParams.get('genre');
        const options = {
            method: 'GET',
            headers: {
                accept: 'application/json',
                Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2MjU5OTRmYWI5ZDljYmE0ZjU2NzI3NmIwMjdjYzA4NiIsIm5iZiI6MTczNDUzNDU4OS4wNjMsInN1YiI6IjY3NjJlNWJkOGQxY2ZkYzUyMjRhMzQwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hrQwwr_wex6bORJPcA7JdcD0pG7HfhCzPLwPV6xsMRw'
            }
        };

        function affichage() {
            fetch(`https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=fr&page=1&sort_by=popularity.desc&with_genres=${genre}`, options)
                .then(res => res.json())
                .then(res => {
                    console.log(res.results)
                    res.results.forEach(movie => {
                        fetch(`https://api.themoviedb.org/3/movie/${movie.id}?language=fr`, options)
                            .then(res => res.json())
                            .then(res => {
                                title = res.title
                                tag = res.tagline
                                note = res.vote_average
                                let ligne = document.createElement("tr")
                                let caseTitre = document.createElement("td")
                                caseTitre.innerHTML = title
                                ligne.appendChild(caseTitre)
                                let caseTag = document.createElement("td")
                                caseTag.innerHTML = tag
                                ligne.appendChild(caseTag)
                                let caseNote = document.createElement("td")
                                caseNote.innerHTML = note
                                ligne.style.cursor = "pointer"
                                ligne.addEventListener("click", () => window.location.href = `movie_view.php&id=${movie.id}`)
                                ligne.appendChild(caseNote)
                                table.appendChild(ligne)
                            })
                            .catch(err => console.error(err));
                    });
                })
                .catch(err => console.error(err));
        }
        affichage()
    </script>
</body>

</html>