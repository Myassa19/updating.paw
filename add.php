<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background-image:url(images/image4.jpg)">
   <section>
   
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card">
                    <div class="card-body btn-primary">
                        
                        <h2 class="text-center">add student</h2>
                        <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                          </svg></div>
        <form method="post" action="Api.php">
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control border-dark" name="nom" placeholder="Enter Nom" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prenom:</label>
        <input type="text" class="form-control border-dark" name="prenom" placeholder="Enter Prenom" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control border-dark" name="email" placeholder="Enter Email" required>
    </div>
    <div class="form-group">
        <label for="Groupe">Groupe:</label>
        <input type="text" class="form-control border-dark" name="Groupe" placeholder="Enter le Groupe" required>
    </div>
    <button type="submit" class="btn btn-dark">Add Student</button>
</form>
    </div>
                
</div>
</div>
</div>
</div>
</div>


    <script src="js/bootstrap.js" > </script>
</body>
</html>

   
