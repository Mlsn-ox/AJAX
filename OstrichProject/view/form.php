<?php
include "base.php";
include "../controller/pdo.php";
$sql = "SELECT ostrich_id FROM ostrich";
$stmt = $pdo->query($sql);
$ostriches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="savanna">
        <div class="col-xxl-8 col-md-10 col-12 mx-auto bru2 px-3">
            <form class="px-1 px-md-3 pt-md-4"
                action="../controller/add_ostrich.php"
                method="POST">
                <h1 class="text-center text-black mb-4 mt-2">
                    Inscrire votre autruche
                </h1>
                <!-- name -->
                <div class="row">
                    <div class="row mb-4 col-5">
                        <label class="col-sm-2 col-form-label"
                            for="name">
                            Nom
                        </label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                name="name">
                        </div>
                    </div>
                    <!-- Date de naissance -->
                    <div class="row mb-4 col-7">
                        <label class="col-sm-4 col-form-label text-end"
                            for="birthdate">
                            Date de Naissance
                        </label>
                        <div class="col-sm-8">
                            <input
                                type="date"
                                class="form-control"
                                name="birthdate">
                        </div>
                    </div>
                </div>
                <!-- sex -->
                <fieldset class="row mb-4">
                    <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                    <div class="col-sm-7 row">
                        <div class="form-check col-sm-4">
                            <input class="form-check-input"
                                type="radio"
                                name="sex"
                                id="gridRadios1"
                                value="1" checked>
                            <label class="form-check-label"
                                for="gridRadios1">
                                Mâle
                            </label>
                        </div>
                        <div class="form-check col-sm-4">
                            <input class="form-check-input"
                                type="radio"
                                name="sex"
                                id="gridRadios2"
                                value="0">
                            <label class="form-check-label"
                                for="gridRadios2">
                                Femelle
                            </label>
                        </div>
                    </div>
                </fieldset>
                <!-- SUBMIT-->
                <div class="row justify-content-around">
                    <div class="col-xl-3 col-sm-5">
                        <input
                            type="submit"
                            id="btn"
                            class="form-control btn btn-success py-2"
                            value="Enregistrer">
                        </input>
                    </div>
                    <div class="col-xl-3 col-sm-5">
                        <a class="form-control btn btn-primary py-2 "
                            href="homepage.php"
                            role="button">Accueil</a>
                    </div>
                </div>
            </form>
            <div class="message">
                <?php
                if (isset($_GET["message"]) && isset($_GET["status"])) {
                    $message = $_GET["message"];
                    $status = $_GET["status"];
                    echo "<h2 class='mt-1 $status'>$message</h2>";
                }
                ?>
            </div>
            <table class="table table-secondary table-striped text-center mb-5">
                <thead>
                    <tr class="en-tete">
                        <th scope="col-1">Nom</th>
                        <th scope="col-1">Sexe</th>
                        <th scope="col-1">Age</th>
                        <th scope="col-1">Supprimer</th>
                    </tr>
                </thead>
                <tbody id="liste">
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="validation_delete" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Supprimer ?
                    </h5>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-2">
                        Confirmer la suppression de l'autruche
                    </p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <a type="button"
                        class="btn btn-outline-primary"
                        data-bs-dismiss="modal">
                        Annuler
                    </a>
                    <a href=""
                        type="button"
                        class="btn btn-danger"
                        id="delete">
                        Supprimer
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btn = document.getElementById('btn');
        const liste = document.getElementById('liste');
        const dltBtn = document.querySelector("#delete");
        let today = new Date()

        function getAge(birthdate) {
            let birth = new Date(birthdate);
            let diff = today - birth;
            let age = Math.round(diff / 31536000000);
            return age;
        }

        getOstrich()

        function getOstrich() {
            fetch('../controller/traitement.php')
                .then(response => response.json())
                .then(res => {
                    let ostriches = res.contenu;
                    let affichage = "";
                    ostriches.forEach(ostrich => {
                        let ageOstrich = getAge(ostrich.ostrich_birthdate)
                        let genre = ostrich.ostrich_sex == "1" ? "♂" : "♀";
                        let genreColor = ostrich.ostrich_sex == "1" ? "text-primary" : "text-danger-emphasis";
                        affichage += `
                            <tr class="bg-light-subtle">
                                <td>
                                    ${ostrich.ostrich_name}
                                </td>
                                <td class=${genreColor}>
                                    ${genre}
                                </td>
                                <td>
                                    ${ageOstrich} ${ageOstrich > 1 ? 'ans' : 'an'}
                                </td>
                                <td>
                                    <span data-toggle="tooltip" title="supprimer">
                                        <a class="px-3 text-decoration-none suppression"
                                            href="../controller/delete_ostrich.php?ostrich_id=${ostrich.ostrich_id}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#validation_delete">
                                            <img src="../style/trash.svg" alt="icone poubelle pour suppression" width="18px">
                                        </a>
                                    </span>
                                </td>
                            </tr>`
                    })
                    liste.innerHTML = affichage;
                    const supp = document.querySelectorAll(".suppression")
                    supp.forEach(del => {
                        del.addEventListener("click", function() {
                            let href = this.href;
                            dltBtn.href = href;
                        })
                    });
                })
        }
    </script>
</body>

</html>