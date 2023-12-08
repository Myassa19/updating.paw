<?php
class StudentDatabase {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function addStudent($nom, $prenom, $email, $groupe) {
        $stmt = $this->pdo->prepare("INSERT INTO students (nom, prenom, email, groupe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $groupe]);
    }

    public function searchStudent($name, $surname, $email) {
      
        $stmt = $this->pdo->prepare("   SELECT students.nom, students.prenom, students.email, recours.note_reel, recours.note_affiche, recours.module
        FROM students
        LEFT JOIN recours ON students.id = recours.id_student
        WHERE students.nom LIKE ? OR students.prenom LIKE ? OR students.email LIKE ?
    ");
        $stmt->execute(["%$name%", "%$surname%", "%$email%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$studentDatabase = new StudentDatabase("127.0.0.1", "isil", "root", "");

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['searchInput'])) {
        $searchName = $_POST['searchInput'];
        $searchResults = $studentDatabase->searchStudent($searchName, $searchName, $searchName);
    } else {
        // Handle other form submissions if needed
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Search Results Table</title>
</head>
<body style="background-image:url(images/image4.jpg)">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Your Brand</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Add other navigation elements here -->
        </ul>
        <form action="" method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select class="custom-select" id="searchCriteria" name="searchCriteria">
                        <option value="email">Email</option>
                        <option value="name">Nom</option>
                        <option value="surname">Prénom</option>
                    </select>
                </div>
                <input class="form-control mr-sm-2 text-center" type="search" placeholder="Rechercher"
                       aria-label="Search" id="searchInput" name="searchInput">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
            </div>
        </form>

        <!-- Button on the right -->
        <div class="ml-auto">
            <div class="btn btn-dark" onclick="redirectToIndex()">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                     class="bi bi-person-add" viewBox="0 0 16 16">
                    <path
                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                    <path
                        d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                </svg>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-light">Résultats de la recherche</h2>

    <!-- Example result card -->
    <?php if (isset($searchResults) && !empty($searchResults)) : ?>
        <?php foreach ($searchResults as $result) : ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="text-dark"><?= $result['nom'] ?> <?= $result['prenom'] ?></h5>

                            Note Réelle : <?= $result['note_reel'] ?>
                            <br>
                    
                            Note Affichée : <?= $result['note_affiche'] ?>
                            <br>
                      
                            Module : <?= $result['module'] ?>
                      
                    </p>

                    <!-- Radio buttons for favorable or unfavorable -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="custom-select" id="searchCriteria" name="searchCriteria">
                                <option value="Favorable">Favorable</option>
                                <option value="Défavorable">Défavorable</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit"  class="btn btn-dark" value="enregistrer">
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun résultat trouvé.</p>
    <?php endif; ?>
</div>


<script src="js/bootstrap.bundle.min.js"></script>

<script>
    function redirectToIndex() {
        window.location.href = 'http://localhost/projetphp/index.php';
    }
</script>
</body>
</html>
</html>




