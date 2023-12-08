<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background-image:url(image4.jpg)">

    <div class="text-center mt-5">
        <button type="button" class="btn btn-primary my-2 my-sm-0" onclick="openRecours()">Ajouter un Recours</button>
    </div>
    <br>
    <br>
    <div class="text-center">
        <button type="button" class="btn btn-primary my-2 my-sm-0" onclick="redirectToOtherPage2()">Voir les résultats de Recours</button>
    </div>

    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Recours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeRecours()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Onsubmit appelle la fonction submitRecoursForm() lorsque le formulaire est soumis -->
                    <form id="recoursForm" onsubmit="return submitRecoursForm()">
                        <div class="form-group">
                            <label for="nom" class="text-primary">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="text-primary">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                        <div class="form-group">
                            <label for="groupe" class="text-primary">Groupe:</label>
                            <input type="text" class="form-control" id="groupe" name="groupe">
                        </div>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirectToOtherPage2() {
            window.location.href = 'liste.php';
        }

        function openRecours() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';
        }

        function closeRecours() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }

        function submitRecoursForm() {
            // Récupérer les valeurs du formulaire
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var groupe = document.getElementById('groupe').value;

            // Vérifier si les champs sont vides
            if (nom === '' || prenom === '' || groupe === '') {
                alert('Veuillez remplir tous les champs.');
                return false; // Empêche la soumission du formulaire
            }

            // Effectuer la vérification côté client (remplacez cela par votre propre logique)
            var verificationResult = verifyInDatabase(nom, prenom, groupe);

            // Si la vérification réussit, rediriger vers formulaire.php
            if (verificationResult) {
                window.location.href = 'formulaire.php';
            } else {
                // Si la vérification échoue, afficher un message et rediriger vers add.php
                alert('Il faut d\'abord entrer vos informations.');
                window.location.href = 'add.php';
            }

            // Empêche la soumission du formulaire (car nous avons géré la redirection manuellement)
            return false;
        }

        // Fonction de vérification côté client (remplacez cela par votre propre logique)
        function verifyInDatabase(nom, prenom, groupe) {
            // Cette fonction devrait effectuer une vérification réelle dans votre base de données
            // Remplacez-la par votre propre logique (peut-être une requête AJAX côté serveur)
            // Pour cet exemple, nous retournons toujours false.
            return false;
        }
    </script>

</body>
</html>
