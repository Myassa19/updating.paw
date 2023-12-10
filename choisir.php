<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background-image:url(images/image4.jpg)">

    <div class="text-center mt-5">
        <button type="button" class="btn btn-primary my-2 my-sm-0" onclick="openRecours()">Ajouter un Recour</button>
    </div>
    <br>
    <br>
    <div class="text-center">
        <button type="button" class="btn btn-primary my-2 my-sm-0" onclick="redirectToOtherPage2()">Voir les résultats de Recours</button>
    </div>
          
                <script>
                function redirectToOtherPage2() {
            window.location.href = 'liste.php';
        }
        function openRecours(){
        window.location.href = 'formulaire.php';}

        </script>

        


   

</body>
</html>
