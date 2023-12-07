<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Page étudiant</title>
</head>

<body style="background-image:url(images/image4.jpg)">
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body btn-primary">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path
                                        d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                            </div>
                            <div class="container mt-3">
                                <h1 class="text-center">FORMULAIRE DE RECOURS</h1>
                                <form method="post" action="Api.php">
                                    <div class="container mt-1 pt-1">
                                        <div class="row">
                                            <div class="col-12 col-sm-10 col-md-12 m-auto">
                                                <div class="mb-2">
                                                    <label for="ID" class="form-label font-weight-bold">ID</label>
                                                    <input type="text" class="form-control" name="ID">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="MODULE"
                                                        class="form-label font-weight-bold">MODULE</label>
                                                    <input type="text" class="form-control" name="MODULE">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="NATURE"
                                                        class="form-label font-weight-bold">NATURE (CC, Examen)</label>
                                                    <select id="NATURE" name="NATURE" class="form-control">
                                                        <option value="CC">CC</option>
                                                        <option value="Examen">Examen</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="NOTE-AFFICHE"
                                                        class="form-label font-weight-bold">NOTE AFFICHE</label>
                                                    <input type="number" class="form-control" name="NOTE-AFFICHE">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="NOTE-REEL"
                                                        class="form-label font-weight-bold">NOTE REEL</label>
                                                    <input type="number" class="form-control" name="NOTE-REEL">
                                                </div>
                                                <button type="submit" class="btn btn-dark">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JS and other scripts if needed -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
