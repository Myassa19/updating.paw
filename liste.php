<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Search Results Table</title>
  <style>
    .card {
      color: black;
    }
  </style>
</head>
<body style="background-image:url(images/image4.jpg)">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Your Brand</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <!-- Add other navigation elements here -->
      </ul>
      <form class="form-inline" onsubmit="searchSubmit(event)">
        <div class="input-group">
          <div class="input-group-prepend">
            <select class="custom-select" id="searchCriteria">
              <option value="email">Email</option>
              <option value="name">Nom</option>
              <option value="surname">Prénom</option>
            </select>
          </div>
          <input class="form-control mr-sm-2 text-center" type="search" placeholder="Rechercher" aria-label="Search" id="searchInput">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
        </div>
      </form>

      <!-- Button on the right -->
      <div class="ml-auto">
        <div class="btn btn-dark" onclick="redirectToIndex()">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
          </svg>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h2>Résultats de la recherche</h2>

    <!-- Example result card -->
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title">YAHIATENE Tesnime</h5>

        <!-- Rating information -->
        <p class="card-text">
          Note Réelle : 14
          <br>
          Note Affichée : 7
        </p>

        <!-- Radio buttons for favorable or unfavorable -->
        <div class="input-group">
          <div class="input-group-prepend">
            <select class="custom-select" id="searchCriteria">
              <option value="Favorable">Favorable</option>
              <option value="Défavorable">Défavorable</option>
            </select>
          </div>
        </div>

        <!-- Add more cards based on search results -->
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>

  <script>
    function redirectToIndex() {
      window.location.href = 'http://localhost/projetphp/index.php';
    }
  </script>
</body>
</html>




