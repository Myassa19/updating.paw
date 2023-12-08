<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Site de recoure</title>
</head>
<body style="background-image:url(image4.jpg)">
<center >    <img src="images/Logo_modif_francais.png" alt="logo university"style="max-width: 120px;"></center>
<center><h4 >Université M'Hamed Bougara - Faculté des sciences -</h4></center>
<center><h4 >-BOUMERDES-</h4></center>
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body btn-primary">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </div>
                            <h1 class="text-center mt-3">LOG-IN</h1>
                            <br>
                            <form>
                                <div class="text-center">
                                    <div>
                                        <input type="radio" name="status" id="ADMIN" value="Admin" checked>
                                        <label for="ADMIN">Admin</label>
                        
                                        <input class="ml-5" type="radio" name="status" id="USER" value="User">
                                        <label for="USER">User</label>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-dark" onclick="validateForm()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function validateForm() {
            var isAdmin = document.getElementById('ADMIN').checked;
            var isUser = document.getElementById('USER').checked;

            if (isUser) {
                // Si l'utilisateur est sélectionné, affiche la page1
                window.location.href = 'verification.php';
            } else if (isAdmin) {
                // Si l'admin est sélectionné, demande le mot de passe
                var password = prompt('Enter the password:');

                
                if (password === 'PROF2023') //mot de pass unique donner seulement aux profs
                {
                    window.location.href = 'liste.php';
                } else {
                    alert('Mot de passe incorrect. Veuillez réessayer.');
                }
            }
        }
    </script>
    
</body>
</html>
   

   
