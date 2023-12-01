<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Page étudiant</title>
</head>

<body style="background-image:url(images/image4.jpg)">
    <div class="container mt-5">
        <h1 class="text-center">FORMULAIRE DE RECOURS</h1>
        <form method="post" action="Api.php">
    	<div class="container mt-5 pt-5">
        	<div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="form-group">
                        <label for="ID" class="font-weight-bold">ID</label>
                        <input type="text" class="form-control" name="ID">
                    </div>
                    <div class="form-group">
                        <label for="MODULE" class="font-weight-bold">MODULE</label>
                        <input type="text" class="form-control" name="MODULE">
                    </div>
                    <div class="form-group">
                        <label for="NATURE" class="font-weight-bold">NATURE (CC, Examen)</label>
                        <select id="NATURE" name="NATURE" class="form-control">
                            <option value="CC">CC</option>
                            <option value="Examen">Examen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NOTE-AFFICHE" class="font-weight-bold">NOTE AFFICHE</label>
                        <input type="number" class="form-control" name="NOTE-AFFICHE">
                    </div>
                    <div class="form-group">
                        <label for="NOTE-REEL" class="font-weight-bold">NOTE REEL</label>
                        <input type="number" class="form-control" name="NOTE-REEL">
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
</div>
</div>
</div>
        </form>
    </div>

    <!-- Bootstrap JS and other scripts if needed -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>