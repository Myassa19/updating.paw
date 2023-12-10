<?php
class StudentDatabase {
    protected $pdo;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function addStudent($nom, $prenom, $email, $groupe) {
        $stmt = $this->pdo->prepare("INSERT INTO students (nom, prenom, email, groupe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $groupe]);
    }

    public function searchStudent($searchInput) {
        $stmt = $this->pdo->prepare("SELECT students.id, students.nom, students.prenom, students.email, recours.note_reel, recours.note_affiche, recours.module, recours.status
            FROM students
            LEFT JOIN recours ON students.id = recours.id_student
            WHERE students.nom LIKE ? OR students.prenom LIKE ? OR students.email LIKE ?");
        $stmt->execute(["%$searchInput%", "%$searchInput%", "%$searchInput%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status) {
        try {
            $stmt = $this->pdo->prepare("UPDATE recours SET status = ? WHERE id_student = ?");
            $stmt->execute([$status, $id]);
        } catch (PDOException $e) {
            echo "Error updating status: " . $e->getMessage();
        }
    }
}

$studentDatabase = new StudentDatabase("127.0.0.1", "isil", "root", "");

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['searchInput'])) {
        $searchInput = $_POST['searchInput'];
        $searchResults = $studentDatabase->searchStudent($searchInput);
    } elseif (isset($_POST['saveStatus'])) {
        try {
            // Handle the form submission for saving status
            foreach ($_POST['status'] as $id => $status) {
                $studentDatabase->updateStatus($id, $status);
            }
        } catch (PDOException $e) {
            echo "Error updating status: " . $e->getMessage();
        }
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
                <select class="custom-select" id="searchCriteria" name="searchCriteria">
                    <option value="name">Nom</option>
                    <option value="surname">Prénom</option>
                    <option value="email">Email</option>
                </select>
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
        <form action="" method="post">
            <?php foreach ($searchResults as $result) : ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="text-dark"><?= $result['nom'] ?> <?= $result['prenom'] ?></h5>

                        Note Réelle : <?= $result['note_reel'] ?>
                        <br>

                        Note Affichée : <?= $result['note_affiche'] ?>
                        <br>

                        Module : <?= $result['module'] ?>
                        <br>

                        <!-- Radio buttons for favorable or unfavorable -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status[<?= $result['id'] ?>]" id="favorable<?= $result['id'] ?>" value="1" <?= $result['status'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="favorable<?= $result['id'] ?>">Favorable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status[<?= $result['id'] ?>]" id="defavorable<?= $result['id'] ?>" value="2" <?= $result['status'] == 2 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="defavorable<?= $result['id'] ?>">Défavorable</label>
                        </div>
                        <br>
                    </div>
                </div>
                <input type="submit" class="b<tn btn-dark mt-3" value="Enregistrer" name="saveStatus">
            <?php endforeach; ?>
           
        </form>
    <?php else : ?>
        <p>Aucun résultat trouvé.</p>
    <?php endif; ?>
</div>

<script src="js/bootstrap.bundle.min.js"></script>

<script>
    function redirectToIndex() {
        window.location.href = 'http://localhost/projetphp/add.php';
    }
</script>
</body>
</html>




