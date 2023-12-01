<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Site de recoure</title>
</head>
<body style="background-image:url(images/image4.jpg)">
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
                                <label for="Email">Email:</label>
                                <input type="email" name="Email" class="form-control border-dark" required>
                                
                                <label for="MATRICULE">Matricule:</label>
                                <br>
                                <input type="text" name="MATRICULE" class="form-control border-dark" required>
                                <br>
                                <br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-dark" onclick="validateForm()">Log in</button>
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
            var selectedRole = document.querySelector('input[name="status"]:checked').value;
            var email = document.getElementsByName('Email')[0].value;
            var matricule = document.getElementsByName('MATRICULE')[0].value;

            // Check if the required fields are filled based on the selected role
            if (selectedRole === 'Admin' && email.trim() === '') {
                alert('Please enter your email.');
                return;
            } else if (selectedRole === 'User' && (email.trim() === '' || matricule.trim() === '')) {
                alert('Please enter both email and matricule.');
                return;
            }

            // Continue with form submission or other actions if validation passes
            redirectToPage(selectedRole);
        }

        function redirectToPage(role) {
            // Customize the URLs based on your actual pages
            if (role === 'Admin') {
                // Admin page
                window.location.href = 'http://localhost/projetphp/liste.php?';
            } else if (role === 'User') {
                // User page
                window.location.href = 'http://localhost/projetphp/formulaire.php?';
            }
        }
    </script>
</body>
</html>
   